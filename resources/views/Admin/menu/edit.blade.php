@extends('layouts.admin')

@section('title', 'Edit Menu Item')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Menu Item</h3>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('Admin.partials.flash')

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name', $menu->name) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $menu->description) }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Price (Rs.)</label>
                        <input type="number" name="price" value="{{ old('price', $menu->price) }}" step="0.01" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image</label><br>
                        @if($menu->image)
                            <img src="{{ asset('uploads/menus/' . $menu->image) }}" width="80" class="rounded mb-2">
                        @endif
                        <input type="file" name="image" class="form-control mt-2">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
