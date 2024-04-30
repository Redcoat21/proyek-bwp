@extends('template.baseTemplate')
@section('header')
@section('title')
List User
@endsection

@endsection
@section('content')
<div class="m-4">
    <div class="flex">
        <div class="mx-2">
            <button class="bg-red-600 text-white p-2 rounded"><a href="{{'/adminProfile'}}">Back</a></button>
        </div>
        <div class="mx-2">
            <button class="bg-blue-600 text-white p-2 rounded"><a href="{{'/addUser'}}">Add New User</a></button>
        </div>
    </div>
    @if(Session::has('msg'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-5 mt-5">
            {{ session('msg') }}
        </div>
    @endif
    <div class="text-2xl font-bold my-4">
        List Lecturers
    </div>
    <table class="w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr class="bg-white border-b">
            @foreach ($listLecturers as $index => $lecturer)
            <tr class="py-2">
                <td class="py-2">{{ $index + 1 }}</td>
                <td class="py-2">{{ $lecturer->username }}</td>
                <td class="py-2">{{ $lecturer->name }}</td>
                <td class="py-2">{{ $lecturer->email }}</td>
                <td class="py-2">
                    @if($lecturer->trashed())
                    <button><a href="{{'/deleteUser/'.$lecturer->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/deleteUser/'.$lecturer->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
            @endforeach
        </tbody>
    </table>
    <div class="text-2xl font-bold my-4">
        List Students
    </div>
    <table class="w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr class="bg-white border-b">
            @foreach ($listStudents as $index => $student)
            @if($student != Auth::user())
            <tr class="py-2">
                <td class="py-2">{{ $index + 1 }}</td>
                <td class="py-2">{{ $student->username }}</td>
                <td class="py-2">{{ $student->name }}</td>
                <td class="py-2">{{ $student->email }}</td>
                <td class="py-2">
                    @if($student->trashed())
                    <button><a href="{{'/deleteUser/'.$student->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/deleteUser/'.$student->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
