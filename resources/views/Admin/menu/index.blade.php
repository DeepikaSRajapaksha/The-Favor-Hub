@extends('layouts.app')

@section('title', 'Admin - Menu Management')

@section('content')
  <h2 class="mb-3 text-center">🧑‍🍳 Admin – Manage Menu</h2>

  <div class="text-end mb-3">
      <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">➕ Add New Item</a>
  </div>

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price (LKR)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($menus as $menu)
      <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->category }}</td>
        <td>{{ number_format($menu->price, 2) }}</td>
        <td>
          <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
          <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this item?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
