@extends('template.baseTemplate')

@section('title')
Profile
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">HOME</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
    <div class="flex flex-col">
        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Profile
            </div>
            <div class="grid grid-cols-4 my-10 mx-10">
                <div class="image-container">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset(auth()->user()->profile_picture) }}" class="h-30 rounded-full" alt="pp">
                    @else
                        <img src="{{ asset('asset/def_pp.jpg') }}" class="h-30 rounded-full" alt="pp">
                    @endif
                </div>
                <div class="col-span-2">
                    <div class="text-xl font-semibold m-3">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="grid grid-cols-3 grid-rows-2 justify-items-center gap-2">
                        <div class="text-lg font-semibold">Completed</div>
                        <div class="text-lg font-semibold">In Progress</div>
                        <div class="row-start-2">0</div>
                        <div class="row-start-2">2</div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <form action="{{ route('toEdit.post') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white py-1 px-3 mt-2 me-2 rounded text-base">
                            Edit Profile
                        </button>
                    </form>
                    <form action="{{ route('auth.post.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white py-1 px-3 mt-2 rounded text-base">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Courses | In Progress
            </div>
            <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">

                <div class="col-span-4">
                    <div class="grid grid-rows-2 justify-items-center">
                        <div class="my-2 text-xl font-bold">
                            You Don't Have Any In Progress Courses Now.
                        </div>
                        <a href="{{ route('listCourse.get') }}" class="bg-blue-600 hover:bg-blue-800 text-white py-1 px-10 mt-2 rounded text-base">
                            Search Course
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Courses | Completed
            </div>
            <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">

                <a href="
                @if (!auth()->user())
                    {{ route('auth.get') }}
                @else
                    {{ route('home.get') }}
                @endif
                " class="w-11/12 bg-white border border-gray-200 rounded-lg">
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
                " class="w-11/12 bg-white border border-gray-200 rounded-lg">
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
    </div>
@endsection
