@extends('layouts.app')

@section('content')
<div class="min-vh-100 rounded-5 d-flex align-items-center justify-content-center text-white bg-gradient-travel py-5">
    <div class="about-content rounded-5 shadow-lg p-5 text-white mx-3 w-100" style="max-width: 1200px;">
        <div class="row align-items-center">
            <div class="col-md-6 mb-5 mb-md-0">
                <h1 class="fw-bold mb-3">About <span class="text-warning">TravelBohol</span> ✈️</h1>
                <p class="fs-5 mb-3">
                    TravelBohol is your trusted gateway to exploring the breathtaking beauty of Bohol. 
                    We specialize in curated travel experiences — from pristine beaches to cultural heritage tours — 
                    ensuring every trip is smooth, enjoyable, and unforgettable.
                </p>
                <p class="fs-6 opacity-75">
                    Whether you're planning a solo adventure, a family getaway, or a romantic escape, 
                    our packages are tailored to fit your budget and preferences. 
                    With us, booking your dream vacation is just a few clicks away.
                </p>

                <a href="{{ url('/packages') }}" class="btn btn-light text-primary fw-semibold px-4 py-2 rounded-pill mt-3 shadow-sm">
                    Explore Packages
                </a>
            </div>

            <div class="col-md-6 text-center">
                <img src="{{ asset('images/aboutimage.avif') }}"
                     alt="TravelBohol scenic view"
                     class="img-fluid rounded-4 shadow-lg border border-light">
            </div>
        </div>

        <hr class="my-5 border-light opacity-50">

        <div class="text-center">
            <h2 class="fw-bold text-white mb-4">Why Choose Us?</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-4 h-100 shadow-sm border border-light border-opacity-25">
                        <h4 class="fw-semibold text-warning mb-2">🌍 Local Expertise</h4>
                        <p class="text-white mb-0">
                            Our team consists of passionate locals who know Bohol inside out — 
                            guiding you to hidden gems beyond the usual tourist spots.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-4 h-100 shadow-sm border border-light border-opacity-25">
                        <h4 class="fw-semibold text-warning mb-2">💰 Affordable Packages</h4>
                        <p class="text-white mb-0">
                            Enjoy the best of Bohol without breaking the bank. 
                            We offer flexible pricing and seasonal discounts to suit every traveler.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-4 h-100 shadow-sm border border-light border-opacity-25">
                        <h4 class="fw-semibold text-warning mb-2">💬 Exceptional Support</h4>
                        <p class="text-white mb-0">
                            From booking to your return flight, our friendly team is available 
                            to assist you at every step — ensuring a hassle-free experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-travel {
    background: linear-gradient(90deg, #00b4db, #0083b0);
}

.rounded-4 {
    border-radius: 1.2rem !important;
}

.btn-light:hover {
    background-color: #f8f9fa !important;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

.about-content {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    backdrop-filter: blur(6px);
}
</style>
@endsection
