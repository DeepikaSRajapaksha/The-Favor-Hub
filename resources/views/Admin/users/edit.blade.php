@extends('layouts.admin')
@section('title', 'Edit Admin User')

@section('content')
<div class="container-fluid px-4">
    <h3 class="fw-bold mb-4">Edit Admin User</h3>

    <form action="{{ route('admin.users.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-warning px-4">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
