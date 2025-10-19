@extends('layouts.admin')
@section('title', 'Add Category')

@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Add New Category</h3>

    <form action="{{ route('admin.menuCategory.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Category Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-warning px-4">Save</button>
        <a href="{{ route('admin.menuCategory.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

