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
    <div id="search-results" class="grid grid-cols-3 my-10 justify-items-center gap-y-10">
    </div>
</div>
@endsection
