@extends('template.baseTemplate')

@section('title')
Authentication
@endsection

@section('content')
    <nav class="bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
            <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                  </svg>
                <span class="self-center text-xl font-semibold whitespace-nowrap">HOME</span>
            </a>
        </div>
    </nav>
    @if(\Illuminate\Support\Facades\Session::get('login'))
    <div id="login-section" class="login-section">
        <div class="block text-center font-bold text-4xl text-blue-600 my-3">
            RuangDosen
        </div>
        <div class="block text-center font-semibold text-3xl text-blue-600 my-5">
            LOGIN
        </div>
        <div class="mt-2 grid gap-x-6 gap-y-8 grid-cols-6">
            @if($errors->has('username'))
                <div class="col-span-2 col-start-3 mt-3">
                    <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                        {{ $errors->first('username') }}
                    </div>
                </div>
            @endif
            <form action="{{ route('auth.post') }}" method="post" class="col-span-2 col-start-3 mt-2">
                @csrf
                <input type="hidden" name="type" value="login">

                <div class="col-span-2 col-start-3 mt-3">
                    <label for="username_login" class="block text-sm font-medium leading-6 text-gray-900">USERNAME <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="username_login" name="username_login" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Enter your username" value="{{ old('username_login') }}">
                    </div>
                    @error('username_login')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mt-3">
                    <label for="password_login" class="block text-sm font-medium leading-6 text-gray-900">PASSWORD <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="password_login" name="password_login" type="password" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Enter your password">
                    </div>
                    @error('password_login')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mb-1 mt-10">
                    <button type="submit" id="login" name="login" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Login</button>
                </div>
                <div class="col-span-2 col-start-3 mb-10 text-center">
                    <span class="text-sm font-normal">
                        Baru di RuangDosen?
{{--                        <button type="button" id="toRegister" name="toRegister" class="text-blue-600 underline underline-offset-2">Daftar</button>--}}
                        <a href="{{route('auth.get.toggle')}}" class="text-blue-600 underline underline-offset-2">Daftar</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @else
    <div id="register-section" class="block">
        <div class="block text-center font-bold text-4xl text-blue-600 my-3">
            RuangDosen
        </div>
        <div class="block text-center font-semibold text-3xl text-blue-600 my-5">
            REGISTER
        </div>
        <div class="mt-2 grid gap-x-6 gap-y-8 grid-cols-6">
            @if($errors->has('kembar'))
                <div class="col-span-2 col-start-3 mt-3">
                    <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                        {{ $errors->first('kembar') }}
                    </div>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="col-span-2 col-start-3 mt-3">
                    <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-green-600 text-sm leading-6">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
            <form action="{{ route('auth.post') }}" method="post" class="col-span-2 col-start-3 mt-2">
                @csrf
                <input type="hidden" name="type" value="register">

                <div class="col-span-2 col-start-3 mt-3">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">USERNAME <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="username" name="username_register" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Choose a username" value="{{ old('username_register') }}">
                    </div>
                    @error('username_register')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mt-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">EMAIL <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="email" name="email_register" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="name@gmail.com" value="{{ old('email_register') }}">
                    </div>
                    @error('email_register')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mt-3">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">FULL NAME <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                        <input id="nama" name="nama_register" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Type your full name" value="{{ old('nama_register') }}">

                    </div>
                    @error('nama_register')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mt-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">PASSWORD <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="password" name="password_register" type="password" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Create your password">
                    </div>
                    @error('password_register')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-2 col-start-3 mt-3">
                    <label for="confirm" class="block text-sm font-medium leading-6 text-gray-900">CONFIRM PASSWORD <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                      <input id="confirm" name="confirm_register" type="password" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Re-enter your password to confirm">
                    </div>
                    @error('confirm_register')
                        <div class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-white bg-red-600 text-sm leading-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-span-2 col-start-3 mt-3">
                    <label for="sebagai" class="block text-sm font-medium leading-6 text-gray-900">As</label>
                    <div class="flex">
                        <div class="flex items-center me-4">
                            <input id="student" type="radio" value="student" name="inline-radio-group" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                            <label for="student" class="ms-2 text-sm font-medium text-gray-900">Student</label>
                        </div>
                        <div class="flex items-center">
                            <input id="lecturer" type="radio" value="lecturer" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                            <label for="lecturer" class="ms-2 text-sm font-medium text-gray-900">Lecturer</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 col-start-3 mt-3 hidden" id="khususLecturer">
                    <label for="confirm" class="block text-sm font-medium leading-6 text-gray-900">YOUR DESCRIPTION</label>
                    <div class="mt-1">
                      <input id="desc" name="desc" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 text-sm leading-6" placeholder="Mathematics Expert" value="{{ old('desc') }}">
                    </div>
                </div>

                <div class="col-span-2 col-start-3 mb-1 mt-10">
                    <button type="submit" id="register" name="register" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Register</button>
                </div>
                <div class="col-span-2 col-start-3 mb-10 text-center">
                    <span class="text-sm font-normal">
                        Sudah pernah daftar?
{{--                        <button type="button" id="toLogin" name="toLogin" class="text-blue-600 underline underline-offset-2">Login</button>--}}
                        <a href="{{route('auth.get.toggle')}}" class="text-blue-600 underline underline-offset-2">Login</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @endif
    <script type="module">
        $(document).ready(function() {
            // $('#toRegister').on('click', function() {
            //     $('#login-section').addClass("hidden");
            //     $('#register-section').removeClass("hidden");
            // });
            //
            // $('#toLogin').on('click', function() {
            //     $('#register-section').addClass("hidden");
            //     $('#login-section').removeClass("hidden");
            // })

            $('#lecturer').change(function(){
                if($(this).is(':checked')){
                    $('#khususLecturer').removeClass("hidden")
                }
            })

            $('#student').change(function(){
                if($(this).is(':checked')){
                    $('#khususLecturer').addClass("hidden")
                }
            })
        });
    </script>
@endsection
