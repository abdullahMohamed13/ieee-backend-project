<x-layout>
    <x-slot:title>Reset Password</x-slot:title>
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="flex justify-center mb-8">
                    <div class="flex items-center space-x-2">
                        <i data-lucide="hotel" class="w-10 h-10 text-blue-900"></i>
                        <span class="text-2xl font-bold text-blue-900 uppercase">LuxHotel</span>
                    </div>
                </div>

                @if (session('status'))
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Check Your Email</h2>
                        <p class="text-gray-600 mb-8">
                            We've sent a password reset link to <strong>{{ session('status') }}</strong>
                        </p>
                        <a href="{{ url('/forgot-password') }}"
                           class="text-blue-900 hover:text-blue-700 font-medium">
                            Didn't receive the email? Try again
                        </a>
                    </div>
                @else
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
                        <p class="text-gray-600">
                            Enter your email address and we'll send you a link to reset your password
                        </p>
                    </div>

                    <form method="POST" action="{{ url('/forgot-password') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <x-input type="email" name="email" icon="mail" placeholder="you@example.com" required />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if (session('error'))
                            <p class="text-sm text-red-600">{{ session('error') }}</p>
                        @endif

<x-button type="submit" block>Send Reset Link</x-button>
                    </form>
                @endif

                <p class="mt-8 text-center text-sm text-gray-600">
                    <a href="{{ url('/login') }}" class="font-semibold text-blue-900 hover:text-blue-700">
                        Back to Sign In
                    </a>
                </p>
            </div>
        </div>
    </main>
</x-layout>
