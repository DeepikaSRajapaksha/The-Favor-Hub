@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="text-center">
        <h1 class="fw-bold mb-4">Welcome to The Flavor Hub Admin Dashboard</h1>
        <p class="lead">Manage your restaurant menu, reservations, and settings efficiently.</p>

        <a href="{{ route('admin.dashboard.index') }}" class="btn btn-dark mt-3 px-4">Go to Menu Management</a>
    </div>
@endsection
