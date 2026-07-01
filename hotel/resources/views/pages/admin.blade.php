@php
  // ── Mock booking data ─────────────────────────────────────────────────────
  $bookings = [
    ['id'=>'b1','hotelId'=>'1','hotelName'=>'Grand Luxury Hotel','roomType'=>'Deluxe King',
     'checkIn'=>'2026-07-15','checkOut'=>'2026-07-18','guests'=>2,'totalPrice'=>897,
     'status'=>'confirmed','userName'=>'John Smith','userEmail'=>'john.smith@example.com'],
    ['id'=>'b2','hotelId'=>'2','hotelName'=>'Seaside Resort & Spa','roomType'=>'Ocean View Room',
     'checkIn'=>'2026-08-01','checkOut'=>'2026-08-05','guests'=>2,'totalPrice'=>1396,
     'status'=>'pending','userName'=>'Sarah Johnson','userEmail'=>'sarah.j@example.com'],
    ['id'=>'b3','hotelId'=>'3','hotelName'=>'Mountain View Lodge','roomType'=>'Mountain View Room',
     'checkIn'=>'2026-07-20','checkOut'=>'2026-07-23','guests'=>3,'totalPrice'=>567,
     'status'=>'confirmed','userName'=>'Michael Brown','userEmail'=>'m.brown@example.com'],
    ['id'=>'b4','hotelId'=>'7','hotelName'=>'Coastal Paradise Hotel','roomType'=>'Beach Suite',
     'checkIn'=>'2026-09-10','checkOut'=>'2026-09-15','guests'=>4,'totalPrice'=>1595,
     'status'=>'confirmed','userName'=>'Emily Davis','userEmail'=>'emily.d@example.com'],
  ];

  $revenueData = [
    ['month'=>'Jan','revenue'=>45000],
    ['month'=>'Feb','revenue'=>52000],
    ['month'=>'Mar','revenue'=>48000],
    ['month'=>'Apr','revenue'=>61000],
    ['month'=>'May','revenue'=>55000],
    ['month'=>'Jun','revenue'=>67000],
  ];

  $bookingTrends = [
    ['month'=>'Jan','bookings'=>142],
    ['month'=>'Feb','bookings'=>165],
    ['month'=>'Mar','bookings'=>138],
    ['month'=>'Apr','bookings'=>189],
    ['month'=>'May','bookings'=>176],
    ['month'=>'Jun','bookings'=>208],
  ];

  $statusColors = [
    'confirmed' => 'bg-green-100 text-green-800',
    'pending'   => 'bg-yellow-100 text-yellow-800',
    'cancelled' => 'bg-red-100 text-red-800',
  ];
@endphp

<x-layouts.app title="Admin Dashboard – LuxStay" description="LuxStay administration dashboard.">

  <div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- ── Header ──────────────────────────────────────────────────── --}}
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
          <p class="text-gray-600">Welcome back! Here's what's happening today.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-4">
          <a
            href="{{ url('/admin/hotels') }}"
            class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold"
          >
            Manage Hotels
          </a>
        </div>
      </div>

      {{-- ── Stats Grid ───────────────────────────────────────────────── --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-stat-card
          title="Total Hotels"
          value="156"
          icon="hotel"
          :trend="['value' => '12% increase', 'isPositive' => true]"
          color="blue"
        />
        <x-stat-card
          title="Total Rooms"
          value="1,248"
          icon="bed"
          :trend="['value' => '8% increase', 'isPositive' => true]"
          color="green"
        />
        <x-stat-card
          title="Total Bookings"
          value="3,842"
          icon="calendar"
          :trend="['value' => '23% increase', 'isPositive' => true]"
          color="purple"
        />
        <x-stat-card
          title="Revenue"
          value="$428K"
          icon="dollar-sign"
          :trend="['value' => '15% increase', 'isPositive' => true]"
          color="orange"
        />
      </div>

      {{-- ── Charts (pure HTML/CSS bar simulation) ──────────────────── --}}
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

        {{-- Revenue Chart --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Monthly Revenue</h3>
          <div class="flex items-end justify-between h-48 gap-2">
            @php $maxRev = max(array_column($revenueData, 'revenue')); @endphp
            @foreach($revenueData as $item)
              @php $heightPct = round(($item['revenue'] / $maxRev) * 100); @endphp
              <div class="flex flex-col items-center flex-1">
                <div
                  class="w-full bg-blue-900 rounded-t-sm transition-all hover:bg-blue-700"
                  style="height: {{ $heightPct }}%"
                  title="${{ number_format($item['revenue']) }}"
                ></div>
                <span class="text-xs text-gray-600 mt-1">{{ $item['month'] }}</span>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Booking Trends Chart --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Booking Trends</h3>
          <div class="flex items-end justify-between h-48 gap-2">
            @php $maxBook = max(array_column($bookingTrends, 'bookings')); @endphp
            @foreach($bookingTrends as $item)
              @php $heightPct = round(($item['bookings'] / $maxBook) * 100); @endphp
              <div class="flex flex-col items-center flex-1">
                <div
                  class="w-full bg-purple-600 rounded-t-sm transition-all hover:bg-purple-500"
                  style="height: {{ $heightPct }}%"
                  title="{{ $item['bookings'] }} bookings"
                ></div>
                <span class="text-xs text-gray-600 mt-1">{{ $item['month'] }}</span>
              </div>
            @endforeach
          </div>
        </div>

      </div>

      {{-- ── Quick Stats ──────────────────────────────────────────────── --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">Occupancy Rate</h3>
            <x-icon name="trending-up" class="w-5 h-5 text-green-600" />
          </div>
          <p class="text-3xl font-bold text-gray-900 mb-2">87.5%</p>
          <p class="text-sm text-gray-600">Average across all properties</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">Avg. Booking Value</h3>
            <x-icon name="dollar-sign" class="w-5 h-5 text-blue-600" />
          </div>
          <p class="text-3xl font-bold text-gray-900 mb-2">$847</p>
          <p class="text-sm text-gray-600">Per booking this month</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">Active Customers</h3>
            <x-icon name="users" class="w-5 h-5 text-purple-600" />
          </div>
          <p class="text-3xl font-bold text-gray-900 mb-2">2,847</p>
          <p class="text-sm text-gray-600">Registered users</p>
        </div>
      </div>

      {{-- ── Recent Bookings Table ─────────────────────────────────────── --}}
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-gray-900">Recent Bookings</h3>
          <a href="{{ url('/admin/bookings') }}" class="text-blue-900 hover:text-blue-700 font-semibold text-sm">
            View All
          </a>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="border-b">
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Booking ID</th>
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Hotel</th>
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Guest</th>
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Check-in</th>
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Amount</th>
                <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $booking)
                <tr class="border-b hover:bg-gray-50">
                  <td class="py-4 px-4 font-medium">#{{ $booking['id'] }}</td>
                  <td class="py-4 px-4">{{ $booking['hotelName'] }}</td>
                  <td class="py-4 px-4">{{ $booking['userName'] }}</td>
                  <td class="py-4 px-4 text-gray-600">{{ $booking['checkIn'] }}</td>
                  <td class="py-4 px-4 font-semibold">${{ $booking['totalPrice'] }}</td>
                  <td class="py-4 px-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $statusColors[$booking['status']] ?? 'bg-gray-100 text-gray-800' }}">
                      {{ $booking['status'] }}
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

</x-layouts.app>
