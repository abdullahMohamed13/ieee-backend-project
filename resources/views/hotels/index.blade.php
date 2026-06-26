<x-layout>
    <x-slot:title>Hotels</x-slot:title>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Find Your Perfect Hotel</h1>
                <p class="text-gray-600">Showing {{ count($hotels) }} properties</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <aside class="hidden lg:block lg:w-80 flex-shrink-0">
                    <x-filter-panel />
                </aside>

                <div class="lg:hidden">
                    <button
                        onclick="document.getElementById('mobile-filters').classList.toggle('hidden')"
                        class="w-full bg-white rounded-lg shadow-md p-4 flex items-center justify-center space-x-2 text-blue-900 font-semibold">
                        <i data-lucide="sliders-horizontal" class="w-5 h-5"></i>
                        <span>Filters</span>
                    </button>
                    <div id="mobile-filters" class="hidden mt-4">
                        <x-filter-panel />
                    </div>
                </div>

                <div class="flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        @foreach($hotels as $hotel)
                            <x-hotel-card :hotel="$hotel" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
