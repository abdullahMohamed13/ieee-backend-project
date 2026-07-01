<x-layouts.app title="Reset Password – LuxStay" description="Reset your LuxStay account password.">

  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
      <div class="bg-white rounded-2xl shadow-xl p-8">

        {{-- Logo --}}
        <div class="flex justify-center mb-8">
          <div class="flex items-center space-x-2">
            <x-icon name="hotel" class="w-10 h-10 text-blue-900" />
            <span class="text-2xl font-bold text-blue-900">LuxStay</span>
          </div>
        </div>

        @if(session('email_sent'))
          {{-- ── Success State ─────────────────────────────────────── --}}
          <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Check Your Email</h2>
            <p class="text-gray-600 mb-8">
              We've sent a password reset link to <strong>{{ session('reset_email') }}</strong>
            </p>
            <a href="{{ url('/forgot-password') }}" class="text-blue-900 hover:text-blue-700 font-medium">
              Didn't receive the email? Try again
            </a>
          </div>
        @else
          {{-- ── Request Form ──────────────────────────────────────── --}}
          <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
            <p class="text-gray-600">
              Enter your email address and we'll send you a link to reset your password
            </p>
          </div>

          <form action="{{ url('/forgot-password') }}" method="POST" class="space-y-6">
            @csrf
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
              <div class="relative">
                <x-icon name="mail" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                <input
                  type="email"
                  name="email"
                  required
                  placeholder="you@example.com"
                  class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
                />
              </div>
            </div>
            <button
              type="submit"
              class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold"
            >
              Send Reset Link
            </button>
          </form>
        @endif

        {{-- Back to Login --}}
        <p class="mt-8 text-center text-sm text-gray-600">
          <a href="{{ url('/login') }}" class="font-semibold text-blue-900 hover:text-blue-700">
            Back to Sign In
          </a>
        </p>

      </div>
    </div>
  </div>

</x-layouts.app>
