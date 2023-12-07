<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <nav class="bg-white border border-black-1000">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('homeGuest') }}" class="flex items-center space-x-3 text-blue-500">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">RuangDosen</span>
            </a>
            <div class="items-center justify-between flex w-auto" id="navbar-search">
                <ul class="flex p-0 font-medium space-x-8 flex-row mt-0 bg-white">
                    <li>
                        <a href="{{ route('homeGuest') }}" class="block text-blue-600 bg-transparent p-0">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Courses</a>
                    </li>
                </ul>
            </div>
            <div class="flex">
                <div class="relative block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                </div>
                <div class="relative block my-2 mx-3">
                    <a class="bg-blue-600 hover:bg-blue-800 text-white py-1 px-3 border border-blue-600 rounded">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-center bg-no-repeat bg-cover bg-gray-300 bg-blend-multiply relative overflow-hidden" style="background-image: url('{{ asset('asset/jumbotron.jpg') }}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Belajar dimana saja dan kapan saja</h2>
            <p class="mb-8 text-lg font-normal text-gray-100 lg:text-xl sm:px-16 lg:px-48">Dengan Pengajar Professional setara dengan Dosen Universitas <br> dan <br> berbagai macam topik menarik</p>            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
        </div>
    </section>

    <div class="flex justify-center my-5">
        <h1 class="text-4xl font-bold text-blue-600">Our Top Lecturer</h1>
    </div>
</body>
</html>
