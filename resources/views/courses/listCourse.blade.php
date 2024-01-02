@extends('template.baseTemplate')

@section('title')
    Courses
@endsection

@section('header')
    <x-navbar :searchBar="true" activePage="course" />
@endsection

{{-- ini buat dilanjut sama edward --}}
@section('content')
<div id="search-results">

</div>
@endsection
