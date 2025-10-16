@extends('layouts.app')

@section('content')
    <!-- Search Section -->
    
    @include('partials.search')

     <!-- Books Section -->

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4">

        <form action="{{ url('books') }}" method="GET" id="bookSearchForm"
      class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end rounded-lg p-4 bg-white shadow">

    <!-- Author -->
    <div>
        <label for="author" class="block text-sm font-medium text-gray-700 mb-1">লেখক</label>
        <select id="author" name="author"
                class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">সব লেখক</option>
            @foreach ($authors as $author)
                <option value="{{ $author->slug }}" {{ request('author') == $author->slug ? 'selected' : '' }}>
                    {{ $author->name }} ({{ $author->books_count }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">বিভাগ</label>
        <select id="category" name="category"
                class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">সব বিভাগ</option>
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }} ({{ $category->books_count }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Series -->
    <div>
        <label for="series" class="block text-sm font-medium text-gray-700 mb-1">সিরিজ</label>
        <select id="series" name="series"
                class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">সব সিরিজ</option>
            @foreach ($series as $item)
                <option value="{{ $item->slug }}" {{ request('series') == $item->slug ? 'selected' : '' }}>
                    {{ $item->name }} ({{ $item->books_count }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Sort -->
    <div>
        <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">বই সাজান</label>
        <select id="sort" name="sort"
                class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option @if(request('sort') == 'a_z') selected @endif value="a_z">বইয়ের নামানুসারে (A-Z)</option>
            <option @if(request('sort') == 'z_a') selected @endif value="z_a">বইয়ের নামানুসারে (Z-A)</option>
            <option @if(request('sort') == 'oldfirst') selected @endif value="oldfirst">পুরাতন তারিখ অনুসারে</option>
            <option @if(request('sort') == 'newfirst') selected @endif value="newfirst">নতুন তারিখ অনুসারে</option>
        </select>
    </div>

    <!-- Buttons -->
    <div class="md:col-span-4 flex gap-2 justify-end mt-2">
        <button type="submit"
                class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800 transition">
            অনুসন্ধান করুন
        </button>
        <a href="{{ url('books') }}"
           class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 transition">
            রিসেট করুন
        </a>
    </div>
</form>
 
        </div>
        <div class="max-w-7xl mx-auto px-4 mt-5">
    <h2 class="text-2xl font-semibold mb-4">All Books</h2>

    @if ($books->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach ($books as $book)
                <a href="{{ url('books/' . $book->slug) }}">
                    <div class="bg-white shadow rounded overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset($book->book_image) }}" alt="{{ $book->name }}" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">{{ $book->name }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>

    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            
            <h3 class=" text-xl font-semibold text-gray-800">( খালি )</h3>
            <h3 class="mt-4 text-xl font-semibold text-gray-800">কোনো বই পাওয়া যায়নি</h3>
            <p class="mt-2 text-gray-500">দয়া করে অন্য অনুসন্ধান বা ফিল্টার ব্যবহার করুন।</p>
        </div>
    @endif
</div>

    </section>

     

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bookSearchForm');

    ['author', 'category', 'series', 'sort'].forEach(id => {
        document.getElementById(id).addEventListener('change', () => form.submit());
    });

    const nameInput = document.getElementById('name');
    let typingTimer;
    nameInput.addEventListener('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => form.submit(), 600);
    });
    });
</script>
@endsection