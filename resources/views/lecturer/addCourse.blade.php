@extends('template.baseTemplate')

@section('title')
Add Course
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ route('lecturerProfile.get') }}" class="flex items-center space-x-3 text-black">
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
<h1 class="block text-center text-2xl text-blue-400 my-3">Add Course</h1>
<div class="px-96">
    <form action="{{ route('auth.post') }}" method="post" class="col-span-2 col-start-3 mt-2">
        @csrf
        <input type="hidden" name="type" value="login">
    
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">COURSE TITLE <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="" name="" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Course Name">
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">PRICE <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="" name="" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Rp. 100.000,-">
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">DESCRIPTION <span class="text-red-600">*</span></label>
            <div class="mt-1">
            <textarea id="textInput" name="text" rows="4" cols="50"  class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">COURSE TEXT <span class="text-red-600">*</span></label>
            <div class="mt-1">
            <textarea id="textInput" name="text" rows="6" cols="50"  class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Course"></textarea>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">COVER <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input type="file" id="imageInput" name="image" accept="image/*">
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">DIFFICULTY <span class="text-red-600">*</span></label>
            <div class="mt-1">
                <select id="difficulty" name="difficulty" class="form-control shadow">
                    @foreach ($difficulty as $diff)
                            <option value="{{$diff->id}}" selected>{{$diff->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mt-3">
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">CATEGORY <span class="text-red-600">*</span></label>
            <div class="mt-1">
            <select id="category" name="category" class="shadow">
                @foreach ($category as $diff)
                        <option value="{{$diff->id}}" selected>{{$diff->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-span-2 col-start-3 mb-1 mt-10">
            <button type="submit" id="" name="" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Add Course</button>
        </div>
    </form>
</div>
@endsection