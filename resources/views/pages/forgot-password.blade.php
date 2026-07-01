<x-layouts.auth title="Reset Password – LuxStay">

  <div class="text-center mb-6">
    <a href="{{ url('/') }}" class="text-decoration-none">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
        <img src="{{ url('logo.png') }}" alt="LuxStay" style="height: 2.5rem; width: auto;" />
        <span class="text-2xl fw-bold text-blue-900">LuxStay</span>
      </div>
    </a>

    @if(session('email_sent'))
      <div class="text-center">
        <div class="d-flex align-items-center justify-content-center mb-4">
          <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:64px;height:64px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="fs-2 fw-bold text-gray-900 mb-2">Check Your Email</h2>
        <p class="text-gray-600 mb-4">
          We've sent a password reset link to <strong>{{ session('reset_email') }}</strong>
        </p>
        <a href="{{ url('/forgot-password') }}" class="text-blue-900 text-decoration-none fw-medium">
          Didn't receive the email? Try again
        </a>
      </div>
    @else
      <h2 class="fs-2 fw-bold text-gray-900 mb-2">Reset Password</h2>
      <p class="text-gray-600">
        Enter your email address and we'll send you a link to reset your password
      </p>
    @endif
  </div>

  @if(!session('email_sent'))
    <form action="{{ url('/forgot-password') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="form-label text-sm fw-medium text-gray-700">Email Address</label>
        <div class="input-group">
          <span class="input-group-text bg-white"><x-icon name="mail" class="w-5 h-5 text-gray-400" /></span>
          <input type="email" name="email" required placeholder="you@example.com" class="form-control" />
        </div>
      </div>
      <x-button type="submit" variant="primary" block>Send Reset Link</x-button>
    </form>
  @endif

  <p class="mt-4 text-center text-sm text-gray-600">
    <a href="{{ url('/login') }}" class="fw-semibold text-blue-900 text-decoration-none">
      Back to Sign In
    </a>
  </p>

</x-layouts.auth>