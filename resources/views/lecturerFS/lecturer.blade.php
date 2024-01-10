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
        @if($jumlah>0)
            <div class="flex flex-wrap items-center justify-center h-screen mb-2">
                @foreach($Course as $course)
                <div class="bg-white p-1 rounded shadow-md pb-4 mb-10 mx-1" style="width:32.6%;">
                    <img src="{{$course->cover}}" alt="" class="w-full rounded mb-3">
                    <div class="p-2">
                        <div class="flex items-center">
                            <img src="{{ asset($lecturer->profile_picture) }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">{{$lecturer->name}}</h2>
                        </div>
                        <p class="text-gray-600 mb-4">{{$course->description}}</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-xl font-bold">No Course List</div>
        @endif
    </div>
@endsection
