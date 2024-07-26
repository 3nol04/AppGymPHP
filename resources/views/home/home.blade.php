@extends('layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg bg-transparent fixed-top">
    <div class="container">
            GymFinity<span class="text-danger" style="font-size: 2rem"></span>
        </a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}"><span>Login</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}"><span>Register</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid p-0" style="background: radial-gradient(circle at center, #4d0000, #111); position: relative;">
    <div class="position-relative w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center text-white position-relative" style="z-index: 1; padding: 15px;">
            <h2 class="text-danger">Chase Progress, Not Perfection.</h2>
            <h1 class="display-1" style="font-weight: bold;">MAKE YOUR BODY SHAPE</h1>
            <p class="mt-4 lead" style="max-width: 600px; margin: auto;">
                Make Your Body Shape is about sculpting your physique through exercise, nutrition, and lifestyle choices. It's a journey of embracing your body's unique contours and working towards your desired shape.
            </p>
            <a href="{{ route('register') }}" class="btn btn-danger btn-lg mt-4">Join Now</a>
        </div>
        <div class="background-image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('icons/Group 8.png') }}'); background-size: cover; background-position: center; opacity: 0.2;"></div>
    </div>
</div>
@endsection
