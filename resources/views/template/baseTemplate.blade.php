<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    @yield('content')

    <footer class="bg-white m-1">
        <div class="w-full mx-auto py-2 text-sm text-gray-900 text-center">
            © 2023 Kelompok BWP 13-19-25-36. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
