<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use Session;
use Auth;

class OrderController extends Controller
{
    public function placeOrder(){
        $cartData = Cart::where(['session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->get();
        $cartTotal = 0;
        foreach($cartData as $key=>$value){
            $cartTotal += $value->products->product_price * $value->quantity;
        }
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'total'=>$cartTotal
        ]);
        foreach($cartData as $key=>$value){
            $value->delete();
            $product = Products::where('id', $value->products_id)->first();
            $product->stock = $product->first()->stock - $value->quantity;
            $product->save();            
        }
        return redirect()->route('home');
    }
}
