@extends('layouts.app')
@section('title')
    Vendor Register
@endsection

@section('content')
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Left Image Section -->
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('storage/authentication/vendor.jpg') }}" alt="Vendor Register Form"
                                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <!-- Right Form Section -->
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('vendor.register') }}">
                                        @csrf

                                        <!-- Logo -->
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-store fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Vendor Registration</span>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                            Create your vendor account
                                        </h5>

                                        <!-- Name -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="form-control form-control-lg" type="text"
                                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Email -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control form-control-lg" type="email"
                                                name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="form-control form-control-lg"
                                                type="password" name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <x-text-input id="password_confirmation" class="form-control form-control-lg"
                                                type="password" name="password_confirmation" required
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="pt-1 mb-4">
                                            <x-primary-button class="btn btn-dark btn-lg btn-block">
                                                {{ __('Register as Vendor') }}
                                            </x-primary-button>
                                        </div>

                                        <!-- Links -->
                                        <p class="mb-5 pb-lg-2">
                                            Already registered?
                                            <a href="{{ route('login') }}" style="color: #393f81;">Sign in here</a>
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
