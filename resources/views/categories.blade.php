@extends('layouts.app')

@section('content')
    <!-- Search Section -->
@include('partials.search')

      <section class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">বইয়ের ধরন</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                @foreach ($categories as $category)

                    <a href="{{ url('books?category=' . $category->slug) }}">
                        <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                            <p class="text-gray-700 font-medium">{{ $category->name }}</p>
                        </div>
                    </a>

                @endforeach

            </div>
        </div>
      </section>

@endsection