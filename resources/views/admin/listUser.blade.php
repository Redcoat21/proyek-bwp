@extends('template.baseTemplate')
@section('header')

@endsection
@section('content')
<button style="background-color: burlywood"><a href="{{'/addUser'}}">Add New User</a></button>
<br>
<h1>List Admins</h1>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @foreach ($listAdmins as $index => $admin)
            @if($admin != Auth::user())
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <button><a href="{{'/updateUser/'.$admin->username}}" style="background-color: limegreen">Update</a></button>
                        <button><a href="{{'/deleteUser/'.$admin->username}}" style="background-color: salmon">Delete</a></button>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<h1>List Lecturers</h1>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @foreach ($listLecturers as $index => $lecturer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lecturer->username }}</td>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->email }}</td>
                    <td>
                        <button><a href="{{'/updateUser/'.$lecturer->username}}" style="background-color: limegreen">Update</a></button>
                        <button><a href="{{'/deleteUser/'.$lecturer->username}}" style="background-color: salmon">Delete</a></button>
                    </td>
                </tr>
        @endforeach
    </tbody>
</table>
<h1>List Students</h1>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @foreach ($listStudents as $index => $student)
            @if($student != Auth::user())
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->username }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <button><a href="{{'/updateUser/'.$student->username}}" style="background-color: limegreen">Update</a></button>
                        <button><a href="{{'/deleteUser/'.$student->username}}" style="background-color: salmon">Delete</a></button>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection
@section('title')
List User
@endsection
