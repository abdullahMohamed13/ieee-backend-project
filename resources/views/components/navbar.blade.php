{{--
    resources/views/components/navbar.blade.php
    Mirrors: src/app/components/Navbar.tsx
--}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('logo.png') }}" alt="LuxHotel" class="h-12 w-auto rounded">
                <span class="text-xl font-bold uppercase text-blue-900">LuxHotel</span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                   class="transition-colors {{ request()->is('/') || request()->is('') ? 'text-blue-900 font-semibold' : 'text-gray-700 hover:text-blue-900' }}">
                    Home
                </a>
                <a href="{{ url('/hotels') }}"
                   class="transition-colors {{ request()->is('hotels') || request()->is('hotels/*') ? 'text-blue-900 font-semibold' : 'text-gray-700 hover:text-blue-900' }}">
                    Hotels
                </a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                    class="transition-colors {{ request()->is('dashboard') ? 'text-blue-900 font-semibold' : 'text-gray-700 hover:text-blue-900' }}">
                        My Dashboard
                    </a>
                    
                    @if(auth()->user()->is_admin ?? false)
                        <a href="{{ url('/admin') }}"
                        class="transition-colors {{ request()->is('admin*') ? 'text-blue-900 font-semibold' : 'text-gray-700 hover:text-blue-900' }}">
                            Admin
                        </a>
                    @endif
                @endauth
            </div>

            {{-- Desktop Auth Buttons --}}
            <div class="hidden md:flex items-center space-x-4">
                @auth
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-900">
                        <i data-lucide="user" class="w-5 h-5"></i>
                        <span>Profile</span>
                    </button>
                    <form method="POST" action="{{ url('/logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center space-x-2 text-gray-700 hover:text-red-600">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
                @else
                <a href="{{ url('/login') }}" class="text-blue-900 hover:text-blue-700 font-medium">Login</a>
<x-button href="{{ url('/register') }}" size="sm">Register</x-button>
@endauth
</div>

{{-- Mobile menu button --}}
            <button
                id="mobile-menu-btn"
                onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                class="md:hidden text-gray-700">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        {{-- Mobile Navigation --}}
        <div id="mobile-menu" class="hidden md:hidden py-4 space-y-3">
            <a href="{{ url('/') }}" class="block text-gray-700 hover:text-blue-900">Home</a>
            <a href="{{ url('/hotels') }}" class="block text-gray-700 hover:text-blue-900">Hotels</a>
            @auth
            <a href="{{ url('/dashboard') }}" class="block text-gray-700 hover:text-blue-900">My Dashboard</a>
            @if(auth()->user()->is_admin ?? false)
            <a href="{{ url('/admin') }}" class="block text-gray-700 hover:text-blue-900">Admin</a>
            @endif
            @endauth
            <div class="pt-3 border-t space-y-3">
                @auth
                <button class="block w-full text-left text-gray-700 hover:text-blue-900">Profile</button>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left text-gray-700 hover:text-red-600">Logout</button>
                </form>
                @else
                <a href="{{ url('/login') }}" class="block text-blue-900 hover:text-blue-700">Login</a>
<x-button href="{{ url('/register') }}" block size="sm">Register</x-button>
                @endauth
            </div>
        </div>
    </div>
</nav>
