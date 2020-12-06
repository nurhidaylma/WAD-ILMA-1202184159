@extends('layout')
@section('title', 'Input Product')
@section('content')
    <h2>Input Product</h2>
    <div class="text-secondary" style="text-align: left;">
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="input_nama">Product Name</label>
            <input type="text" class="form-control" id="input_nama" name="input_nama">            
        </div>
        <div class="form-group">
            <label for="input_price">Price</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$ USD</div>
                </div>
                <input type="number" class="form-control" id="input_price" name="input_price" step="any">
            </div>
        </div>        
        <div class="form-group">
            <label for="input_desc">Description</label>
            <textarea class="form-control" id="input_desc" name="input_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="input_stock">Stock</label>
            <input type="number" class="form-control" id="input_stock" name="input_stock">
        </div>        
        <div class="form-group">
            <label for="input_img">Image file input</label>
            <input type="file" class="form-control-file" id="input_img" name="input_img">
        </div>                
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>