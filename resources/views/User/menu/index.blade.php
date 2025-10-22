@extends('layouts.app')

@section('title', 'Our Menu')

@section('content')
<div class="container py-5">

    {{-- ===== CATEGORY SECTION ===== --}}
    <h2 class="fw-bold text-center mb-4">Explore Our Categories</h2>

    <div class="row g-4 mb-5">
        @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 text-center category-card">
                    @if($category->image)
                        <img src="{{ asset('uploads/menuCategory/' . $category->image) }}"
                             alt="{{ $category->name }}"
                             class="card-img-top rounded-top"
                             style="height: 160px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}"
                             alt="No Image"
                             class="card-img-top rounded-top"
                             style="height: 160px; object-fit: cover;">
                    @endif
                    <div class="card-body p-3">
                        <h6 class="fw-semibold mb-0">{{ $category->name }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ===== MENU ITEMS SECTION ===== --}}
    <h2 class="fw-bold text-center mb-4">Our Delicious Dishes</h2>

    <div class="row g-4">
        @forelse($menus as $menu)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    @if($menu->image)
                        <img src="{{ asset('uploads/menus/' . $menu->image) }}"
                             alt="{{ $menu->name }}"
                             class="card-img-top rounded-top"
                             style="height: 180px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}"
                             alt="No Image"
                             class="card-img-top rounded-top"
                             style="height: 180px; object-fit: cover;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="fw-semibold mb-1">{{ $menu->name }}</h5>
                        <p class="text-muted small mb-2">{{ $menu->category->name ?? 'Uncategorized' }}</p>
                        <p class="mb-2">{{ Str::limit($menu->description, 60) }}</p>
                        <span class="fw-bold text-warning fs-5">Rs.{{ number_format($menu->price, 2) }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <p>No menu items available at the moment.</p>
            </div>
        @endforelse
    </div>

</div>

{{-- ====== STYLING ====== --}}
<style>
.category-card {
    transition: all 0.2s ease-in-out;
    cursor: pointer;
}
.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
</style>
@endsection
