@extends('template.baseTemplate')

@section('title')
    Detail Course
@endsection

@section('header')
    <x-navbar :searchBar="false" activePage="course" />
@endsection

@section('content')
<div class="hover:bg-blue-100">
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
        </div>
    </div>
</div>
<hr class="h-px mb-8 bg-gray-400 border-0 mx-6">
    <div class="mx-20">
        <span class="font-semibold text-xl">Courses</span>
        <ul class="w-full">
            <a href="#" class="">
                <li class="w-full py-4 px-4 hover:bg-gray-100">
                    <span class="pe-2 border-e-2">1</span> Introduction to AWS
                </li>
            </a>
            <a href="#" class="">
                <li class="w-full py-4 px-4 hover:bg-gray-100">
                    <span class="pe-2 border-e-2">2</span> AWS Cloud
                </li>
            </a>
            <a href="#" class="">
                <li class="w-full py-4 px-4 hover:bg-gray-100">
                    <span class="pe-2 border-e-2">3</span> Cloud Engineering
                </li>
            </a>
        </ul>
    </div>
@endsection
