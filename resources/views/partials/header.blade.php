 <!-- Header -->
    <header class="text-white p-4" style="background-color: #556B2F;">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">

        <!-- Logo -->
        <div class="text-lg font-bold mb-2 md:mb-0">
          <a href="{{ url('/') }}" class="hover:pointer">
            Bangla Library  
          </a>
        </div>

        <!-- Menu -->
        <nav class="flex flex-wrap justify-center md:justify-start space-x-4 mb-2 md:mb-0 text-sm">
          <a href="{{ url('/') }}" class="hover:underline">হোম</a>
          <a href="{{ url('/books') }}" class="hover:underline">সব বই</a>
          <a href="{{ url('/authors') }}" class="hover:underline">লেখক</a>
          <a href="{{ url('/categories') }}" class="hover:underline">বইয়ের ধরন</a>
          <a href="{{ url('/series') }}" class="hover:underline">সিরিজ</a>
        </nav>

        <!-- Account / Login -->
        <div class="space-x-4">
          <a href="#" class="hover:underline">Login/Register</a>
          <a href="#" class="hover:underline">Account</a>
        </div>

      </div>
    </header>



