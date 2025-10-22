@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
{{-- ===== Hero Section ===== --}}
<section class="position-relative text-center text-light"
    style="background: url('https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover; height: 60vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.6);"></div>
    <div class="position-relative z-1 d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-4 fw-bold mb-3">Get in Touch</h1>
        <p class="lead">We’d love to hear from you — whether it’s feedback, questions, or reservations.</p>
    </div>
</section>

{{-- ===== Contact Info Section ===== --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <i class="bi bi-geo-alt fs-1 text-warning mb-3"></i>
                    <h5 class="fw-semibold">Visit Us</h5>
                    <p class="text-muted mb-0">123 Flavor Street, Colombo, Sri Lanka</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <i class="bi bi-telephone fs-1 text-warning mb-3"></i>
                    <h5 class="fw-semibold">Call Us</h5>
                    <p class="text-muted mb-0">+94 77 123 4567</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <i class="bi bi-envelope fs-1 text-warning mb-3"></i>
                    <h5 class="fw-semibold">Email Us</h5>
                    <p class="text-muted mb-0">info@flavorhub.com</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <i class="bi bi-clock fs-1 text-warning mb-3"></i>
                    <h5 class="fw-semibold">Opening Hours</h5>
                    <p class="text-muted mb-0">Mon–Sun: 10AM – 11PM</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Contact Form Section ===== --}}
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4 text-center">Send Us a Message</h2>
                <form class="shadow p-4 rounded bg-white">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 fw-semibold">Send Message</button>
                </form>
            </div>

            {{-- Google Map --}}
            <div class="col-lg-6">
                <div class="ratio ratio-4x3 shadow rounded">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31688.09929502689!2d79.83801279999999!3d6.9270783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2595a792f19cf%3A0xe20e91b9cb14d680!2sColombo!5e0!3m2!1sen!2slk!4v1715580932518!5m2!1sen!2slk"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== Styles ===== --}}
<style>
.card i {
    transition: transform 0.2s;
}
.card:hover i {
    transform: scale(1.1);
}
form input, form textarea {
    border-radius: 10px;
}
</style>
@endsection
