<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-500 text-white font-sans antialiased">
    <nav class="bg-gray-800 shadow-lg p-4">
        <div class="container mx-auto">
            <span>Movie Apps</span>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-center text-gray-300 p-4 mt-5">
        &copy; {{ date('Y') }} Movie Apps
    </footer>
</body>
</html>