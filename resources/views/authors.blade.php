@extends('layouts.app')

@section('content')
    <!-- Search Section -->
    <section class="bg-gray-200 p-6">
        <!-- Page Title -->
        <div class="mb-4 text-center">
            <h1 class="text-4xl font-bold">Bangla Books (বাংলা বই)</h1>
            <p class="mt-2 text-gray-700">Read Bengali Books online free. PDF download is not required.</p>
        </div>
        <div class="max-w-4xl mx-auto">
        <input type="text" placeholder="Search books..." 
              class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
    </section>

      <section class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">লেখক</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                @foreach ($authors as $author)

                    <!-- Author Cards (20 items) -->
                    <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                        <p class="text-gray-700 font-medium">{{ $author->name }} (  {{ $author->books_count }} বই)</p>
                    </div>

                @endforeach

            </div>
        </div>
      </section>

@endsection