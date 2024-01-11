@extends('template.baseTemplate')

@section('title')
Profile
@endsection

@section('header')
@if(auth()->user()->role == "STU")
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
@endif
@endsection

@section('content')
@if(session('success'))
<div class="flex flex-col">
    <div class="bg-green-500 my-6 py-3 mx-56 shadow-md rounded">
        <div class="mx-3 text-white">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role == "STU")
    <div class="flex flex-col">
        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Profile
            </div>
            <div class="grid grid-cols-4 my-10 mx-10">
                <div class="image-container">
                    <img src="{{ asset(auth()->user()->profile_picture) }}" class="h-30 w-30 rounded-full" alt="pp">
                </div>
                <div class="col-span-2">
                    <div class="text-xl font-semibold m-3">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="grid grid-cols-3 grid-rows-2 justify-items-center gap-2">
                        <div class="text-lg font-semibold">Completed</div>
                        <div class="text-lg font-semibold">In Progress</div>
                        <div class="row-start-2">{{ $ctrCompleted }}</div>
                        <div class="row-start-2">{{ $ctrProgress }}</div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="{{route('profile.toEdit.get')}}">
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white py-1 px-3 mt-2 me-2 rounded text-base">
                            Edit Profile
                        </button>
                    </a>
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

                @if ($progressCourses)
                    @foreach($progressCourses as $course)
                        <a href="
                        @if (!auth()->user())
                            {{ route('auth.get') }}
                        @else
                            {{ route('course.get', ['id' => $course->id]) }}
                        @endif
                        " class="w-11/12 bg-white border border-gray-200 rounded-lg">
                        @if($course->cover)
                            <img class="rounded-t-lg w-full" src="{{ asset($course->cover) }}" alt="">
                        @else
                            <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                        @endif
                            <div class="p-5">
                                <div class="flex items-center space-x-3">
                                    @if($course->profile_picture)
                                        <img src="{{ asset($course->profile_picture) }}" class="h-8 border-none rounded-full" alt="pp">
                                    @else
                                        <img src="{{ asset('asset/def_pp.jpg') }}" class="h-8 border-none rounded-full" alt="pp">
                                    @endif
                                    <span class="self-center text-xs font-normal whitespace-nowrap">{{ $course->user_name }}</span>
                                </div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->name }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                            </div>
                        </a>
                    @endforeach
                @else
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
                @endif


            </div>
        </div>
        <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="text-2xl font-bold mt-10 ms-10">
                My Courses | Completed
            </div>
            <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">

                @if ($completedCourses)
                    @foreach($completedCourses as $course)
                        <a href="
                        @if (!auth()->user())
                            {{ route('auth.get') }}
                        @else
                            {{ route('course.get', ['id' => $course->id]) }}
                        @endif
                        " class="w-11/12 bg-white border border-gray-200 rounded-lg">
                        @if($course->cover)
                            <img class="rounded-t-lg w-full" src="{{ asset($course->cover) }}" alt="">
                        @else
                            <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                        @endif
                            <div class="p-5">
                                <div class="flex items-center space-x-3">
                                    @if($course->profile_picture)
                                        <img src="{{ asset($course->profile_picture) }}" class="h-8 border-none rounded-full" alt="pp">
                                    @else
                                        <img src="{{ asset('asset/def_pp.jpg') }}" class="h-8 border-none rounded-full" alt="pp">
                                    @endif
                                    <span class="self-center text-xs font-normal whitespace-nowrap">{{ $course->user_name }}</span>
                                </div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->name }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-4">
                        <div class="grid grid-rows-2 justify-items-center">
                            <div class="my-2 text-xl font-bold">
                                You Don't Have Any Completed Courses Now.
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@else
<div class="flex flex-col">
    <div class="bg-zinc-100 my-6 mx-56 shadow-md">
        <div class="text-2xl font-bold mt-10 ms-10">
            My Profile
        </div>
        <div class="grid grid-cols-4 my-10 mx-10">
            <div class="image-container">
                <img src="{{ asset(auth()->user()->profile_picture) }}" class="h-30 w-30 rounded-full" alt="pp">
            </div>
            <div class="col-span-2">
                <div class="text-xl font-semibold m-3">
                    {{ auth()->user()->name }}
                </div>
                <div class="grid grid-cols-3 grid-rows-2 justify-items-center gap-2">
                    <div class="text-lg font-semibold">Hidden</div>
                    <div class="text-lg font-semibold">Published</div>
                    <div class="text-lg font-semibold">Disabled</div>
                    <div class="row-start-2">{{count($hiddenCourses)}}</div>
                    <div class="row-start-2">{{count($publishedCourses)}}</div>
                    <div class="row-start-2">{{count($disabledCourses)}}</div>
                </div>
            </div>
            <div class="flex justify-end">
{{--                    lecturerabcd123!@#--}}
                <a href="{{ route('profile.toEdit.get') }}">
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white py-1 px-3 mt-2 me-2 rounded text-base">
                        Edit Profile
                    </button>
                </a>
                <form action="{{ route('auth.post.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-800 text-white py-1 px-3 mt-2 rounded text-base">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if(Session::has('msg'))
        <div class="flex flex-col">
            <div class="bg-green-500 my-6 py-3 mx-56 shadow-md rounded">
                <div class="mx-3 text-white">
                    {{ session('msg') }}
                </div>
            </div>
        </div>
    @endif
    {{-- hidden courses --}}
    <div class="bg-zinc-100 my-6 mx-56 shadow-md">
        <div class="text-2xl font-bold mt-10 ms-10">
            My Courses | Hidden
        </div>
        @if (count($hiddenCourses)==0)
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">
            <a href="
            @if (!auth()->user())
                {{ route('auth.get') }}
            @else
                {{ route('addCourse.get') }}
            @endif
            " class="w-11/12 bg-white border border-gray-200 rounded-lg grid justify-items-center content-center">
                {{-- <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt=""> --}}
                <div class="pb-8 text-9xl">
                    +
                </div>
            </a>
        </div>
        @else
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">
            @foreach ($hiddenCourses as $hiddenCourse)
                <a href="
                @if (!auth()->user())
                    {{ route('auth.get') }}
                @else
                    {{ '/lecturer/course/'.$hiddenCourse->id }}
                @endif
                " class="w-11/12 bg-white border border-gray-200 rounded-lg">
                    <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                    <div class="p-5">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                            <span class="self-center text-xs font-normal whitespace-nowrap">{{$hiddenCourse->lecturers->name}}</span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$hiddenCourse->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{$hiddenCourse->description}}</p>
                    </div>
                </a>
            @endforeach
            <a href="
            @if (!auth()->user())
                {{ route('auth.get') }}
            @else
                {{ route('addCourse.get') }}
            @endif
            " class="w-11/12 bg-white border border-gray-200 rounded-lg grid justify-items-center content-center">
                {{-- <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt=""> --}}
                <div class="pb-8 text-9xl">
                    +
                </div>
            </a>
        </div>
        @endif
    </div>
    {{-- published courses --}}
    <div class="bg-zinc-100 my-6 mx-56 shadow-md">
        <div class="flex flex-row items-center mt-10 ml-10">
            <div class="text-2xl font-bold">
                My Courses | Published
            </div>
            <div class="ml-auto">
                {{-- <div class="mr-8">
                    <a href="/addCourse" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Add Course
                    </a>
                </div> --}}
            </div>
        </div>
        @if (count($publishedCourses)==0)
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">
            <div class="col-span-4">
                <div class="grid grid-rows-2 justify-items-center">
                    <div class="my-2 text-xl font-bold">
                        You Don't Have Any Published Courses Now.
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">
            @foreach ($publishedCourses as $publishedCourse)
                <a href="
                @if (!auth()->user())
                    {{ route('auth.get') }}
                @else
                    {{ '/lecturer/course/'.$publishedCourse->id }}
                @endif
                " class="w-11/12 bg-white border border-gray-200 rounded-lg">
                    <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                    <div class="p-5">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                            <span class="self-center text-xs font-normal whitespace-nowrap">{{$publishedCourse->lecturers->name}}</span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$publishedCourse->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{$publishedCourse->description}}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @endif
    </div>
    {{-- disabled courses --}}
    <div class="bg-zinc-100 my-6 mx-56 shadow-md">
        <div class="text-2xl font-bold mt-10 ms-10">
            My Courses | Disabled
        </div>
        @if (count($disabledCourses)==0)
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">

            <div class="col-span-4">
                <div class="grid grid-rows-2 justify-items-center">
                    <div class="my-2 text-xl font-bold">
                        You Don't Have Any Disabled Courses Now.
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="grid grid-cols-4 my-10 mx-10 justify-items-center">
            @foreach ($disabledCourses as $disabledCourse)
                <a href="
                @if (!auth()->user())
                    {{ route('auth.get') }}
                @else
                    {{ '/lecturer/course/'.$disabledCourse->id }}
                @endif
                " class="w-11/12 bg-white border border-gray-200 rounded-lg">
                    <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                    <div class="p-5">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('asset/aws_education.jpg') }}" class="h-8 border-none rounded">
                            <span class="self-center text-xs font-normal whitespace-nowrap">{{$disabledCourse->lecturers->name}}</span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$disabledCourse->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{$disabledCourse->description}}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endif
@endsection
