@extends('template.baseTemplate')

@section('title')
Lecturer
@endsection
@section('header')
    <nav class="bg-white border border-black-1000">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-blue-500">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">RuangDosen</span>
            </a>
            <div class="items-center justify-between flex w-auto" id="navbar-search">
                <ul class="flex p-0 font-medium space-x-8 flex-row mt-0 bg-white">
                    <li>
                        <a href="{{ route('home.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('listcourse.get') }}" class="block text-blue-600 bg-transparent p-0">Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('listlecturer.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Lecturer</a>
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
@endsection
@section('content')
    <div class="mt-6 mx-10">
        <!-- Lecturer  Text-->
        <div class="text-blue-400 text-3xl font-bold mb-5 text-opacity-90">
            Lecturer
        </div>
        <!-- Content -->
        <div class="text-2xl font-bold text-black mb-1">Ahmad Bambang S.Mat, M.Mat</div>
        <div class="text-xl font-italic text-gray-800">Mathematic Expert</div>
        <div class="flex mt-5">
            <img src="{{ asset('asset/male_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-32 mb-10">
            <div class="flex-col my-5 mx-5">
                <table class="table-auto">
                    <thead>
                        <tr class="text-lg">
                            <th class="px-4 py-2">Course</th>
                            <th class="px-4 py-2">Following</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>6</th>
                            <th>1</th>
                        </tr>
                    </tbody>    
                </table>
            </div>
        </div>
        <!-- Courses Text-->
        <div class="text-blue-400 text-3xl font-bold mb-5 text-opacity-90">
            Courses
        </div>
        <!-- Content listcourse -->
        <div class="flex flex-wrap items-center justify-center h-screen mb-2">
            @for($i = 0; $i < 10; $i++)
            <div class="bg-white p-1 rounded shadow-md pb-4 mb-10 mx-1" style="width:32.6%;">
                <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                <div class="p-2">
                    <div class="flex items-center">
                        <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Alvin Setia, S.Kom. M.Kom.</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                        <span class="text-gray-400">Dec 26, 2023</span>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection