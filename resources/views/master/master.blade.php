@extends('template.baseTemplate')
@section('header')
@section('title')
List User
@endsection

@endsection
@section('content')
<div class="m-4">
    <div class="flex">
        <form action="{{ route('auth.post.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="bg-red-600 text-white p-2 rounded mx-2">
                Logout
            </button>
        </form>
        <div class="mb-4">
            <button class="bg-blue-600 text-white p-2 rounded mx-2"><a href="{{'/addAdmin'}}">Add Admin</a></button>
        </div>
    </div>
    @if(Session::has('msg'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-4">
            {{ session('msg') }}
        </div>
    @endif
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
            <tr class="bg-white border-b">
            @foreach ($listAdmins as $index => $admin)
            @if($admin != Auth::user())
            <tr class="py-2">
                <td class="py-2">{{ $index + 1 }}</td>
                <td class="py-2">{{ $admin->username }}</td>
                <td class="py-2">{{ $admin->name }}</td>
                <td class="py-2">{{ $admin->email }}</td>
                <td class="py-2">
                    @if ($admin->trashed())
                    <button><a href="{{'/deleteAdmin/'.$admin->username}}" class="bg-blue-600 p-1 text-white rounded">Restore</a></button>
                    @else
                    <button><a href="{{'/deleteAdmin/'.$admin->username}}" class="bg-red-600 p-1 text-white rounded">Delete</a></button>
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
