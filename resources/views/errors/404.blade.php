@extends('layouts.app')
@section('title', '404 - Page Not Found')
@section('content')
    <div class="bg-light">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="text-center w-75"> <!-- Adjusted the width for better centering -->
                <!-- Image showing 404 error (commonly used in e-commerce) -->
                <img src="{{ asset('storage/errors/oops-404.png') }}" alt="Page Not Found"
                    class="img-fluid d-block mx-auto" style="max-width: 30%; height: auto;"> <!-- Reduced max-width to 40% -->

                <h1 class="display-1 text-danger mt-4">404</h1> <!-- Added margin top to space out the text -->
                <p class="lead mt-3">Oops! The page you are looking for doesn't exist.</p> <!-- Added margin top for spacing -->
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-4">Go Back to Home</a> <!-- Added margin top for spacing -->
            </div>
        </div>
    </div>
@endsection
