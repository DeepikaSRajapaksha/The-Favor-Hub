@extends('layouts.app')

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
<section id="about" class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">About The Flavor Hub</h2>
        <p class="text-muted mb-5">
            At <strong>The Flavor Hub</strong>, we bring together the perfect blend of authenticity, taste, and atmosphere.  
            Our chefs craft each dish with passion and locally sourced ingredients, ensuring a memorable dining experience.
        </p>
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded shadow-lg" alt="Restaurant Interior">
    </div>
</section>

{{-- ===== Signature Dishes Section ===== --}}
<section id="featured" class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Our Signature Dishes</h2>
        <p class="text-muted mb-5">A curated selection of our most-loved creations 🍕🍣🥗</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1604147706283-d68287a7b28d?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Steak">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Grilled Steak</h5>
                        <p class="text-muted">Perfectly seasoned and flame-grilled to perfection.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1606756790138-8f9c1690c153?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Pasta">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Creamy Pasta</h5>
                        <p class="text-muted">Rich cream sauce tossed with fresh herbs and parmesan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1576402187878-974f70e1ed6a?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Sushi">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Sushi Platter</h5>
                        <p class="text-muted">Freshly rolled sushi served with authentic wasabi and soy.</p>
                    </div>
                </div>
            </div>
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
