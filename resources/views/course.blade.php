@extends('template.baseTemplate')

@section('title')
Nama Course
@endsection

@section('header')
    <nav class="bg-white border border-black-1000">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-1">
            <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-blue-500">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">RuangDosen</span>
            </a>
            <div class="items-center justify-between flex w-auto" id="navbar-search">
                <ul class="flex p-0 font-medium space-x-8 flex-row mt-0 bg-white">
                    <li>
                        <a href="{{ route('home.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Home</a>
                    </li>
                    <li>
                        <a href="
                        @if (!auth()->user())
                            {{ route('auth.get') }}
                        @else
                            {{ route('listCourse.get') }}
                        @endif
                        " class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Courses</a>
                    </li>
                </ul>
            </div>
            <div class="flex">
                <div class="relative block my-2 mx-3">
                    @if (!auth()->user())
                        <a href="{{ route('auth.get') }}" class="bg-blue-600 hover:bg-blue-800 text-white py-1 px-3 border border-blue-600 rounded text-sm">
                            Login
                        </a>
                    @else
                        <a href="{{ route('auth.post.logout') }}">
                            <img src="{{ asset('asset/def_pp.jpg') }}"class="h-10 rounded-full" alt="pp">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
<div class="bg-blue-100">
    <div class="space-y-0 space-x-8 flex items-center py-4 mx-6">
        <div class="flex items-center justify-center h-48 rounded w-96">
            <img src="{{ asset('asset/aws.jpg') }}" alt="course-pp" class="rounded">
        </div>
        <div class="w-4/5">
            <div class="mb-3">
                <span class="font-semibold text-2xl">Cloud Engineering for Beginners</span>
            </div>
            <div class="mb-3">
                <p class="text-base text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis temporibus labore natus provident delectus vitae expedita cum sit quisquam inventore consequatur, quam repudiandae id sapiente. Iste perferendis iusto accusamus ratione dolorem voluptatibus illum veritatis ex, maiores quae labore eius facere at blanditiis eveniet dolore sunt fugiat aperiam amet perspiciatis eaque numquam. Voluptas dicta nesciunt atque eius facilis voluptatem debitis architecto dolore. Ab maxime modi molestiae esse minima quia illo eveniet labore tempore, sequi accusantium neque consequatur eum sit voluptate exercitationem autem earum odio beatae consequuntur harum error. Quis sit, fugit commodi, sed non aperiam, quia dolores tempore cum doloremque mollitia.</p>
            </div>
            <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Buy now Rp. 100.000,00
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>
        </div>
    </div>
</div>

@endsection
