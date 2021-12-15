@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center card-header"><h2>{{ $brand->brand_name }}</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            @if(count($brand->products) > 0)
                                @foreach($brand->products as $key=>$value)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
                                              <a href="#" class="btn btn-primary ml-4">View Product</a>
                                            </div>
                                          </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
