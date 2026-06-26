<x-layout>
    <x-slot:title>Complete Your Booking</x-slot:title>
    @php
        $nights = 3;
        $subtotal = $hotel['price'] * $nights;
        $taxes = $subtotal * 0.15;
        $total = $subtotal + $taxes;
    @endphp
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 text-sm text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-blue-900">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/hotels') }}" class="hover:text-blue-900">Hotels</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/hotels/' . $hotel['id']) }}" class="hover:text-blue-900">{{ $hotel['name'] }}</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">Booking</span>
            </div>

            <h1 class="text-4xl font-bold text-gray-900 mb-8">Complete Your Booking</h1>

            <form method="POST" action="{{ url('/booking/' . $hotel['id']) }}">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Guest Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <x-input type="text" name="first_name" icon="user" placeholder="John" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <x-input type="text" name="last_name" icon="user" placeholder="Smith" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <x-input type="email" name="email" icon="mail" placeholder="you@example.com" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                    <x-input type="tel" name="phone" icon="phone" placeholder="+1 (555) 000-0000" required />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                    <x-input type="text" name="address" icon="map-pin" placeholder="123 Main Street" />
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Booking Details</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-in Date *</label>
                                    <x-input type="date" name="check_in" icon="calendar" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-out Date *</label>
                                    <x-input type="date" name="check_out" icon="calendar" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Number of Guests *</label>
                                    <div class="relative">
                                        <i data-lucide="users" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                        <select name="guests" required
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                                            <option value="1">1 Guest</option>
                                            <option value="2" selected>2 Guests</option>
                                            <option value="3">3 Guests</option>
                                            <option value="4">4 Guests</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Room Type *</label>
                                    <select name="room_type" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                                        <option value="Deluxe King">Deluxe King</option>
                                        <option value="Executive Suite">Executive Suite</option>
                                        <option value="Presidential Suite">Presidential Suite</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests</label>
                                    <textarea name="special_requests" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"
                                        placeholder="Any special requests or requirements..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Payment Information</h2>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Card Number *</label>
                                    <x-input type="text" name="card_number" icon="credit-card" placeholder="1234 5678 9012 3456" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name *</label>
                                    <x-input type="text" name="card_name" placeholder="John Doe" required />
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date *</label>
                                        <x-input type="text" name="expiry_date" placeholder="MM/YY" required />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">CVV *</label>
                                        <x-input type="text" name="cvv" placeholder="123" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Booking Summary</h3>
                            <div class="mb-4">
                                <img src="{{ $hotel['image'] }}" alt="{{ $hotel['name'] }}"
                                     class="w-full h-40 object-cover rounded-lg mb-4">
                                <h4 class="font-semibold text-gray-900">{{ $hotel['name'] }}</h4>
                                <p class="text-sm text-gray-600">{{ $hotel['location'] }}</p>
                            </div>
                            <div class="space-y-3 py-4 border-t border-b">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Check-in</span>
                                    <span class="font-medium">Jul 15, 2026</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Check-out</span>
                                    <span class="font-medium">Jul 18, 2026</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Guests</span>
                                    <span class="font-medium">2 Adults</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Room Type</span>
                                    <span class="font-medium">Deluxe King</span>
                                </div>
                            </div>
                            <div class="space-y-3 py-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">${{ $hotel['price'] }} × {{ $nights }} nights</span>
                                    <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Taxes & Fees</span>
                                    <span class="font-medium">${{ number_format($taxes, 2) }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t">
                                <span class="font-bold text-lg text-gray-900">Total</span>
                                <span class="font-bold text-2xl text-blue-900">${{ number_format($total, 2) }}</span>
                            </div>
<x-button type="submit" block class="mt-6">Confirm Booking</x-button>
                            <p class="text-xs text-gray-600 text-center mt-4">
                                By confirming, you agree to our Terms & Conditions
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
