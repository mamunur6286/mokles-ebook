<section class="bg-gray-200 p-6">
    <!-- Page Title -->
    <div class="mb-4 text-center">
        <h1 class="text-4xl font-bold">Bangla Books (বাংলা বই)</h1>
        <p class="mt-2 text-gray-700">Read Bengali Books online free. PDF download is not required.</p>
    </div>

    <!-- Search Form -->
    <div class="max-w-4xl mx-auto">
        <form action="{{ url('books') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" placeholder="Search books..."
                value="{{ request('search') }}"
                class="flex-1 p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
                    class="bg-green-700 text-white px-6 py-3 rounded hover:bg-green-800 transition">
                Search
            </button>
        </form>
    </div>
</section>