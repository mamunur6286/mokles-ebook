<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>শিক্ষা পাতা – Bangla Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

<div class="flex h-screen overflow-hidden">

        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden md:hidden" onclick="closeSidebar()"></div>
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 text-white p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 overflow-y-auto">

            <!-- Header: Logo + Close Button -->
            <div class="flex items-center justify-between mb-6">
                <!-- Logo / Title -->
                <div class="text-xl font-bold">
                    <a href="/" class="hover:text-gray-300">
                        Bangla Library
                    </a>
                </div>

                <!-- Close Button (mobile only) -->
                <button onclick="closeSidebar()" class="text-white hover:text-gray-300 md:hidden text-2xl">
                    ✕
                </button>
            </div>

            <!-- Lessons -->
            <h2 class="text-lg font-semibold mb-4">পাঠসমূহ</h2>
            <ul class="space-y-2">
                @foreach($book->lessons as $index => $lesson)
                    <li>
                        <button onclick="loadLesson({{ $index }})"
                                class="w-full text-left px-3 py-2 rounded hover:bg-gray-700 transition">
                            {{ $lesson->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </aside>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-20 hidden md:hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-0 md:ml-64 transition-all duration-300">
        <!-- Mobile top bar -->
        <div class="md:hidden flex items-center justify-between bg-gray-800 text-white p-4">
            <div class="font-bold text-lg">
                <a href="/" class="hover:text-gray-300">
                    Bangla Library
                </a>
            </div>
            <button onclick="toggleSidebar()" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto" id="lesson-content">
            <h1 class="text-3xl font-bold mb-4">পাঠ নির্বাচন করুন</h1>
            <p class="text-gray-700">বাম দিকের সাইডবার থেকে একটি পাঠ নির্বাচন করুন।</p>
        </main>

        <!-- Navigation Buttons -->
        <div class="flex justify-between p-4 bg-gray-100 border-t border-gray-300">
            <button id="prevBtn" onclick="prevLesson()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">পূর্ববর্তী</button>
            <button id="nextBtn" onclick="nextLesson()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">পরবর্তী</button>
        </div>
    </div>

</div>

<script>
const lessons = @json($lessons);

let currentLesson = null;

function loadLesson(index) {
    currentLesson = index;
    const lesson = lessons[index];
    

    // Update URL without reloading the page
    const url = `${window.location.pathname}?lesson=${lesson.slug}`;
    history.pushState({ lesson: slug }, '', url);


    // Load content
    document.getElementById('lesson-content').innerHTML = `<h1 class="text-3xl font-bold mb-4">${lesson.title}</h1>${lesson.content}`;

    // Clone sidebar into mini-sidebar container
    const sidebar = document.getElementById('sidebar');
    const miniContainer = document.getElementById('mini-sidebar');
    if(miniContainer){
        miniContainer.innerHTML = ''; // clear previous
        const clone = sidebar.cloneNode(true); 
        clone.id = 'mini-clone'; // change ID to avoid duplicate IDs
        clone.classList.remove('fixed','-translate-x-full','md:translate-x-0'); // adjust positioning
        clone.classList.add('bg-gray-100','text-gray-800','p-3','rounded','shadow','overflow-auto','max-h-64');
        miniContainer.appendChild(clone);

        // Fix click events in clone
        const buttons = clone.querySelectorAll('button');
        buttons.forEach((btn, i) => {
            btn.onclick = () => loadLesson(i);
        });
    }
closeSidebar(); // Close sidebar on mobile
}

function nextLesson() {
    if (currentLesson === null) return loadLesson(0);
    loadLesson((currentLesson + 1) % lessons.length);
}

function prevLesson() {
    if (currentLesson === null) return loadLesson(0);
    loadLesson((currentLesson - 1 + lessons.length) % lessons.length);
}


const slug = @json($slug);
const index = lessons.findIndex(lesson => lesson.slug == slug);
loadLesson(index);


function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    } else {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }
}

function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.add('-translate-x-full'); // hide sidebar
    overlay.classList.add('hidden');           // hide overlay
}

</script>


</body>
</html>