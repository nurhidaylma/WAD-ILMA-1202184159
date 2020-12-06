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
            <td>${{ $product->price }}</td>
            <td>
              <form action="{{ route('product.destroy', $product->id) }}" onsubmit="return confirm('Anda yakin?');" method="POST">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary" name="btEdit">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" name="btDelete">Delete</button>
              </form>
            </td>
          </tr>              
        @endforeach
      </tbody>
    </table>
  @endif        
@endsection