@extends('template.baseTemplate')
@section('header')
@section('title')
List User
@endsection

@endsection
@section('content')
<div class="m-4">
    <div class="mb-4">
        <button class="bg-blue-600 text-white p-2 rounded"><a href="{{'/addUser'}}">Add New User</a></button>
    </div>
    <div class="text-2xl font-bold my-4">
        List Admins
    </div>
    <table class="w-full">
        <thead>
            <tr>
                <div>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </div>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($listAdmins as $index => $admin)
            @if($admin != Auth::user())
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    @if ($admin->trashed())
                    <button><a href="{{'/deleteUser/'.$admin->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/updateUser/'.$admin->username}}" class="bg-green-600 p-1 text-white rounded">Update</a></button>
                    <button><a href="{{'/deleteUser/'.$admin->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
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
            @foreach ($listLecturers as $index => $lecturer)
            <tr class="my-2">
                <td>{{ $index + 1 }}</td>
                <td>{{ $lecturer->username }}</td>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>
                    @if($lecturer->trashed())
                    <button><a href="{{'/deleteUser/'.$lecturer->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/updateUser/'.$lecturer->username}}" class="bg-green-600 p-1 text-white rounded">Update</a></button>
                    <button><a href="{{'/deleteUser/'.$lecturer->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
                    @endif
                </td>
            </tr>
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
            @foreach ($listStudents as $index => $student)
            @if($student != Auth::user())
            <tr class="my-2">
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->username }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @if($student->trashed())
                    <button><a href="{{'/deleteUser/'.$student->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/updateUser/'.$student->username}}" class="bg-green-600 p-1 text-white rounded">Update</a></button>
                    <button><a href="{{'/deleteUser/'.$student->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    