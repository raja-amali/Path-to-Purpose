@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-start h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Left Image Section -->
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="Login Form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <!-- Right Form Section -->
                            <div class="col-md-6 col-lg-7 d-flex align-items-start">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        <!-- Logo -->
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <!-- Email Input -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control form-control-lg" type="email"
                                                name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password Input -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="form-control form-control-lg" type="password"
                                                name="password" required autocomplete="current-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="pt-1 mb-4">
                                            <x-primary-button class="btn btn-dark btn-lg btn-block">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>

                                        <!-- Forgot Password Link -->
                                        @if (Route::has('password.request'))
                                            <a class="small text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                        @endif

                                        <!-- Register Links -->
                                        <p class="mb-1 pb-lg-1" >Don't have an account?</p>

                                        <p style="color: #393f81;">
                                            <a href="{{ route::has('register') ? route('register') : '' }}" class="text-decoration-none text-primary hover-underline">Register as User</a>
                                            /
                                            <a href="{{ route::has('register-vendor') ? route('register-vendor') : '' }}" class="text-decoration-none text-primary hover-underline">Register as Vendor</a>
                                        </p>
                                    </form>

                                      <!-- Login with Google -->
                                    <div class="pb-lg-1 align-items-center mt-5 d-flex justify-content-center">
                                        <a style="color: #393f81;" href="{{ route::has('loginWithGoogle') ? route('loginWithGoogle') : '' }}" class="text-decoration-none text-primary hover-underline">
                                        <i class="fa fa-google fs-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
