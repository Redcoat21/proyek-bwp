@extends('template.baseTemplate')

@section('title')
    Home
@endsection

@section('header')
    <x-navbar :searchBar="false" activePage="home" />
@endsection

@section('content')
    <section class="bg-center bg-no-repeat bg-cover bg-gray-300 bg-blend-multiply relative overflow-hidden" style="background-image: url('{{ asset('asset/jumbotron.jpg') }}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Belajar dimana saja dan kapan saja</h2>
            <p class="mb-8 text-lg font-normal text-gray-100 lg:text-xl sm:px-16 lg:px-48">Dengan Pengajar Professional setara dengan Dosen Universitas <br> dan <br> berbagai macam topik menarik</p>            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
        </div>
    </section>

    <div id="top-lecturer" class="mt-16 mb-10">
        <div class="w-full text-center mb-10">
            <h1 class="text-4xl font-bold text-blue-500">Our Top Lecturer</h1>
        </div>
        <div class="grid grid-cols-3 justify-items-center mb-5">
            @foreach($topLecturers as $topLecturer)
                <div class="place-self-center text-center w-3/5">
                    <div class="flex flex-col items-center">
                        <div class="flex justify-center">
                            <img class="rounded-full w-3/4 h-auto" src="{{ asset($topLecturer->profile_picture) }}" alt="profile-picture">
                        </div>
                        <span class="mt-3 mb-1 block font-semibold text-2xl px-3 text-blue-600">{{ $topLecturer->name }}</span>
                        <span class="mb-3 block font-normal text-sm px-3 text-blue-600">{{ $topLecturer->description }}</span>
                        <a href="
                    @if (!auth()->user())
                        {{ route('auth.get') }}
                    @else
                        {{ route('home.get') }}
                    @endif
                    " class="bg-blue-600 hover:bg-blue-800 text-white py-2 px-6 border border-blue-600 rounded-full text-sm mt-2">
                            See Courses
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-32" id="top-course">
        <div class="w-full text-center mb-5">
            <h1 class="text-4xl font-bold text-blue-500">Our Top Courses</h1>
        </div>
        <div class="grid grid-cols-3 my-10 justify-items-center">

            @foreach ($topCourses as $course)
                <a href="
                @if (!auth()->user())
                    {{ route('auth.get') }}
                @else
                    {{ route('home.get') }}
                @endif
                " class="w-3/5 bg-white border border-gray-200 rounded-lg hover:shadow-md place-self-center self-start">
                    @if($course->cover)
                        <img class="rounded-t-lg w-full" src="{{ asset($course->cover) }}" alt="">
                    @else
                        <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                    @endif
                    <div class="p-5">
                        <div class="flex items-center space-x-3">
                            @if($course->profile_picture)
                                <img src="{{ asset($course->profile_picture) }}" class="h-8 border-none rounded" alt="pp">
                            @else
                                <img src="{{ asset('asset/def_pp.jpg') }}" class="h-8 border-none rounded" alt="pp">
                            @endif
                            <span class="self-center text-xs font-normal whitespace-nowrap">{{ $course->user_name }}</span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <!--newest course text-->
    <div class="w-full text-center mb-10">
        <h1 class="text-4xl font-bold text-blue-500">Learn Our Newest Courses</h1>
    </div>
    <!--Content carousel-->
    <div class="relative">
        <div id="carousel" class="carousel flex justify-center">
            {{-- Carousel for each section --}}
            @foreach($newCourses as $newCourse)
                <div class="carousel-item w-full">
                    <div class="grid grid-cols-3 justify-items-center mb-5">
                    {{--  Carousel item for each section (3 card) --}}
                    @foreach($newCourse as $course)
                            <a href="
                            @if (!auth()->user())
                                {{ route('auth.get') }}
                            @else
                                {{ route('home.get') }}
                            @endif
                            " class="w-3/5 bg-white border border-gray-200 rounded-lg hover:shadow-md">
                                <img class="rounded-t-lg w-full" src="{{ asset('asset/aws.jpg') }}" alt="">
                                <div class="p-5">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ asset($course->cover) }}" alt="course-cover" class="h-8 border-none rounded">
                                        <span class="self-center text-xs font-normal whitespace-nowrap">{{ $course->lecturers->name }}</span>
                                    </div>
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->name }}</h5>
                                    <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                                </div>
                            </a>
                    @endforeach
                    </div>
                </div>
            @endforeach
            <!-- Navigation buttons -->
            <button id="prevBtn" class="carousel-prev absolute left-10 top-1/2 transform -translate-y-1/2 px-2 py-5 rounded-r-sm hover:border-2 hover:border-black">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                </svg>
            </button>
            <button id="nextBtn" class="carousel-next absolute right-10 top-1/2 transform -translate-y-1/2 px-2 py-5 rounded-l-sm hover:border-2 hover:border-black">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
            </button>
        </div>
    </div>
    <!--Javascript button-->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const carousel = document.getElementById("carousel");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const slides = document.querySelectorAll(".carousel-item");
        let currentIndex = 0;

        // Function to show the current slide
        const showSlide = () => {
        slides.forEach((slide, index) => {
            if (index === currentIndex) {
            slide.classList.remove("hidden");
            } else {
            slide.classList.add("hidden");
            }
        });
        };

        // Function to go to the previous slide
        const prevSlide = () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide();
        };

        // Function to go to the next slide
        const nextSlide = () => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide();
        };

        // Event listeners for previous and next buttons
        prevBtn.addEventListener("click", prevSlide);
        nextBtn.addEventListener("click", nextSlide);

        // Event listener for arrow keys
        document.addEventListener("keydown", function (event) {
        if (event.key === "ArrowLeft") {
            prevSlide();
        } else if (event.key === "ArrowRight") {
            nextSlide();
        }
        });

        // Initial display
        showSlide();
    });
    </script>
@endsection
