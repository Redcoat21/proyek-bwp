@extends('template.baseTemplate')
@section('header')
@endsection

@section('title')
Add User
@endsection

@section('content')
<div class="m-4 mb-5">
    <button class="bg-blue-600 text-white text-lg py-1 px-3 rounded"><a href="{{'/listUser'}}">Back</a></button>
</div>
@if(Session::has('msg'))
        <div class="bg-red-500 text-white py-2 px-4 rounded mb-5">
            {{ session('msg') }}
        </div>
@endif
<form action="" method="post">
        @csrf
        <div class="mx-64">
            <input type="hidden" name="uname">

            <div class="col-span-2 col-start-3 mt-3">
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username :</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="username" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('email') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300">
                    <!-- Error Message -->
                    @error('username')
                        <span class="mt-1 absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name :</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="name" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('email') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300">
                    <!-- Error Message -->
                    @error('name')
                        <span class="mt-1 absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email :</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="email" name="email" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('email') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300">
                    <!-- Error Message -->
                    @error('email')
                        <span class="mt-1 absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password:</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="password" name="password" class="block rounded-lg w-full py-1.5 px-3 text-gray-900 placeholder:text-gray-400 border @error('email') border-red-500 @enderror focus:outline-none focus:ring-1 focus:ring-blue-300">
                    <!-- Error Message -->
                    @error('password')
                        <span class="mt-1 absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-span-2 col-start-3 mt-3">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Role :</label>
                <div class="mt-1">
                    <select name="role" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6">
                        <option value="LEC">Lecturer</option>
                        <option value="STU">Student</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Add User</button>
            </div>
        </div>
    </form>
@endsection
