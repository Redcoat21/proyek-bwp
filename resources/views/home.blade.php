@extends('template.baseTemplate')

@section('title')
Home
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
                        <a href="{{ route('home.get') }}" class="block text-blue-600 bg-transparent p-0">Home</a>
                    </li>
                    <li>
                        <a href="
                        @if (!auth()->user())
                            {{ route('auth.get') }}
                        @else
                            {{ route('home.get') }}
                        @endif
                        " class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Courses</a>
                    </li>
                </ul>
            </div>
            <div class="flex">
                {{-- Uncomment the below part to reveal the search bar, search bar is exclusively for course --}}
                {{-- <div class="relative block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                </div> --}}
                <div class="relative block my-2 mx-3">
                    @if (!auth()->user())
                        <a href="{{ route('auth.get') }}" class="bg-blue-600 hover:bg-blue-800 text-white py-1 px-3 border border-blue-600 rounded text-sm">
                            Login
                        </a>
                    @else
                        <a href="#">
                            <img src="{{ asset('asset/def_pp.jpg') }}"class="h-10 rounded-full" alt="pp">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    {{--    Penanda usernya berhasil login atau tidak --}}
    @if(auth()->user())
        {{ auth()->user()->name }}
    @endif
    <section class="bg-center bg-no-repeat bg-cover bg-gray-300 bg-blend-multiply relative overflow-hidden" style="background-image: url('{{ asset('asset/jumbotron.jpg') }}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Belajar dimana saja dan kapan saja</h2>
            <p class="mb-8 text-lg font-normal text-gray-100 lg:text-xl sm:px-16 lg:px-48">Dengan Pengajar Professional setara dengan Dosen Universitas <br> dan <br> berbagai macam topik menarik</p>            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
        </div>
    </section>

    <div id="top-lecturer" class="mt-16 mb-10">
        <div class="w-full text-center mb-10">
            <h1 class="text-4xl font-bold text-blue-600">Our Top Lecturer</h1>
        </div>
        <div class="grid grid-cols-3 mb-5">
            <div class="place-self-center text-center w-3/5">
                <div class="flex flex-col items-center">
                    <div class="flex justify-center">
                        <img class="rounded-full w-3/4 h-auto" src="{{ asset('asset/male_lecturer.jpg') }}">
                    </div>
                    <span class="mt-3 mb-1 block font-semibold text-2xl px-3 text-blue-600">Ahmad Bambang Cecep S.Mat, M.Mat</span>
                    <span class="mb-3 block font-normal text-sm px-3 text-blue-600">Mathematics Expert</span>
                    <a href="
                    @if (!auth()->user())
                        {{ route('auth.get') }}
                    @else
                        {{ route('home.get') }}
                    @endif
                    " class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-6 border border-blue-600 rounded-full text-sm mt-2">
                        See Courses
                    </a>
                </div>
            </div>
            <div class="place-self-center text-center w-3/5">
                <div class="flex flex-col items-center">
                    <div class="flex justify-center">
                        <img class="rounded-full w-3/4 h-auto" src="{{ asset('asset/old_lecturer.jpg') }}">
                    </div>
                    <span class="mt-3 mb-1 block font-semibold text-2xl px-3 text-blue-600">Alvin Setia S.Kom. M.Kom.</span>
                    <span class="mb-3 block font-normal text-sm px-3 text-blue-600">Data and Web Mining Specialist</span>
                    <a href="
                    @if (!auth()->user())
                        {{ route('auth.get') }}
                    @else
                        {{ route('home.get') }}
                    @endif
                    " class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-6 border border-blue-600 rounded-full text-sm mt-2">
                        See Courses
                    </a>
                </div>
            </div>
            <div class="place-self-center text-center w-3/5">
                <div class="flex justify-center">
                    <img class="rounded-full w-3/4 h-auto" src="{{ asset('asset/female_lecturer.jpg') }}">
                </div>
                <span class="mt-3 mb-1 block font-semibold text-2xl px-3 text-blue-600">Jessica M.H. S.Ak</span>
                <span class="mb-3 block font-normal text-sm px-3 text-blue-600">Accounting Expert</span>
                <a href="
                @if (!auth()->user())
                        {{ route('auth.get') }}
                    @else
                        {{ route('home.get') }}
                    @endif
                " class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-6 border border-blue-600 rounded-full text-sm mt-2">
                    See Courses
                </a>
            </div>
        </div>
    </div>

    <div class="mt-32" id="top-course">
        <div class="w-full text-center mb-5">
            <h1 class="text-4xl font-bold text-blue-600">Our Top Courses</h1>
        </div>
        <div class="grid grid-cols-3 my-10 justify-items-center">

            <a href="
            @if (!auth()->user())
                {{ route('auth.get') }}
            @else
                {{ route('home.get') }}
            @endif
            " class="w-3/5 bg-white border border-gray-200 rounded-lg">
                <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                <div class="p-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                        <span class="self-center text-xs font-normal whitespace-nowrap">AWS Educate</span>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Cloud Engineering for Beginners</h5>
                    <p class="mb-3 font-normal text-gray-700">Learn Basic Cloud Engineering with AWS Educate Team.</p>
                </div>
            </a>

            <a href="
            @if (!auth()->user())
                {{ route('auth.get') }}
            @else
                {{ route('home.get') }}
            @endif
            " class="w-3/5 bg-white border border-gray-200 rounded-lg">
                <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                <div class="p-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                        <span class="self-center text-xs font-normal whitespace-nowrap">AWS Educate</span>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Cloud Engineering for Beginners</h5>
                    <p class="mb-3 font-normal text-gray-700">Learn Basic Cloud Engineering with AWS Educate Team.</p>
                </div>
            </a>

            <a href="
            @if (!auth()->user())
                {{ route('auth.get') }}
            @else
                {{ route('home.get') }}
            @endif
            " class="w-3/5 bg-white border border-gray-200 rounded-lg">
                <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                <div class="p-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                        <span class="self-center text-xs font-normal whitespace-nowrap">AWS Educate</span>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Cloud Engineering for Beginners</h5>
                    <p class="mb-3 font-normal text-gray-700">Learn Basic Cloud Engineering with AWS Educate Team.</p>
                </div>
            </a>

        </div>
    </div>
@endsection
