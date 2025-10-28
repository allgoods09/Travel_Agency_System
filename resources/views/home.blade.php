@extends('layouts.app')

@section('title', 'Travel Bohol - Home')

@section('content')
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('images/banners/loboc.jpg') }}" class="d-block w-100 banner-img" alt="Banner 1">
            <div class="carousel-caption d-none d-md-block custom-caption">
                <h3>Discover Amazing Packages</h3>
                <p>Travel with comfort and style.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/banners/manmade.jpg') }}" class="d-block w-100 banner-img" alt="Banner 2">
            <div class="carousel-caption d-none d-md-block custom-caption">
                <h3>Adventure Awaits</h3>
                <p>Explore destinations beyond your imagination.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/banners/alona.jpg') }}" class="d-block w-100 banner-img" alt="Banner 3">
            <div class="carousel-caption d-none d-md-block custom-caption">
                <h3>Book Your Dream Vacation</h3>
                <p>Exclusive deals and offers available now.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/banners/campsite.jpg') }}" class="d-block w-100 banner-img" alt="Banner 4">
            <div class="carousel-caption d-none d-md-block custom-caption">
                <h3>Relax and Recharge</h3>
                <p>Your next getaway starts here.</p>
            </div>
        </div>

    </div>

    {{-- Carousel controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
.banner-img {
    width: 100%;
    height: 50vh;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
    display: block;
    transition: transform 1.2s ease-in-out, box-shadow 0.8s ease-in-out;
}

.banner-img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.45);
}

/* Default transition */
.carousel-item {
    opacity: 0;
    transform: translateX(0);
    transition: opacity 1s ease-in-out, transform 1s ease-in-out;
    transition: transform 1s ease-in-out; /* smooth slide */
}

/* Active slide visible */
.carousel-item.active {
    opacity: 1;
    transform: translateX(0);
}

/* Sliding left (next) */
.carousel-item-next.carousel-item-start {
    opacity: 1;
    transform: translateX(100%);
}

.carousel-item-start.active {
    transform: translateX(-100%);
}

/* Sliding right (prev) */
.carousel-item-prev.carousel-item-end {
    opacity: 1;
    transform: translateX(-100%);
}

.carousel-item-end.active {
    transform: translateX(100%);
}

.carousel,
.carousel-inner,
.carousel-item {
    width: 100%;
    height: 80vh;
    margin: 0;
    padding: 0;
}

.carousel-item-next,
.carousel-item-prev,
.carousel-item.active {
    display: flex;
}

#homeCarousel,
.carousel-inner,
.carousel-item {
    height: 50vh;
    border-radius: 20px;
}

.carousel-caption h3,
.carousel-caption p {
    text-shadow: 
        -1px -1px 2px rgba(0, 0, 0, 0.9),
         1px -1px 2px rgba(0, 0, 0, 0.9),
        -1px  1px 2px rgba(0, 0, 0, 0.9),
         1px  1px 2px rgba(0, 0, 0, 0.9);
    color: #fff;
}

.custom-caption {
    border-radius: 15px;
    padding: 20px 35px;
    box-shadow: none; /* removed shadow since no bg */
    animation: fadeUp 1s ease-in-out;
}

.custom-caption h3 {
    font-weight: 700;
    font-size: 2rem;
    color: #fff;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    letter-spacing: 1px;
}

.custom-caption p {
    color: #f8f9fa;
    font-size: 1.1rem;
    font-weight: 500;
    margin-top: 10px;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.7);
}

/* Smooth fade + upward animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
@endsection
