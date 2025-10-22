@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- ===== Hero Section ===== --}}
<section class="hero position-relative text-center text-light"
    style="background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover; height: 100vh;">
    
    <div class="overlay position-absolute top- start-0 w-100 h-100" style="background: rgba(0,0,0,0.6);"></div>

    <div class="container position-relative z-1 h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeInDown">Welcome to The Flavor Hub</h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp">Where taste meets tradition and every bite tells a story 🍷</p>
        <a href="/menu" class="btn btn-warning btn-lg rounded-pill shadow-lg px-4 py-2 animate__animated animate__fadeInUp">Explore Our Menu</a>
    </div>
</section>

{{-- ===== About Section ===== --}}
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            
            {{-- 🔹 Left: Image --}}
            <div class="col-md-6 animate__animated animate__fadeInLeft">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=900&q=80" 
                     class="img-fluid rounded-4 shadow-lg" 
                     alt="Restaurant Interior"
                     style="object-fit: cover;">
            </div>

            {{-- 🔹 Right: About Content --}}
            <div class="col-md-6 text-center text-md-start animate__animated animate__fadeInRight">
                <h2 class="fw-bold mb-4 text-warning">About <span class="text-dark">The Flavor Hub</span></h2>
                <p class="text-muted mb-4 fs-5">
                    Welcome to <strong>The Flavor Hub</strong> — where culinary artistry meets warm hospitality.  
                    We take pride in crafting dishes that celebrate local ingredients, vibrant flavors,  
                    and a passion for perfection. Whether it’s a cozy dinner or a grand celebration,  
                    every moment here is designed to delight your senses.
                </p>

                <ul class="list-unstyled text-muted mb-4">
                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Locally sourced ingredients</li>
                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Authentic global flavors</li>
                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Cozy and elegant atmosphere</li>
                </ul>

                <a href="/menu" class="btn btn-warning fw-semibold px-4 py-2 rounded-pill shadow-sm">
                    Explore Menu
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ===== Signature Dishes Section ===== --}}
<section id="featured" class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Our Signature Dishes</h2>
        <p class="text-muted mb-5">A curated selection of our most-loved creations 🍕🍣🥗</p>

        <div class="row g-4">
            @forelse($featuredMenus as $menu)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('uploads/menus/' . $menu->image) }}" 
                             class="card-img-top" 
                             alt="{{ $menu->name }}" 
                             style="height: 230px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $menu->name }}</h5>
                            <p class="text-muted">{{ Str::limit($menu->description, 80) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No featured dishes available.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== Categories Section ===== --}}
<section id="categories" class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Explore Our Categories</h2>
        <div class="row g-4">
            @forelse($categories as $category)
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('uploads/menuCategory/' . $category->image) }}" 
                             class="card-img-top" 
                             alt="{{ $category->name }}"
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No categories available.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== Testimonials Section ===== --}}
<section id="testimonials" class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">What Our Customers Say</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded bg-white shadow-sm">
                    <p>"Absolutely loved the food! The service was top-notch and the atmosphere cozy."</p>
                    <h6 class="fw-bold text-warning mt-3">— Sarah W.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded bg-white shadow-sm">
                    <p>"Best dining experience in town. Their sushi platter is out of this world!"</p>
                    <h6 class="fw-bold text-warning mt-3">— Daniel P.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded bg-white shadow-sm">
                    <p>"Elegant ambiance and flavorful dishes. Definitely coming back!"</p>
                    <h6 class="fw-bold text-warning mt-3">— Emily K.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Reservation Section ===== --}}
<section id="reservation" class="py-5 text-center text-light position-relative"
    style="background: url('https://images.unsplash.com/photo-1543353071-087092ec3936?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;">

    {{-- 🔹 The overlay now positioned correctly --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.7); z-index: 0;"></div>

    {{-- 🔹 Your actual content (above overlay) --}}
    <div class="container position-relative" style="z-index: 1;">
        <h2 class="fw-bold mb-4">Book Your Table Today</h2>
        <p class="lead mb-4">Reserve your spot and enjoy an unforgettable dining experience.</p>
        <a href="/contact" class="btn btn-warning btn-lg rounded-pill px-4 py-2">Reserve Now</a>
    </div>
</section>


@endsection
