@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 class="text-center">Brands</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            @if(count($brands)>0)
                                 @foreach($brands as $key=>$value)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                        <a href="{{ route('brands.show', $value->id) }}" class="btn btn-primary mb-2" style="padding:10px;">{{ $value->brand_name }}</a>
                                    </div>
                                @endforeach
                            @else
                                <h1 class="text-center">No Brands Found</h1>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 class="text-center">Products</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            @if(count($products) > 0)
                                @foreach($products as $key=>$value)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                        <div class="card mb-4" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ $value->product_img }}" alt="Card image cap">
                                            <div class="card-body">
                                              <h5 class="card-title">{{ $value->product_name }}</h5>
                                              <h6>Stock : <strong>{{ $value->stock }}</strong></h6>
                                              <p class="card-text">{{ Illuminate\Support\Str::limit($value->product_description, 80) }}</p>
                                              <form action="{{ route('add-to-cart', $value->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success">Add To Cart</button>
                                              </form>
                                            </div>
                                          </div>
                                    </div>
                                @endforeach
                            @else
                                    <h1>No Products Found</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
