<nav class="navbar navbar-expand-lg navbar-light bg-gradient-travel shadow-sm fixed-top">
    <div class="container-fluid px-4"> {{-- widened container for more edge space --}}
        <a class="navbar-brand fw-bold text-white fs-3" href="{{ url('/') }}">
            ✈️ TravelBohol
        </a>

        <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->is('/') ? 'active-link' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->is('packages*') ? 'active-link' : '' }}" href="{{ url('/packages') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->is('customers*') ? 'active-link' : '' }}" href="{{ url('/customers') }}">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->is('bookings*') ? 'active-link' : '' }}" href="{{ url('/bookings') }}">Booking</a>
                    </li>
                @endauth
            </ul>

            {{-- Right-side Auth Buttons --}}
            <ul class="navbar-nav align-items-lg-center ms-auto">
                @guest
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm px-3">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-light text-primary btn-sm px-3">Sign Up</a>
                    </li>
                @else
                    <li class="nav-item d-flex align-items-center gap-3">
                        {{-- Profile circle with first initial --}}
                        <div class="bg-primary text-white fw-bold rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 38px; height: 38px; font-size: 1.1rem; box-shadow: 0 0 10px rgba(255,255,255,0.2);">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        {{-- Logout button --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0" onsubmit="return confirmLogout()">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm px-3 shadow-sm">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }
</script>

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

/* Button tweaks */
.btn-outline-light {
    border-width: 2px;
    font-weight: 600;
}
.btn-outline-light:hover {
    background-color: #fff;
    color: #0083b0 !important;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

.btn-light {
    font-weight: 600;
}
.btn-light:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
}

/* Make right buttons closer to edge */
.navbar-nav.ms-auto {
    margin-right: 0.25rem !important;
}

.btn-danger {
    transition: all 0.2s ease-in-out;
}
.btn-danger:hover {
    background-color: #b91c1c !important;
    transform: translateY(-1px);
}
</style>
