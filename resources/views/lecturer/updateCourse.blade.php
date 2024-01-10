@extends('template.baseTemplate')

@section('title')
    Detail Course
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ route('profile.get') }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">Back</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
<div class="block text-center font-bold text-4xl text-blue-600 my-3">
    RuangDosen
</div>
<h1 class="block text-center text-2xl text-blue-400 my-3">{{$course->name}}</h1>
@if($course->lecturer!=auth()->user()->username)
<h1 class="block text-center text-2xl text-black-400 my-3">Bukan course Anda!</h1>
@else
<div class="bg-zinc-100 my-6 mx-56 shadow-md">
    <div class="flex flex-row items-center mt-10 ml-10">
        <div class="text-2xl font-bold">
            Sub Courses
        </div>
        <div class="ml-auto">
            <div class="mr-8">
                <a href={{'/addSubCourse/'.$course->id}} class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Add SubCourse
                </a>
            </div>
        </div>
    </div>

    <div class="m-5">
        @foreach ($subcourses as $subcourse)
            <div class="flex justify-between items-center p-4 border-b">
                <div class="text-lg font-semibold">{{$subcourse->name}}</div>
                @if($course->status == 0)
                <div class="space-x-2">
                    <a href="{{ '/editSubCourse/'.$subcourse->id }}"
                       class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                        Edit
                    </a>

                    <a href="{{ '/deleteSubCourse/'.$subcourse->id }}"
                        class="bg-red-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                         Delete
                     </a>
                </div>
                @else
                <div>
                    <a href="{{ '/detailSubCourse/'.$subcourse->id }}"
                       class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                        Detail
                    </a>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="col-span-2 col-start-3 mt-5">
        <label for="" class="block text-sm font-medium leading-6 text-gray-900 text-center">STATUS</span></label>
        <div class="mt-1">
            <div class="flex space-x-2">
                @if($course->status != 1)
                    <a href="{{'/publishCourse/'.$course->id}}" class="w-full text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none text-center">Publish</a>
                @endif
                @if($course->status != 2)
                    <a href="{{'/disableCourse/'.$course->id}}" class="w-full text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none text-center">Disable</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection


