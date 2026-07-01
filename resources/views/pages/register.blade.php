<x-layouts.app title="Create Account – LuxStay" description="Sign up for a LuxStay account and start booking luxury hotels.">

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

        {{-- Header --}}
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
          <p class="text-gray-600">Sign up to start booking amazing stays</p>
        </div>

        {{-- Form --}}
        <form action="{{ url('/register') }}" method="POST" class="space-y-4">
          @csrf

          {{-- Name Row --}}
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
              <div class="relative">
                <x-icon name="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                <input
                  type="text"
                  name="first_name"
                  required
                  class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
                />
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
              <div class="relative">
                <x-icon name="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                <input
                  type="text"
                  name="last_name"
                  required
                  class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
                />
              </div>
            </div>
          </div>

          {{-- Email --}}
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

          {{-- Phone --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
            <div class="relative">
              <x-icon name="phone" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="tel"
                name="phone"
                required
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
              />
            </div>
          </div>

          {{-- Password --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <div class="relative">
              <x-icon name="lock" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="password"
                name="password"
                required
                placeholder="••••••••"
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
              />
            </div>
          </div>

          {{-- Confirm Password --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
            <div class="relative">
              <x-icon name="lock" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="password"
                name="password_confirmation"
                required
                placeholder="••••••••"
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
              />
            </div>
          </div>

          {{-- Terms --}}
          <div class="flex items-start">
            <input
              type="checkbox"
              name="terms"
              required
              class="w-4 h-4 mt-1 text-blue-900 border-gray-300 rounded focus:ring-blue-900"
            />
            <label class="ml-2 text-sm text-gray-600">
              I agree to the
              <a href="#" class="text-blue-900 hover:text-blue-700">Terms of Service</a>
              and
              <a href="#" class="text-blue-900 hover:text-blue-700">Privacy Policy</a>
            </label>
          </div>

          <button
            type="submit"
            class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold"
          >
            Create Account
          </button>
        </form>

        {{-- Sign In Link --}}
        <p class="mt-6 text-center text-sm text-gray-600">
          Already have an account?
          <a href="{{ url('/login') }}" class="font-semibold text-blue-900 hover:text-blue-700">Sign in</a>
        </p>

      </div>
    </div>
  </div>

</x-layouts.app>
