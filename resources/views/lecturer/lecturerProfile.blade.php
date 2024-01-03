@extends('template.baseTemplate')

@section('title')
    Lecturer Profile
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
                        <div class="text-lg font-semibold">Hidden</div>
                        <div class="text-lg font-semibold">Published</div>
                        <div class="text-lg font-semibold">Disabled</div>
                        <div class="row-start-2">1</div>
                        <div class="row-start-2">2</div>
                        <div class="row-start-2">0</div>
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
                My Courses | Hidden
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
                " class="w-11/12 bg-white border border-gray-200 rounded-lg grid justify-items-center content-center">
                    {{-- <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt=""> --}}
                    <div class="pb-8 text-9xl">
                        +
                    </div>
                </a>

            </div>
        </div>

        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="flex flex-row items-center mt-10 ml-10">
                <div class="text-2xl font-bold">
                    My Courses | Published
                </div>    
                <div class="ml-auto">
                    <div class="mr-8">
                        <a href="/addCourse" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Add Course
                        </a>
                    </div>
                </div>
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

        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Courses | Disabled
            </div>
            <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">

                <div class="col-span-4">
                    <div class="grid grid-rows-2 justify-items-center">
                        <div class="my-2 text-xl font-bold">
                            You Don't Have Any Disabled Courses Now.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
