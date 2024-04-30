@extends('template.baseTemplate')
@section('header')
@section('title')
Update User
@endsection

@endsection
@section('content')
<div class="m-4">
    <button class="bg-blue-600 text-white text-lg py-1 px-3 rounded"><a href="{{'/listUser'}}">Back</a></button>
</div>

    <form action="" method="post">
        @csrf
        <div class="mx-64">
            <input type="hidden" name="uname" value="{{ $user->username }}">
            
            <div class="col-span-2 col-start-3 mt-3">
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username :</label>
                <div class="mt-1">
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" disabled>
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name :</label>
                <div class="mt-1">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6">
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email :</label>
                <div class="mt-1">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6">
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password:</label>
                <div class="mt-1">
                    <input type="password" name="password" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6">
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Role :</label>
                <div class="mt-1">
                    <select name="role" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6">
                        <option value="ADM" {{ old('role', $user->role) === 'ADM' ? 'selected' : '' }}>Admin</option>
                        <option value="LEC" {{ old('role', $user->role) === 'LEC' ? 'selected' : '' }}>Lecturer</option>
                        <option value="STU" {{ old('role', $user->role) === 'STU' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Update User</button>
            </div>
        </div>
    </form>
</div>
@endsection
