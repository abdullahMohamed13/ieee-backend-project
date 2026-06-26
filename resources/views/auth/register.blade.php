<x-layout>
    <x-slot:title>
        Create Account
    </x-slot:title>
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="flex justify-center mb-8">
                    <div class="flex items-center space-x-2">
                        <i data-lucide="hotel" class="w-10 h-10 text-blue-900"></i>
                        <span class="text-2xl font-bold text-blue-900 uppercase">LuxHotel</span>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                    <p class="text-gray-600">Sign up to start booking amazing stays</p>
                </div>

                <form method="POST" action="{{ url('/register') }}" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <x-input type="text" name="first_name" icon="user" placeholder="John" required />
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <x-input type="text" name="last_name" icon="user" placeholder="Smith" required />
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <x-input type="email" name="email" icon="mail" placeholder="you@example.com" required />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <x-input type="tel" name="phone" icon="phone" placeholder="+1 (555) 000-0000" required />
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <x-input type="password" name="password" icon="lock" placeholder="••••••••" required />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <x-input type="password" name="password_confirmation" icon="lock" placeholder="••••••••" required />
                    </div>

                    <div class="flex items-start">
                        <x-input type="checkbox" name="terms" class="mt-1" required />
                        <label class="ml-2 text-sm text-gray-600">
                            I agree to the
                            <a href="#" class="text-blue-900 hover:text-blue-700">Terms of Service</a>
                            and
                            <a href="#" class="text-blue-900 hover:text-blue-700">Privacy Policy</a>
                        </label>
                    </div>
                    @error('terms')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror

<x-button type="submit" block>Create Account</x-button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="font-semibold text-blue-900 hover:text-blue-700">Sign in</a>
                </p>
            </div>
        </div>
    </main>
</x-layout>