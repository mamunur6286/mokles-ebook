<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangla Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

{{-- Include Navbar --}}
    @include('partials.header')

        {{-- Dynamic page content --}}
        @yield('content')

    {{-- Include Footer --}}
    @include('partials.footer')

</body>
</html>