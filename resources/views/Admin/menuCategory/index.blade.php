@extends('layouts.admin')
@section('title', 'Menu Categories')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">Menu Categories</h3>
        <a href="{{ route('admin.menuCategory.create') }}" class="btn btn-warning fw-semibold px-4">
            + Add New Category
        </a>
    </div>


    {{-- Table View of Categories --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($categories->isEmpty())
                <p class="text-muted text-center m-0 py-3">No categories available yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="8%">ID</th>
                                <th width="20%">Image</th>
                                <th width="25%">Category Name</th>
                                <th>Description</th>
                                <th width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('uploads/menuCategory/' . $category->image) }}" 
                                                 alt="{{ $category->name }}" 
                                                 width="80" height="80" 
                                                 class="rounded shadow-sm" 
                                                 style="object-fit: cover;">
                                        @else
                                            <span class="text-muted fst-italic">No Image</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $category->name }}</td>
                                    <td>{{ $category->description ?? '-' }}</td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.menuCategory.edit', $category->id) }}" 
                                        class="btn btn-sm btn-primary me-2" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.menuCategory.destroy', $category->id) }}" 
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
