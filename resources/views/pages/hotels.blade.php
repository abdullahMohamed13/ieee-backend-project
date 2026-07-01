<x-layouts.app title="Hotels – LuxStay" description="Browse our full selection of luxury hotels worldwide.">

  <div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Find Your Perfect Hotel</h1>
        <p class="text-gray-600">Showing {{ count($allHotels) }} properties</p>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">

        <aside class="hidden lg:block lg:w-80 flex-shrink-0">
          <x-filter-panel />
        </aside>

        {{-- <div class="lg:hidden">
          <button
            onclick="document.getElementById('mobile-filters').classList.toggle('hidden')"
            class="w-full bg-white rounded-lg shadow-md p-4 flex items-center justify-center space-x-2 text-blue-900 font-semibold"
          >
            <x-icon name="sliders-horizontal" class="w-5 h-5" />
            <span>Filters</span>
          </button>
          <div id="mobile-filters" class="hidden mt-4">
            <x-filter-panel />
          </div>
        </div> --}}

        <div class="flex-1">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            @forelse($currentHotels as $hotel)
              <x-hotel-card :hotel="$hotel" />
            @empty
              <div class="col-span-full text-center py-16">
                <x-icon name="search" class="w-16 h-16 text-gray-300 mx-auto mb-4" />
                <h3 class="text-2xl font-semibold text-gray-500 mb-2">No hotels found</h3>
                <p class="text-gray-400">Try adjusting your filters or search for a different destination.</p>
              </div>
            @endforelse
          </div>

          <div class="flex items-center justify-center space-x-2">
            @if($currentPage > 1)
              <a
                href="{{ url('/hotels?page=' . ($currentPage - 1)) }}"
                class="p-2 rounded-lg border bg-white hover:bg-gray-50"
              >
                <x-icon name="chevron-left" class="w-5 h-5" />
              </a>
            @else
              <span class="p-2 rounded-lg border bg-white opacity-50 cursor-not-allowed">
                <x-icon name="chevron-left" class="w-5 h-5" />
              </span>
            @endif

            @for($i = 1; $i <= $totalPages; $i++)
              <a
                href="{{ url('/hotels?page=' . $i) }}"
                class="px-4 py-2 rounded-lg {{ $currentPage === $i ? 'bg-blue-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }}"
              >
                {{ $i }}
              </a>
            @endfor

            @if($currentPage < $totalPages)
              <a
                href="{{ url('/hotels?page=' . ($currentPage + 1)) }}"
                class="p-2 rounded-lg border bg-white hover:bg-gray-50"
              >
                <x-icon name="chevron-right" class="w-5 h-5" />
              </a>
            @else
              <span class="p-2 rounded-lg border bg-white opacity-50 cursor-not-allowed">
                <x-icon name="chevron-right" class="w-5 h-5" />
              </span>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>

</x-layouts.app>
