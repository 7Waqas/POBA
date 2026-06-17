<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POBA - Palandarians Old Boys Association')</title>
    <meta name="description" content="@yield('meta_description', 'Official POBA Alumni Network')">
    <link rel="stylesheet" href="{{ asset('css/poba.css') }}">
    @stack('styles')
</head>
<body>

{{-- Top Banner --}}
<div class="top-banner">PALANDARIANS' OLD BOYS' ASSOCIATION (POBA)</div>

{{-- Navbar --}}
<nav class="navbar">
    <div class="navbar-inner">
        {{-- Left Side Links --}}
        <ul class="navbar-nav nav-left">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
            <!-- <li><a href="#">Sponsor</a></li> -->
             <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Updates</a></li>
            <li><a href="{{ route('events.index') }}" class="{{ request()->routeIs('events.*') ? 'active' : '' }}">Events</a></li>
        </ul>

        {{-- Centered Logo Shield --}}
        <div class="navbar-logo-container">
            <a href="{{ route('home') }}" class="navbar-brand-centered">
                <img src="{{ asset('images/logo.png') }}" alt="POBA Logo" onerror="this.style.display='none'">
            </a>
        </div>

        {{-- Right Side Links --}}
        <ul class="navbar-nav nav-right">
            <li><a href="{{ route('star.alumni') }}" class="{{ request()->routeIs('star.*') ? 'active' : '' }}">Star Alumni</a></li>
            <li class="dropdown">
                <a href="#" class="{{ request()->routeIs('alumni.*') || request()->routeIs('gallery.*') ? 'active' : '' }}">Alumni ▾</a>
                <div class="dropdown-menu">
                    <a href="{{ route('member.index') }}">Become Member</a>
                    <a href="{{ route('alumni.index') }}">Alumni Directory</a>
                    <a href="#">Achievements</a>
                    <a href="#">Networking</a>
                    <a href="#">Career Services</a>
                    <a href="{{ route('gallery.index') }}">Gallery</a>
                </div>
            </li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li>
                @auth('alumni')
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn-teal-nav" style="border:none;cursor:pointer">Logout</button>
                    </form>
                @else
                    <a href="{{ route('member.index') }}" class="btn-teal-nav">Become a Member</a>
                @endauth
            </li>
        </ul>
    </div>
</nav>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="container" style="margin-top:16px">
        <div class="alert alert-success">{{ session('success') }}</div>
    </div>
@endif
@if(session('error'))
    <div class="container" style="margin-top:16px">
        <div class="alert alert-danger">{{ session('error') }}</div>
    </div>
@endif

{{-- Main Content --}}
@yield('content')

{{-- Footer --}}
<footer>
    <div class="container">
        <div class="grid-4" style="gap:30px">
            <div>
                <div class="footer-logo">
                    <div class="footer-logo-circle">
                        <img src="{{ asset('images/logo.png') }}" alt="POBA Logo" onerror="this.style.display='none'">
                    </div>
                    <div>
                        <div class="footer-logo-text">POBA</div>
                        <div class="footer-logo-sub">Palandarians Old Boys Association</div>
                    </div>
                </div>
            </div>
            <div>
                <h5>Quick Links</h5>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('news.index') }}">News</a>
                <a href="{{ route('events.index') }}">Events</a>
                <a href="#">Donate Now</a>
            </div>
            <div>
                <h5>Alumni</h5>
                <a href="{{ route('alumni.index') }}">Alumni Directory</a>
                <a href="#">Achievements</a>
                <a href="#">Networking</a>
                <a href="{{ route('star.alumni') }}">Star Alumni</a>
                <a href="#">Career Services</a>
            </div>
            <div>
                <div class="contact-info" style="flex-direction:column;gap:10px">
                    <span>📞 +92 21 123 4567</span>
                    <span>✉️ info@poba.edu.pk</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 POBA. All rights reserved.</p>
            <div class="social-links">
                <a href="#" title="Twitter">𝕏</a>
                <a href="#" title="LinkedIn">in</a>
                <a href="#" title="Facebook">f</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="TikTok">♪</a>
            </div>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
