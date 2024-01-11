@extends('template.baseTemplate')

@section('title')
    Add SubCourse
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ '/lecturer/course/'.$course->id }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">CANCEL</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
@if(Session::has('msg'))
        <div class="bg-red-500 text-white py-2 px-4 rounded mb-5 mt-5">
            {{ session('msg') }}
        </div>
@endif
<div class="block text-center font-bold text-4xl text-blue-600 my-3">
    RuangDosen
</div>
<h1 class="block text-center text-2xl text-blue-400 my-3">Add SubCourse</h1>
@if($course->lecturer!=auth()->user()->username)
<h1 class="block text-center text-2xl text-black-400 my-3">Bukan course Anda!</h1>
@else
<div class="px-96 rounded">
    <form action="" method="post" class="col-span-2 col-start-3 mt-2">
        @csrf
        <input type="hidden" name="type" value="login">

        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">COURSE TITLE <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="" name="" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Course Name" value="{{$course->name}}" disabled readonly>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">SUBCOURSE TITLE <span class="text-red-600">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input placeholder="Sub Course Name" type="text" name="title" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('email') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300">
                <!-- Error Message -->
                @error('title')
                    <span class="mt-1 absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">DESCRIPTION <span class="text-red-600">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <textarea id="desc" name="desc" rows="4" cols="50" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('desc') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300" placeholder="Description"></textarea>
            </div>
            @error('desc')
                <div class="mt-1 col-span-2 col-start-3 text-red-500 text-sm font-medium">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-span-2 col-start-3 mb-1 mt-10">
            <button type="submit" id="" name="" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Add Subcourse</button>
        </div>
    </form>
</div>
@endif
@endsection
