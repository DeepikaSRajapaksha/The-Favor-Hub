@extends('layouts.admin')
@section('title', 'Edit Category')

@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Edit Category</h3>

    <form action="{{ route('admin.menuCategory.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Current Image</label><br>
            @if($category->image)
                <img src="{{ asset('uploads/menuCategory/' . $category->image) }}" width="180" class="rounded mb-2">
            @else
                <p class="text-muted">No image uploaded.</p>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-warning px-4">Update</button>
        <a href="{{ route('admin.menuCategory.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

