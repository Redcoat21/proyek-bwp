@extends('template.baseTemplate')

@section('title')
Nama Course
@endsection

@section('header')
    <x-navbar :searchBar="false" activePage="course" />
@endsection

@section('content')
<div class="bg-blue-100">
    <div class="space-y-0 space-x-8 flex items-center py-4 mx-6">
        <div class="flex items-center justify-center h-48 rounded w-96">
            @if($course->cover)
                <img src="{{ asset($course->cover) }}" alt="course-pp" class="h-4/5 w-4/5 rounded">
            @else
                <img src="{{ asset('asset/aws.jpg') }}" alt="course-pp" class="h-4/5 w-4/5 rounded">
            @endif
        </div>
        <div class="w-4/5">
            <div class="mb-3">
                <span class="font-semibold text-2xl">{{ $course->name }}</span>
            </div>
            <div class="mb-3">
                <p class="text-base text-justify">{{ $course->description }}</p>
            </div>
            <a href="" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Buy now Rp. {{ $course->price }},00
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
</div>

@endsection
