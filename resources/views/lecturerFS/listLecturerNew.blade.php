@extends("template.lecturerAjaxTemplate")
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
        <div class="flex-row mt-6" id="search-results">

        </div>
    </div>

@endsection
