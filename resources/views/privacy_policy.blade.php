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
                <h2 class="text-2xl font-semibold mb-4">নতুন সংযোজিত বই</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">

                    <!-- Book Card Example -->
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="assets/images/Sera-Bhromon-Kahini-1.jpg.webp" alt="বিধাগাথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">বিধাগাথা – অমরেন্দ্র চক্রবর্তী</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="আদিবাসী লোককথা" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">আদিবাসী লোককথা : ১ম খণ্ড – দেবরজ্যোতি মজুমদার</h3>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Sera-Bhromon-Kahini-1.jpg.webp" alt="শিখওঁ" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">শিখওঁ – দেবরতি মুখোপাধ্যায়</h3>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <img src="https://cdn.ebanglalibrary.com/wp-content/uploads/2025/10/Shikhandi.jpg.webp" alt="নন্দনতত্ত্ব" class="w-full h-56 object-cover">
                        <div class="p-2 text-center">
                            <h3 class="text-sm font-medium">নন্দনতত্ত্ব – সৈয়দ মনজুরুল ইসলাম</h3>
                        </div>
                    </div>

                
                   
                </div>
            </div>
        </section>

      <section class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">বইয়ের ধরন</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            
            <!-- Category Cards (20 items) -->
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">সাহিত্য</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">বিজ্ঞান</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">শিক্ষা</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">কমিকস</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">কবিতা</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">নাটক</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">প্রবন্ধ</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">বিজ্ঞান কল্পকাহিনী</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">ইতিহাস</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">সফটওয়্যার / প্রযুক্তি</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">ভ্রমণ</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">শিশুসাহিত্য</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">রান্না / রেসিপি</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">কৌতুক</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">লিরিক্স / গান</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">স্বাস্থ্য / হেলথ</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">ম্যানুয়াল / নির্দেশিকা</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">ধর্ম / আধ্যাত্মিক</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">নিবন্ধ / রচনা</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
                <p class="text-gray-700 font-medium">অনুবাদ</p>
            </div>

            </div>
        </div>
      </section>

@endsection