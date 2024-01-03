@extends('template.baseTemplate')

@section('title')
Lecturer
@endsection
@section('header')
    <x-navbar :searchBar="true" activePage="lecturer" />
@endsection

@section('content')
    <div class="mt-6 mx-10">
        <!-- Lecturer  Text-->
        <div class="text-blue-500 text-3xl font-bold mb-6 text-opacity-90">
            Our Lecturer
        </div>
        <!-- Content -->
        <div class="flex-row mt-6">
            @for ($i = 0; $i < 5; $i++)
                <div class="bg-white rounded shadow-md mx-2 my-5 px-5 py-5 flex items-center">
                    <img src="{{ asset('asset/male_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-28">
                    <div class="flex-col mx-5">
                        <div class="text-2xl font-bold text-black mb-1">Ahmad Bambang S.Mat, M.Mat</div>
                        <div class="text-xl font-italic text-gray-800">Mathematic Expert</div>
                    </div>
                    <button class="ml-auto text-white text-bold text-xl bg-blue-600 rounded py-1 px-3">See course</button>
                </div>
            @endfor
        </div>
    </div>

@endsection
