<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Brands;
use App\Cart;
use Session;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart($id){
        $product = Products::find($id);
        $cart = Cart::where(['products_id'=>$id, 'session_id'=>Session::getId()])->first();
        if(!$cart){
            Cart::create([
                'products_id'=>$id,
                'user_id'=>Auth::user()->id,
                'session_id'=>Session::getId(),
                'quantity'=>1
            ]);
        }else{
            $updatedCart = Cart::where(['session_id'=>Session::getId(), 'user_id'=>Auth::user()->id, 'products_id'=>$id])->first();
            $updatedCart->quantity = $updatedCart->quantity + 1;
            $updatedCart->save();
        }
        return redirect()->back();
    }

    public function getCartData(){
        $cartData = Cart::where(['session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->get();
        $cartTotal = 0;
        foreach($cartData as $key=>$value){
            $cartTotal += $value->products->product_price * $value->quantity;
        }
        return view('cart.index', compact('cartData', 'cartTotal'));
    }

    public function plusQuantity($id){
        $updatedCart = Cart::where([ 'id'=>$id, 'session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->first();
        $product = Products::find($updatedCart->products_id);
        if($updatedCart->quantity > $product->stock){
            Session::flash('message', 'You have added quantity more than the stock of the product. Please decrease the quantity');
            Session::flash('class', 'success');
        }
        
        $updatedCart->quantity = $updatedCart->quantity + 1;
        $updatedCart->save();
        return redirect()->back();

    }

    public function minusQuantity($id){
        $updatedCart = Cart::where(['id'=>$id, 'session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->first();
        // return $updatedCart;
        if($updatedCart->quantity < 1){
            Cart::find($updatedCart->id)->delete();
        }
            $updatedCart->quantity = $updatedCart->quantity - 1;
            $updatedCart->save();
            return redirect()->back();
    }

    public function deleteQuantity($id){
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function checkout(){
        $cartData = Cart::where(['session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->get();
        $cartTotal = 0;
        foreach($cartData as $key=>$value){
            $cartTotal += $value->products->product_price * $value->quantity;
        }
        return view('checkout.index', compact('cartData', 'cartTotal'));
        return redirect()->back();
    }
}
