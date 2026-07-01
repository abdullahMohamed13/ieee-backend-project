<x-layouts.auth title="Sign In – LuxStay">

  <div class="text-center mb-8">
    <a href="{{ url('/') }}" class="text-decoration-none">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
        <img src="{{ url('logo.png') }}" alt="LuxStay" style="height: 2.5rem; width: auto;" />
        <span class="text-2xl fw-bold text-blue-900">LuxStay</span>
      </div>
    </a>
    <h2 class="fs-2 fw-bold text-gray-900 mb-2">Welcome Back</h2>
    <p class="text-gray-600">Sign in to your account to continue</p>
  </div>

  <form action="{{ url('/login') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Email Address</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="mail" class="w-5 h-5 text-gray-400" /></span>
        <input type="email" name="email" required placeholder="you@example.com" class="form-control" />
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-sm fw-medium text-gray-700">Password</label>
      <div class="input-group">
        <span class="input-group-text bg-white"><x-icon name="lock" class="w-5 h-5 text-gray-400" /></span>
        <input type="password" name="password" required placeholder="••••••••" class="form-control" />
      </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" />
        <label class="form-check-label text-sm text-gray-600" for="remember">Remember me</label>
      </div>
      {{-- <a href="{{ url('/forgot-password') }}" class="text-sm text-blue-900 text-decoration-none">Forgot password?</a> --}}
    </div>

    <x-button type="submit" variant="primary" block>Sign In</x-button>
  </form>

  <p class="mt-4 text-center text-sm text-gray-600">
    Don't have an account?
    <a href="{{ url('/register') }}" class="fw-semibold text-blue-900 text-decoration-none">Sign up</a>
  </p>

</x-layouts.auth>