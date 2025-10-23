<nav class="navbar navbar-expand-lg navbar-light bg-gradient-travel shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white fs-3" href="{{ url('/') }}">
            ✈️ TravelBohol
        </a>

        <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->is('/') ? 'active-link' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->is('packages*') ? 'active-link' : '' }}" href="{{ url('/packages') }}">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->is('customers*') ? 'active-link' : '' }}" href="{{ url('/customers') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->is('bookings*') ? 'active-link' : '' }}" href="{{ url('/bookings') }}">Booking</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.bg-gradient-travel {
    background: linear-gradient(90deg, #00b4db, #0083b0);
}

.navbar {
    transition: background 0.3s ease;
}

.navbar-brand:hover {
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
}

.nav-link {
    position: relative;
    transition: all 0.3s ease;
}

.nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 3px;
    left: 0;
    bottom: 0;
    background-color: #fff;
    transition: width 0.3s ease;
}

.nav-link:hover::after,
.active-link::after {
    width: 100%;
}

.nav-link:hover {
    transform: translateY(-2px);
}
</style>
