@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4 fw-bold">Your Cart</h3>

    @if(count($cart))

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th><th>Qty</th><th>Price</th><th>Subtotal</th><th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['subtotal'] }}</td>
                    <td>
                        <a href="{{ route('user.cart.remove', $id) }}" class="btn btn-danger btn-sm">X</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Total: <strong>Rs.{{ $total }}</strong></h4>

        <form action="{{ route('user.place.order') }}" method="POST">
            @csrf
            <button class="btn btn-success w-100">Place Order</button>
        </form>

    @else
        <div class="alert alert-warning text-center">Your cart is empty!</div>
    @endif

</div>
@endsection
