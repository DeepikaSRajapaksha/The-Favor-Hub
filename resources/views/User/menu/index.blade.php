@extends('layouts.app')

@section('title', 'Menu')

@section('content')
  <h2 class="text-center mb-4">🍽️ Our Delicious Menu</h2>

  <div class="row">
    @foreach ($menus as $item)
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $item['name'] }}</h5>
            <p class="text-muted">{{ $item['category'] }}</p>
            <p>{{ $item['description'] }}</p>
            <h6 class="text-success">LKR {{ number_format($item['price'], 2) }}</h6>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
