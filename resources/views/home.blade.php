@extends('template.baseTemplate')

@section('title')
Home
@endsection

@section('header')
    <x-navbar :searchBar="false" activePage="home" />
@endsection

@section('content')
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
            @foreach($topLecturers->getData() as $topLecturer)
                <div class="place-self-center text-center w-3/5">
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center">
                            <img class="rounded-full w-3/4 h-auto" src="{{ asset($topLecturer->profile_picture) }}" alt="profile-picture">
                        </div>
                        <span class="mt-3 mb-1 block font-semibold text-2xl px-3 text-blue-600">{{ $topLecturer->name }}</span>
                        <span class="mb-3 block font-normal text-sm px-3 text-blue-600">{{ $topLecturer->description }}</span>
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
            @endforeach
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
