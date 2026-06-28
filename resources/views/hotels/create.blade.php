```blade
<x-layout>
    <x-slot:title>Create Hotel</x-slot:title>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 text-sm text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-blue-900">Home</a>

                <span class="mx-2">/</span>

                <a href="{{ route('hotels.index') }}" class="hover:text-blue-900">
                    Hotels
                </a>

                <span class="mx-2">/</span>

                <span class="text-gray-900">
                    Create Hotel
                </span>
            </div>

            {{-- Page Title --}}
            <h1 class="text-4xl font-bold text-gray-900 mb-8">
                Create New Hotel
            </h1>

            {{-- enctype is required for image upload --}}
            <form
                action="{{ route('hotels.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    {{-- =========================
                        LEFT SIDE
                    ========================== --}}
                    <div class="lg:col-span-2">

                        <div class="bg-white rounded-xl shadow-lg p-6">

                            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                                Hotel Information
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- Hotel Name --}}
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Hotel Name *
                                    </label>

                                    <x-input
                                        type="text"
                                        name="name"
                                        icon="building"
                                        placeholder="Grand Luxury Hotel"
                                        value="{{ old('name') }}"
                                        required
                                    />

                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Rating --}}
                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Rating *
                                    </label>

                                    <div class="relative">

                                        <i
                                            data-lucide="star"
                                            class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5">
                                        </i>

                                        <select
                                            name="rating"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg
                                                   focus:outline-none focus:ring-2 focus:ring-blue-900"
                                            required>

                                            <option value="">Choose Rating</option>

                                            @for($i = 1; $i <= 5; $i++)
                                                <option
                                                    value="{{ $i }}"
                                                    {{ old('rating') == $i ? 'selected' : '' }}>
                                                    {{ str_repeat('⭐', $i) }}
                                                </option>
                                            @endfor

                                        </select>

                                    </div>

                                    @error('rating')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                                {{-- Address --}}
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Address *
                                    </label>

                                    <x-input
                                        type="text"
                                        name="address"
                                        icon="map-pin"
                                        placeholder="Hotel Address"
                                        value="{{ old('address') }}"
                                        required
                                    />

                                    @error('address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                                {{-- Image Upload --}}
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Hotel Image
                                    </label>

                                    <div class="mt-1 flex justify-center px-6 py-8 border-2 border-dashed border-gray-300 rounded-lg">

                                        <div class="text-center">

                                            <i
                                                data-lucide="image"
                                                class="mx-auto h-10 w-10 text-gray-400">
                                            </i>

                                            <div class="mt-3">

                                                <label
                                                    for="image-upload"
                                                    class="cursor-pointer text-blue-900 font-medium hover:text-blue-700">

                                                    Upload Image

                                                </label>

                                                <input
                                                    id="image-upload"
                                                    type="file"
                                                    name="image"
                                                    accept="image/*"
                                                    class="hidden">

                                            </div>

                                            <p class="text-xs text-gray-500 mt-2">
                                                JPG, PNG (Max 2 MB)
                                            </p>

                                        </div>

                                    </div>

                                    @error('image')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                                {{-- Description --}}
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Description
                                    </label>

                                    <textarea
                                        name="description"
                                        rows="5"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"
                                        placeholder="Write hotel description...">{{ old('description') }}</textarea>

                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- =========================
                        RIGHT SIDE
                    ========================== --}}
                    <div class="lg:col-span-1">

                        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">

                            <h3 class="text-xl font-bold text-gray-900 mb-4">
                                Publish Hotel
                            </h3>

                            <div class="space-y-4 text-sm text-gray-600">

                                <p class="flex items-center">
                                    <i data-lucide="check-circle"
                                       class="w-4 h-4 mr-2 text-green-500"></i>

                                    Fill all required fields
                                </p>

                                <p class="flex items-center">
                                    <i data-lucide="check-circle"
                                       class="w-4 h-4 mr-2 text-green-500"></i>

                                    Upload a hotel image
                                </p>

                                <p class="flex items-center">
                                    <i data-lucide="check-circle"
                                       class="w-4 h-4 mr-2 text-green-500"></i>

                                    Review your information
                                </p>

                            </div>

                            <x-button
                                type="submit"
                                block
                                class="mt-8">

                                Create Hotel

                            </x-button>

                            <p class="text-xs text-center text-gray-500 mt-4">
                                The hotel will be added to the system after successful validation.
                            </p>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

</x-layout>
