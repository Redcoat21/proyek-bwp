@extends('template.baseTemplate')

@section('title')
Lecturer
@endsection
@section('header')
<x-navbar :searchBar="false" activePage="lecturer" />
@endsection
@section('content')
    <div class="mt-6 mx-10">
        <!-- Lecturer  Text-->
        <div class="text-blue-400 text-3xl font-bold mb-5 text-opacity-90">
            Lecturer
        </div>
        <!-- Content -->
        <div class="text-2xl font-bold text-black mb-1">{{$lecturer->name}}</div>
        <div class="text-xl font-italic text-gray-800">{{$lecturer->description}}</div>
        <div class="flex mt-5">
            <img src="{{asset($lecturer->profile_picture)}}" alt="Image Lecturer" class="rounded-full w-32 mb-10">
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
                            <th>{{$jumlah}}</th>
                            <th>{{ $follow }}</th>
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
        @if($jumlah>0)
            <div class="grid grid-cols-3 items-center justify-center mb-2">
                @foreach($Course as $course)
                {{-- <a href="" class="bg-white p-1 rounded hover:shadow-md border pb-4 mb-10 mx-1" style="width:32.6%;">
                    @if ($course->cover)
                        <img src="{{ asset($course->cover) }}" alt="" class="w-full rounded mb-3">
                    @else
                        <img src="{{ asset('asset/aws.jpg') }}" alt="" class="w-full rounded mb-3">
                    @endif
                    <div class="p-2">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">{{$course->name}}</h2>
                        </div>
                        <p class="text-gray-600 mb-4">{{$course->description}}</p>
                    </div>
                </a> --}}
                <a href="{{ route('course.get', ['id' => $course->id]) }}" class="w-3/5 bg-white border border-gray-200 rounded-lg hover:shadow-md place-self-center self-start">
                    @if($course->cover)
                        <img class="rounded-t-lg w-full" src="{{ asset($course->cover) }}" alt="">
                    @else
                        <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                    @endif
                    <div class="p-5">
                        <div class="flex items-center space-x-3">
                            <span class="self-center text-xs font-normal whitespace-nowrap">{{ $course->user_name }}</span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="text-xl font-bold">No Course List</div>
        @endif
    </div>
@endsection
