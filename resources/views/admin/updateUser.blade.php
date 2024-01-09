@extends('template.baseTemplate')
@section('header')

@endsection
@section('content')
<button style="background-color: burlywood"><a href="{{'/listUser'}}">Back</a></button>
<br>
<form action="" method="post">
    @csrf
    <input type="hidden" name="uname" value="{{ $user->username }}">

    <label for="username">Username:</label>
    <input type="text" name="username" value="{{ old('username', $user->username) }}" disabled><br>

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}"><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}"><br>

    <label for="password">New Password:</label>
    <input type="password" name="password"><br>

    <label for="role">Role:</label>
    <select name="role">
        <option value="ADM" {{ old('role', $user->role) === 'ADM' ? 'selected' : '' }}>Admin</option>
        <option value="LEC" {{ old('role', $user->role) === 'LEC' ? 'selected' : '' }}>Lecturer</option>
        <option value="STU" {{ old('role', $user->role) === 'STU' ? 'selected' : '' }}>Student</option>
    </select><br>

    <button type="submit">Update User</button>
</form>
@endsection
@section('title')
Update User
@endsection
