@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <section class="d-flex flex-column" style="background-color: #9A616D; min-height: 100vh;">
        <div class="container py-5 flex-grow-1">
            <div class="row d-flex justify-content-center align-items-start">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Left Image Section -->
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('storage/authentication/login.jpg') }}" alt="Login Form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <!-- Right Form Section -->
                            <div class="col-md-6 col-lg-7 d-flex align-items-start">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    {{-- show error --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 rounded-3"
                                            role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-exclamation-circle-fill fs-2 me-3 text-danger"></i>
                                                <div>
                                                    <strong class="d-block fs-5">Oops! Something went wrong:</strong>
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        <!-- Logo -->
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                        </h5>

                                        <!-- Email Input -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control form-control-lg" type="email"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password Input -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="form-control form-control-lg"
                                                type="password" name="password" required autocomplete="current-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="pt-1 mb-3">
                                            <x-primary-button
                                                class="btn btn-dark btn-lg d-flex justify-content-center align-items-center shadow-lg rounded-3 w-100">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>

                                        <!-- OR Divider -->
                                        <div class="d-flex justify-content-center align-items-center mb-2">
                                            <span class="text-muted" style="font-size: 16px;">OR</span>
                                        </div>

                                        <!-- Google Login Button -->
                                        <div class="mb-3">
                                            <a href="{{ Route::has('google.login') ? route('google.login', ['action' => 'login']) : '#' }}"
                                                class="btn btn-danger btn-lg d-flex justify-content-center align-items-center shadow-lg rounded-3 w-100">
                                                <i class="fab fa-google me-3" style="font-size: 20px;"></i>
                                                <span>Login with Google</span>
                                            </a>
                                        </div>

                                        <!-- Forgot Password Link -->
                                        @if (Route::has('password.request'))
                                            <a class="small text-muted" href="{{ route('password.request') }}">Forgot
                                                password?</a>
                                        @endif

                                        <!-- Register Links -->
                                        <p class="mb-1 pb-lg-1">Don't have an account?</p>

                                        <p style="color: #393f81;">
                                            <a href="{{ route::has('register') ? route('register') : '' }}"
                                                class="text-decoration-none text-primary hover-underline">Register as
                                                User</a>
                                            /
                                            <a href="{{ route::has('register-vendor') ? route('register-vendor') : '' }}"
                                                class="text-decoration-none text-primary hover-underline">Register as
                                                Vendor</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
