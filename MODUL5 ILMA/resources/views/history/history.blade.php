@extends('layout')
@section('title', 'History')
@section('content')
    @if(count($orders) === 0)          
        <p class="text-secondary">There is no data...</p>
        <a href="{{ route('order.index') }}" class="btn btn-dark" type="button">Order Now</a>
    @elseif(count($orders) > 0)
        <h2 class="mb-3">History</h2>        
        <table class="table mt-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Buyer Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>      
                <td>{{ $loop->iteration }}</td>          
                <td>{{ $order->name }}</td>
                <td>{{ $order->buyer_name }}</td>                
                <td>{{ $order->buyer_contact }}</td>                
                <td>{{ $order->amount }}</td>                
            </tr>              
            @endforeach
        </tbody>
        </table>
    @endif
@endsection