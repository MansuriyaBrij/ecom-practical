@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-center card-header">
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <h2>{{ Auth::user()->name }}'s cart</h2>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <h2>Total Products : {{ App\Cart::where(['session_id'=>Session::getId(), 'user_id'=>Auth::user()->id])->sum('quantity') }}</h2>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <h2>Total :  ₹ {{ $cartTotal }}</h2>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show w-50 ml-auto alert-custom"
                                role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                @if (count($cartData) > 0)
                                    @foreach ($cartData as $key => $value)
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <div class="card mb-4" style="width: 18rem;">
                                                <img class="card-img-top"
                                                    src="{{ $value->first()->products->product_img }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $value->product_name }}</h5>
                                                    <h6>Stock : <strong>{{ $value->first()->products->stock }}</strong></h6>
                                                    <p class="card-text">
                                                        {{ Illuminate\Support\Str::limit($value->first()->products->product_description, 80) }}
                                                    </p>
                                                    <div class="row justify-content-center">
                                                        <form action="{{ route('minus.quantity', $value->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="col-xs-12 col-sm-4">
                                                                <button class="btn btn-danger"><i class="fa fa-minus"
                                                                        aria-hidden="true"></i></button>
                                                            </div>
                                                        </form>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <p class="pt-2 pl-2">{{ $value->quantity }}</p>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-4">
                                                            <form action="{{ route('plus.quantity', $value->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="col-xs-12 col-sm-4">
                                                                    <button class="btn btn-success"><i class="fa fa-plus"
                                                                            aria-hidden="true"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('delete.product', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    <div class="container">
                                        <h1 class="text-center">No items in cart</h1>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
