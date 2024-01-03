@extends('template.baseTemplate')

@section('title')
    Courses
@endsection

@section('header')
    <x-navbar :searchBar="true" activePage="course" />
@endsection


@section('content')
<div class="pt-7 pb-4 px-12">
    <div class="text-blue-500 text-3xl font-bold">
        List course
    </div>
</div>
<div class="mx-auto mb-2 h-full text-center">
    <div id="search-results">
    </div>
</div>
@endsection
