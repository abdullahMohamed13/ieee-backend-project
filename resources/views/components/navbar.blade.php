@php
    $isLoggedIn = auth()->check();
    $isAdmin = $isLoggedIn && auth()->user()->isAdmin();
    
    $isActive = function($path) {
        $current = request()->path();
        if ($current === '/' || $current === '') {
            $current = '/';
        } else {
            $current = '/' . ltrim($current, '/');
        }
        return $current === $path;
    };
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
      <x-icon name="hotel" class="me-2" style="width: 2rem; height: 2rem; color: var(--primary-color);" />
      <span class="fw-bold text-primary-custom">LuxStay</span>
    </a>

    <!-- Mobile toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ $isActive('/') ? 'active fw-semibold text-primary-custom' : '' }}" 
             href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $isActive('/hotels') ? 'active fw-semibold text-primary-custom' : '' }}" 
             href="{{ url('/hotels') }}">Hotels</a>
        </li>
        @if($isLoggedIn)
          <li class="nav-item">
            <a class="nav-link {{ $isActive('/dashboard') ? 'active fw-semibold text-primary-custom' : '' }}" 
               href="{{ url('/dashboard') }}">My Dashboard</a>
          </li>
        @endif
        @if($isAdmin)
          <li class="nav-item">
            <a class="nav-link {{ $isActive('/admin') ? 'active fw-semibold text-primary-custom' : '' }}" 
               href="{{ url('/admin') }}">Admin</a>
          </li>
        @endif
      </ul>

      <!-- Auth Buttons -->
      <div class="d-flex align-items-center">
        @if($isLoggedIn)
          <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <x-icon name="user" class="me-1" style="width: 1rem; height: 1rem;" />
              {{ auth()->user()->first_name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">
                    <x-icon name="log-out" class="me-1" style="width: 1rem; height: 1rem;" />
                    Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <a href="{{ url('/login') }}" class="btn btn-outline-primary me-2">Login</a>
          <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
        @endif
      </div>
    </div>
  </div>
</nav>
