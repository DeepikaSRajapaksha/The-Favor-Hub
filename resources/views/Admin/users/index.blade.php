@extends('layouts.admin')
@section('title', 'Admin Users')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Admin Users</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-warning">
            <i class="bi bi-person-plus"></i> Add Admin
        </a>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($users->isEmpty())
                <p class="text-muted text-center m-0 py-3">No users available yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="8%">ID</th>
                                <th width="25%">Name</th>
                                <th>Email</th>
                                <th width="25%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if($user->id === $superAdminId)
                                            <span class="badge bg-secondary">Protected</span>
                                        @else
                                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                                            class="btn btn-sm btn-primary me-2">
                                            <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                                method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted">No admin users found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
