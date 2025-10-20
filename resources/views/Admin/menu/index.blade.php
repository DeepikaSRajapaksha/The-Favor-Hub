@extends('layouts.admin')
@section('title', 'Menu List')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">Menu Items</h3>
        <a href="{{ route('admin.Menu.create') }}" class="btn btn-warning fw-semibold px-4">
            <i class="fas fa-plus"></i> Add New Menu
        </a>
    </div>

    {{-- Flash Messages --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered align-middle text-center mb-0">
                  <thead class="table-dark">
                      <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Price (Rs.)</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($menus as $key => $menu)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>
                                  @if($menu->image)
                                      <img src="{{ asset('uploads/menus/' . $menu->image) }}" width="60" height="60" class="rounded shadow-sm">
                                  @else
                                      <img src="{{ asset('images/no-image.png') }}" width="60" height="60" class="rounded shadow-sm">
                                  @endif
                              </td>
                              <td>{{ $menu->name }}</td>
                              <td>{{ $menu->category->name ?? '-' }}</td>
                              <td>{{ Str::limit($menu->description, 50) }}</td>
                              <td>{{ number_format($menu->price, 2) }}</td>
                              <td class="text-center">
                                  <!-- Edit Button -->
                                  <a href="{{ route('admin.Menu.edit', $menu->id) }}" 
                                  class="btn btn-sm btn-primary me-2" title="Edit">
                                      <i class="bi bi-pencil-square"></i>
                                  </a>

                                  <!-- Delete Button -->
                                  <form action="{{ route('admin.Menu.destroy', $menu->id) }}" 
                                      method="POST" class="d-inline delete-form">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-sm btn-danger btn-delete" title="Delete">
                                          <i class="bi bi-trash"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="7">No menu items found.</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection
