@extends('layouts.app')

@section('content')

{{-- ===== Hero Section ===== --}}
<section class="position-relative text-center text-light"
    style="background: url('https://images.unsplash.com/photo-1541542684-4a3c3b7f7f38?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover; height: 70vh;">
    
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.6);"></div>

    <div class="container position-relative z-1 h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4 fw-bold mb-3">About The Flavor Hub</h1>
        <p class="lead">Passion. Taste. Tradition. Every dish tells our story 🍴</p>
    </div>
</section>

{{-- ===== Our Story Section ===== --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=900&q=80"
                    class="img-fluid rounded shadow-lg" alt="Our Restaurant">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="text-muted">
                    Founded in 2020, <strong>The Flavor Hub</strong> was born out of a love for authentic Sri Lankan cuisine and global flavors. 
                    We started as a small family kitchen with one goal — to bring people together through food that warms the heart and delights the soul.
                </p>
                <p class="text-muted">
                    Today, we’re proud to be one of the most loved restaurants in town, serving dishes made with passion, locally-sourced ingredients, 
                    and the artistry of our talented chefs.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ===== Our Values Section ===== --}}
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Our Core Values</h2>
        <p class="text-muted mb-5">What makes us different from the rest 🌿</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold mb-3 text-warning">Authenticity</h5>
                    <p class="text-muted">We stay true to our roots, serving traditional recipes that capture the essence of real flavor.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold mb-3 text-warning">Quality</h5>
                    <p class="text-muted">From ingredients to service, we never compromise on excellence — because you deserve the best.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold mb-3 text-warning">Hospitality</h5>
                    <p class="text-muted">We believe dining is more than food — it’s warmth, comfort, and unforgettable moments.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Meet the Team Section ===== --}}
<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Meet Our Team</h2>
        <p class="text-muted mb-5">The passionate people behind every delicious plate 👨‍🍳</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=800&q=80"
                        class="card-img-top" alt="Chef 1">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Chef Anura</h5>
                        <p class="text-muted">Head Chef & Culinary Director</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1556909212-41b145b80a4e?auto=format&fit=crop&w=800&q=80"
                        class="card-img-top" alt="Chef 2">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Chef Malsha</h5>
                        <p class="text-muted">Pastry & Dessert Specialist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1556912998-6e76d5f52d8a?auto=format&fit=crop&w=800&q=80"
                        class="card-img-top" alt="Manager">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">Nuwan Perera</h5>
                        <p class="text-muted">Restaurant Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CTA Section ===== --}}
<section class="py-5 text-center text-light position-relative"
    style="background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;">
    
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.7); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <h2 class="fw-bold mb-4">Join Our Culinary Journey</h2>
        <p class="lead mb-4">Discover what makes The Flavor Hub special — visit us today!</p>
        <a href="/menu" class="btn btn-warning btn-lg rounded-pill px-4 py-2">Explore Menu</a>
    </div>
</section>

@endsection
