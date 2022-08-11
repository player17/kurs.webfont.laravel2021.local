<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>@section('title')My Site @show</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

<header>
    @section('header')
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                            @if(!auth()->check())
                            <li><a href="{{ route('register.create') }}" class="text-white">Register</a></li>
                            @endif
                            @auth
                                <li><a href="{{ route('admin') }}" class="text-white">Admin Panel</a></li>
                                <li><a href="{{ route('posts.create') }}" class="text-white">Create</a></li>
                            @endauth
                            <li><a href="{{ route('testmail') }}" class="text-white">Test mail</a></li>
                            @guest
                                <li><a href="{{ route('page.about') }}" class="text-white">About</a></li>
                            @endguest
                            @if(Auth::check())
                                <li>
                                    <a href="{{ route('logout') }}" class="text-white">
                                        Logout "{{ auth()->user()->name }}"
                                        @if(auth()->user()->avatar)
                                            <img style="margin-left:6px; width: auto; height: 18px; border-radius: 10px" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="">
                                        @endif
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ route('login.create') }}" class="text-white">Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
                         viewBox="0 0 24 24" focusable="false">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    @show
</header>

<main role="main">

    @include('layouts.alerts')
    @yield('content')

</main>

@include('layouts.footer')

<script src="{{ asset('js/scripts.js') }}"></script>

@yield('scripts')

</body>
</html>
