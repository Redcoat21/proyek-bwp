@extends('template.baseTemplate')

@section('title')
    Sub Course
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ route('courseDetail.get', ['id' => $subCourse->course]) }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">BACK</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
    <div class="mx-8 my-4">
        <div class="w-full p-3 font-semibold text-2xl">{{ $subCourse->name }}</div>
        <hr class="h-px my-2 border-0 bg-gray-400">
        <div class="p-3 font-base text-lg">{{ $subCourse->description }}</div>
        <div class="flex justify-between mx-5 my-3">
            @if($prev)
                <a href="{{ route('subCourse.get', ['id' => $prev->id]) }}" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
            @else
                <a href="{{ route('courseDetail.get', ['id' => $subCourse->course]) }}" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
            @endif
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Previous
            </a>
            @if ($next)
                <a href="{{ route('subCourse.get', ['id' => $next->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
            @else
                <a href="{{ route('courseDetail.get', ['id' => $subCourse->course]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
            @endif
                Next
                <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
@endsection
