@extends('layouts.app')

@section('content')
    <!-- Search Section -->
@include('partials.search')

      <section class="py-10">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">বইয়ের ধরন</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            @foreach ($series as $item)
                <a href="{{ url('books?series=' . $item->slug) }}">
                    <div
                        class="relative rounded-lg overflow-hidden shadow-md hover:shadow-xl transition group h-40 md:h-48 bg-center bg-cover"
                        style="background-image: url('{{ asset($item->banner_image ?? 'default.jpg') }}');">
                        
                        <!-- Dark overlay for contrast -->
                        <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 transition"></div>

                        <!-- Floating text -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold drop-shadow-lg px-2 text-center">
                                {{ $item->name }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>


@endsection