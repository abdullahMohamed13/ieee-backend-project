@php
  // ── Mock hotels data ──────────────────────────────────────────────────────
  $allHotels = [
    ['id'=>'1','name'=>'Grand Luxury Hotel','location'=>'Downtown, New York','city'=>'New York','rating'=>5,'price'=>299,'featured'=>true,'image'=>'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800','amenities'=>['WiFi','Pool','Spa','Gym','Restaurant','Bar','Room Service','Parking']],
    ['id'=>'2','name'=>'Seaside Resort & Spa','location'=>'Beachfront, Miami','city'=>'Miami','rating'=>5,'price'=>349,'featured'=>true,'image'=>'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800','amenities'=>['WiFi','Beach Access','Spa','Pool','Restaurant','Bar','Water Sports']],
    ['id'=>'3','name'=>'Mountain View Lodge','location'=>'Aspen, Colorado','city'=>'Aspen','rating'=>4,'price'=>189,'featured'=>true,'image'=>'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800','amenities'=>['WiFi','Ski Storage','Fireplace','Restaurant','Parking','Gym']],
    ['id'=>'4','name'=>'City Center Hotel','location'=>'Downtown, Chicago','city'=>'Chicago','rating'=>4,'price'=>159,'featured'=>false,'image'=>'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800','amenities'=>['WiFi','Business Center','Gym','Restaurant','Parking']],
    ['id'=>'5','name'=>'Desert Oasis Resort','location'=>'Scottsdale, Arizona','city'=>'Scottsdale','rating'=>5,'price'=>279,'featured'=>false,'image'=>'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800','amenities'=>['WiFi','Golf Course','Spa','Pool','Restaurant','Tennis Court']],
    ['id'=>'6','name'=>'Historic Downtown Inn','location'=>'French Quarter, New Orleans','city'=>'New Orleans','rating'=>4,'price'=>139,'featured'=>false,'image'=>'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800','amenities'=>['WiFi','Restaurant','Bar','Courtyard','Room Service']],
    ['id'=>'7','name'=>'Coastal Paradise Hotel','location'=>'Santa Monica, California','city'=>'Los Angeles','rating'=>5,'price'=>319,'featured'=>true,'image'=>'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800','amenities'=>['WiFi','Beach Access','Pool','Spa','Restaurant','Gym','Bike Rentals']],
    ['id'=>'8','name'=>'Urban Boutique Hotel','location'=>'SoHo, New York','city'=>'New York','rating'=>4,'price'=>229,'featured'=>false,'image'=>'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800','amenities'=>['WiFi','Rooftop Bar','Restaurant','Concierge','Art Gallery']],
  ];

  $itemsPerPage = 6;
  $currentPage  = max(1, (int)request('page', 1));
  $totalPages   = (int)ceil(count($allHotels) / $itemsPerPage);
  $currentPage  = min($currentPage, $totalPages);
  $currentHotels = array_slice($allHotels, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
@endphp

<x-layouts.app title="Hotels – LuxStay" description="Browse our full selection of luxury hotels worldwide.">

  <div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- ── Header ──────────────────────────────────────────────────── --}}
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Find Your Perfect Hotel</h1>
        <p class="text-gray-600">Showing {{ count($allHotels) }} properties</p>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">

        {{-- ── Desktop Filter Sidebar ────────────────────────────────── --}}
        <aside class="hidden lg:block lg:w-80 flex-shrink-0">
          <x-filter-panel />
        </aside>

        {{-- ── Mobile Filter Toggle ──────────────────────────────────── --}}
        <div class="lg:hidden">
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
        </div>

        {{-- ── Hotels Grid ───────────────────────────────────────────── --}}
        <div class="flex-1">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            @foreach($currentHotels as $hotel)
              <x-hotel-card :hotel="$hotel" />
            @endforeach
          </div>

          {{-- ── Pagination ────────────────────────────────────────── --}}
          <div class="flex items-center justify-center space-x-2">
            {{-- Prev --}}
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

            {{-- Next --}}
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
