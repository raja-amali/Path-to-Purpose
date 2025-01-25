<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="{{ url('/') }}">path to purpose</a>
        <div class="navbar-nav ms-auto">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                    <!-- Login Button -->
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2 rounded-pill px-4"
                            href="{{ Route::has('login') ? route('login') : '' }}">Login</a>
                    </li>
                    <!-- Register Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-light rounded-pill px-4 dropdown-toggle" href="#" id="registerDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark small-dropdown"
                            aria-labelledby="registerDropdown">
                            <li>
                                <a class="dropdown-item text-center"
                                    href="{{ Route::has('user.register') ? route('user.register') : '' }}">As User</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-center"
                                    href="{{ Route::has('vendor.register') ? route('vendor.register') : '' }}">As Vendor</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Cart Icon with Badge -->
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('/cart') }}" aria-label="View Cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                        </a>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">My Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
