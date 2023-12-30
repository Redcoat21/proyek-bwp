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
                        <a href="{{ route('listcourse.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('listlecturer.get') }}" class="block text-blue-600 bg-transparent p-0">Lecturer</a>
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
        <div class="text-blue-400 text-3xl font-bold mb-6 text-opacity-90">
            Our Lecturer
        </div>
        <!-- Content -->
        <div class="flex-row mt-6">
            @for ($i = 0; $i < 5; $i++)
                <div class="bg-white rounded shadow-md mx-2 my-5 px-5 py-5 flex items-center">
                    <img src="{{ asset('asset/male_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-28">
                    <div class="flex-col mx-5">
                        <div class="text-2xl font-bold text-black mb-1">Ahmad Bambang S.Mat, M.Mat</div>
                        <div class="text-xl font-italic text-gray-800">Mathematic Expert</div>
                    </div>
                    <button class="ml-auto text-white text-bold text-xl bg-blue-600 rounded h-12 p-3">See course</button>
                </div>
            @endfor
        </div>
    </div>
@endsection