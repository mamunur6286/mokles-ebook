@extends('layouts.app')

@section('content')
<!-- Book Detail Section -->
<section class="py-10">
  <div class="max-w-5xl mx-auto px-4 grid md:grid-cols-3 gap-6">
    
    <!-- Book Image -->
    <div class="md:col-span-1">
      <img src="{{ asset($book->book_image) }}" alt="{{ $book->name }}" class="w-full rounded shadow">
    </div>

    <!-- Book Info -->
    <div class="md:col-span-2">
      <h1 class="text-3xl font-bold mb-2">{{ $book->name }}</h1>
      <p class="text-gray-700 mb-2"><span class="font-semibold">লেখক:</span> {{ $book->author->name ?? null }}</p>
      <p class="text-gray-700 mb-4"><span class="font-semibold">ধরন:</span> {{ $book->category->name ?? null }}</p>
      <h2 class="text-xl font-semibold mb-2">বইয়ের বিবরণ</h2>
      <p class="text-gray-700">
        {!! $book->description !!}
      </p>
    </div>
  </div>
</section>

<!-- Lessons Section -->
<section class="py-10 bg-gray-100">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-6">বইয়ের পাঠসমূহ</h2>

        @if($book->lessons->count() > 0)
            <div class="space-y-4">
                @foreach($book->lessons as $lesson)
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                      <a href="{{ url('/'.$book->slug.'/reader?lesson='.$lesson->slug) }}" 
                         class="inline-block font-2xl mt-2 text-blue-600 hover:pointer">
                          <h3 class="text-lg font-medium mb-1">{{ $lesson->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg class="mx-auto h-20 w-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 64 64">
                    <rect x="12" y="20" width="40" height="32" rx="2" ry="2" stroke-width="2"/>
                    <path d="M12 20l20-12 20 12" stroke-width="2"/>
                    <line x1="32" y1="8" x2="32" y2="52" stroke-width="2"/>
                    <line x1="12" y1="36" x2="52" y2="36" stroke-width="2"/>
                </svg>
                <h3 class="mt-4 text-xl font-semibold text-gray-700">কোনো পাঠ পাওয়া যায়নি</h3>
                <p class="mt-2 text-gray-500">এই বইয়ের কোনো পাঠ এখনও যোগ করা হয়নি।</p>
            </div>
        @endif
    </div>
</section>

<!-- Comments Section -->
<section class="py-10 bg-gray-100">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">মন্তব্যসমূহ</h2>
    
    <!-- Comment Form -->
    <form method="get" action="/" class="mb-10 bg-white p-6 rounded-lg shadow">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
          <label for="name" class="block text-gray-700 mb-1">নাম</label>
          <input type="text" id="name" name="name" placeholder="আপনার নাম লিখুন" 
                 class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>
        <div>
          <label for="email" class="block text-gray-700 mb-1">ইমেইল</label>
          <input type="email" id="email" name="email" placeholder="আপনার ইমেইল লিখুন" 
                 class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>
      </div>
      <div class="mb-4">
        <label for="comment" class="block text-gray-700 mb-1">মন্তব্য</label>
        <textarea id="comment" name="comment" rows="4" placeholder="আপনার মন্তব্য লিখুন..." 
                  class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
      </div>
      <button type="submit" 
              class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800 transition">
        মন্তব্য জমা দিন
      </button>
    </form>

    <!-- Comments List -->
    <div class="space-y-4">
      <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-800 font-semibold">রহিম উদ্দিন</p>
        <p class="text-gray-700">বইটি সত্যিই চমৎকার। গল্পের ধারাবাহিকতা এবং চরিত্রগুলো খুবই বাস্তবসম্মত।</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-800 font-semibold">সুমিতা কর</p>
        <p class="text-gray-700">আমি গল্পের ভাষা এবং চরিত্রের গভীরতা খুব পছন্দ করেছি।</p>
      </div>
    </div>
  </div>
</section>




@endsection