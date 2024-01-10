@extends('template.baseTemplate')

@section('title')
    Detail Course
@endsection

@section('header')
    <x-navbar :searchBar="false" activePage="course" />
@endsection

@section('content')
<div class="hover:bg-blue-100">
    <div class="space-y-0 space-x-8 flex items-center py-4 mx-6">
        <div class="flex items-center justify-center h-48 rounded w-96">
            @if($course->cover)
                <img src="{{ asset($course->cover) }}" alt="course-pp" class="rounded">
            @else
                <img src="{{ asset('asset/aws.jpg') }}" alt="course-pp" class="rounded">
            @endif
        </div>
        <div class="w-4/5">
            <div class="mb-3">
                <span class="font-semibold text-2xl">{{ $course->name }}</span>
            </div>
            <div class="mb-3">
                <p class="text-base text-justify">{{ $course->description }}</p>
            </div>
        </div>
    </div>
</div>
<hr class="h-px mb-8 bg-gray-400 border-0 mx-6">
    <div class="mx-20">
        <span class="font-semibold text-xl">Courses</span>
        <ul class="w-full">
            @php
                $ctr = 1;
            @endphp
            @foreach ($subCourse as $sub)
                <a href="{{ route('subCourse.get', ['id' => $sub->id]) }}" class="">
                    <li class="flex w-full py-4 px-4 hover:bg-gray-100">
                        <span class="pe-2 border-e-2">{{ $ctr++ }}</span> <span class="mx-2">{{ $sub->name }}</span>
                        @if($comp[$sub->id])
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        @endif
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
