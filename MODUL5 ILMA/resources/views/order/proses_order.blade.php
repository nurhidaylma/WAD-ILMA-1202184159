@extends('layout')
@section('title', 'Process Order')
@section('content')
@foreach($products as $product)
    <form action="{{ route('order.store') }}" method="post">    
        <div class="d-flex justify-content-center">
    <div class="card mb-3" >
    <div class="row no-gutters">
        <div class="col-md-4">
        <img src="{{ asset('storage/images/'.$product->img_path) }}" class="card-img-top" >
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <input name="id_pro" hidden value="{{ $product->id }}">
            <input hidden name="stock_pro" value="{{ $product->stock }}">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Stock: {{ $product->stock }}</p>
            <h5 class="card-text">${{ $product->price }}</h5>            
        </div>
        </div>
    </div>
    </div>
        </div>
    @endforeach

    <div class="border bg-white p-2" style="text-align: left;" >
        @csrf        
        <h5 class="text-center">Buyer Information</h5>
        <div class="form-group">
            <label for="buyer_name">Name</label>
            <input type="text" class="form-control" id="buyer_name" name="buyer_name" >    
        </div>
        <div class="form-group">
            <label for="buyer_contact">Contact</label>
            <input type="text" class="form-control" id="buyer_contact" name="buyer_contact">
        </div>
        <div class="form-group">
            <label for="buyer_quant">Quantity</label>
            <input type="number" class="form-control" id="buyer_quant" name="buyer_quant">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
@endsection