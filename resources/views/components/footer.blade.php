{{--
    resources/views/components/footer.blade.php
    Mirrors: src/app/components/Footer.tsx
--}}
<footer class="bg-blue-900 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- Company Info --}}
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <i data-lucide="hotel" class="w-8 h-8"></i>
                    <span class="text-xl font-bold">LuxHotel</span>
                </div>
                <p class="text-blue-100 mb-4">
                    Your trusted partner for luxury hotel bookings worldwide. Experience comfort, elegance, and exceptional service.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-100 hover:text-white transition-colors">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-blue-100 hover:text-white transition-colors">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-blue-100 hover:text-white transition-colors">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-blue-100 hover:text-white transition-colors">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="font-semibold text-lg mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-blue-100 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ url('/hotels') }}" class="text-blue-100 hover:text-white transition-colors">Hotels</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            {{-- Support --}}
            <div>
                <h3 class="font-semibold text-lg mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Cookie Policy</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="font-semibold text-lg mb-4">Contact Us</h3>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3">
                        <i data-lucide="map-pin" class="w-5 h-5 mt-0.5 flex-shrink-0"></i>
                        <span class="text-blue-100">123 Luxury Avenue, New York, NY 10001</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i data-lucide="phone" class="w-5 h-5 flex-shrink-0"></i>
                        <span class="text-blue-100">+1 (555) 123-4567</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i data-lucide="mail" class="w-5 h-5 flex-shrink-0"></i>
                        <span class="text-blue-100">support@luxhotel.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-blue-800 mt-8 pt-8 text-center text-blue-100">
            <p>&copy; {{ date('Y') }} LuxHotel. All rights reserved.</p>
        </div>
    </div>
</footer>
