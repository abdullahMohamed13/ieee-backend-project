@props(['variant' => 'hero'])

@if($variant === 'compact')
  <form action="{{ url('/hotels') }}" method="GET" class="bg-white rounded-lg shadow-md p-4">
    <div class="flex flex-wrap gap-3">
      <div class="flex-1 min-w-[200px]">
        <input
          type="text"
          name="destination"
          placeholder="Where are you going?"
          value="{{ request('destination') }}"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"
        />
      </div>
      <x-button type="submit" variant="primary"><x-icon name="search" class="w-5 h-5" /> Search</x-button>
    </div>
  </form>
@else
  <form action="{{ url('/hotels') }}" method="GET" class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Destination</label>
        <div class="relative">
          <x-icon name="map-pin" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
          <input
            type="text"
            name="destination"
            placeholder="Where are you going?"
            value="{{ request('destination') }}"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
          />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Check-in Date</label>
        <div class="relative">
          <x-icon name="calendar" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
          <input
            type="date"
            name="check_in"
            value="{{ request('check_in') }}"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
          />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Check-out Date</label>
        <div class="relative">
          <x-icon name="calendar" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
          <input
            type="date"
            name="check_out"
            value="{{ request('check_out') }}"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent"
          />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Number of Guests</label>
        <div class="relative">
          <x-icon name="users" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
          <select
            name="guests"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent appearance-none"
          >
            <option value="1" {{ request('guests') == '1' ? 'selected' : '' }}>1 Guest</option>
            <option value="2" {{ request('guests', '2') == '2' ? 'selected' : '' }}>2 Guests</option>
            <option value="3" {{ request('guests') == '3' ? 'selected' : '' }}>3 Guests</option>
            <option value="4" {{ request('guests') == '4' ? 'selected' : '' }}>4 Guests</option>
            <option value="5" {{ request('guests') == '5' ? 'selected' : '' }}>5+ Guests</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Budget per Night</label>
        <div class="relative">
          <x-icon name="dollar-sign" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
          <select
            name="budget"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent appearance-none"
          >
            <option value="100"  {{ request('budget') == '100'  ? 'selected' : '' }}>Under $100</option>
            <option value="200"  {{ request('budget') == '200'  ? 'selected' : '' }}>$100 – $200</option>
            <option value="300"  {{ request('budget') == '300'  ? 'selected' : '' }}>$200 – $300</option>
            <option value="500"  {{ request('budget', '500') == '500' ? 'selected' : '' }}>$300 – $500</option>
            <option value="1000" {{ request('budget') == '1000' ? 'selected' : '' }}>$500+</option>
          </select>
        </div>
      </div>

      <div class="flex items-end">
        <button
          type="submit"
          class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors flex items-center justify-center space-x-2 font-semibold"
        >
          <x-icon name="search" class="w-5 h-5" />
          <span>Search Hotels</span>
        </button>
      </div>

    </div>
  </form>
@endif
