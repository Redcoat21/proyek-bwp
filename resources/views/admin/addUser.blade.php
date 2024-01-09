@extends('template.baseTemplate')
@section('header')

@endsection
@section('content')
<button style="background-color: burlywood"><a href="{{'/listUser'}}">Back</a></button>
<br>
<form action="" method="post">
    @csrf
    <label for="username">Username:</label>
    <input type="text" name="username"><br>

    <label for="name">Name:</label>
    <input type="text" name="name"><br>

    <label for="email">Email:</label>
    <input type="email" name="email"><br>

    <label for="password">Password:</label>
    <input type="password" name="password"><br>

    <label for="role">Role:</label>
    <select name="role">
        <option value="ADM">Admin</option>
        <option value="LEC">Lecturer</option>
        <option value="STU">Student</option>
    </select><br>

    <button type="submit">Add User</button>
</form>
@endsection
@section('title')
Add User
@endsection
