@extends('template.baseTemplate')

@section('title')
    Detail SubCourse
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ '/lecturer/course/'.$subcourse->course }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">BACK</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
<div class="block text-center font-bold text-4xl text-blue-600 my-3">
    RuangDosen
</div>
<h1 class="block text-center text-2xl text-blue-400 my-3">Detail SubCourse</h1>
@if($course->lecturer!=auth()->user()->username)
<h1 class="block text-center text-2xl text-black-400 my-3">Bukan course Anda!</h1>
@else
<div class="px-96">
        <input type="hidden" name="type" value="login">

        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">COURSE TITLE <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="" name="" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Course Name" value="{{$course->name}}" disabled readonly>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">SUBCOURSE TITLE <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="" value="{{$subcourse->name}}" disabled name="title" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="SubCourse Name">
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">DESCRIPTION <span class="text-red-600">*</span></label>
            <div class="mt-1">
            <textarea id="textInput" disabled name="desc" rows="4" cols="50"  class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Description">{{$subcourse->description}}</textarea>
            </div>
        </div>
</div>
@endif
@endsection



