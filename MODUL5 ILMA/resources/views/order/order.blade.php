@extends('layout')
@section('title', 'Orders')
@section('content')
    @if(count($products) === 0)          
        <p class="text-secondary">There is no data...</p>
        <a href="{{ route('product.create') }}" class="btn btn-dark" type="button">Add Product</a>
    @elseif(count($products) > 0)
        <h2 class="mb-3">Order</h2>            
        @foreach($products as $product)        
            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url('public/images/').$product->img_path }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <h4 class="card-text">${{ $product->price }}</h4>
                    <a href="{{ route('order.create', $product->id) }}" class="btn btn-success">Order Now</a>
                </div>
            </div>        
        @endforeach            
    @endif    
@endsection