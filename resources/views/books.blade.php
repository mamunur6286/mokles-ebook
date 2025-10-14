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
            <h2 class="text-2xl font-semibold mb-4">All Books</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Book Card Example -->

                @foreach ($books as $book)

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="{{ asset($book->book_image) }}" alt="{{ $book->name }}" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">{{ $book->name }}</h3>
                        </div>
                    </div>
                    
                @endforeach
            
            </div>
            <div class="mt-6">
                {{ $books->links() }}
            </div>
        </div>
    </section>

     

@endsection