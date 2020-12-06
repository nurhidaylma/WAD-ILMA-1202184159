@extends('layout')
@section('title', 'Product')
@section('content')      
  @if(count($products) === 0)          
        <p class="text-secondary">There is no data...</p>
            <a href="{{ route('product.create') }}" class="btn btn-dark" type="button">Add Product</a>
        @elseif(count($products) > 0)
          <h2 class="mb-3">List Product</h2>
          <a href="{{ route('product.create') }}" class="btn btn-dark" type="button">Add Product</a>
          <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>      
                <td>{{ $loop->iteration }}</td>          
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                  <button class="btn btn-primary" type="submit" name="btEdit">Edit</button>
                  <button class="btn btn-danger" type="submit" name="btDelete">Delete</button>
                </td>
              </tr>              
              @endforeach
            </tbody>
          </table>
        @endif    
    <div>

    </div>
@endsection