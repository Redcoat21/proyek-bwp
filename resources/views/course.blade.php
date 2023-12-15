@extends('template.baseTemplate')

@section('title')
Nama Course
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
