@extends('template.baseTemplate')

@section('title')
Home
@endsection
@section('header')
    <nav class="bg-white border border-black-1000">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-blue-500">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">RuangDosen</span>
            </a>
            <div class="items-center justify-between flex w-auto" id="navbar-search">
                <ul class="flex p-0 font-medium space-x-8 flex-row mt-0 bg-white">
                    <li>
                        <a href="{{ route('home.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('listcourse.get') }}" class="block text-blue-600 bg-transparent p-0">Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('listlecturer.get') }}" class="block text-gray-900 hover:bg-transparent hover:text-blue-600 p-0">Lecturer</a>
                    </li>
                </ul>
            </div>
            <div class="flex">
                <div class="relative block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                </div>
                <div class="relative block my-2 mx-3">
                    <a class="bg-blue-600 hover:bg-blue-800 text-white py-1 px-3 border border-blue-600 rounded">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <!-- <section class="bg-center bg-no-repeat bg-cover bg-gray-300 bg-blend-multiply relative overflow-hidden" style="background-image: url('{{ asset('asset/jumbotron.jpg') }}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Belajar dimana saja dan kapan saja</h2>
            <p class="mb-8 text-lg font-normal text-gray-100 lg:text-xl sm:px-16 lg:px-48">Dengan Pengajar Professional setara dengan Dosen Universitas <br> dan <br> berbagai macam topik menarik</p>            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
        </div>
    </section> -->
    <!--Pelajari Topik Baru text-->
    <div class="pt-7 pb-4 px-12 mb-12">
        <div class="text-blue-500 text-3xl font-bold">
            Pelajari Topik Baru
        </div>
    </div>
    <!--Content carousel-->
    <div class="relative">
        <div id="carousel" class="carousel flex overflow-hidden mx-8">
            <!-- Slides -->
            <!-- Content for Slide 1 -->
            <div class="carousel-item">
                <div class="flex place-content-center mb-1">
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Alvin Setia, S.Kom. M.Kom.</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="	https://g2.img-dpreview.com/2E3F787848C541C3BB196015762B1CFD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/male_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Ahmad Bambang S.Mat, M.Mat</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g1.img-dpreview.com/FF9CE2684532407EA326F7E9562EB91A.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/female_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Jessica  M.H. S.Ak</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content for Slide 2 -->
            <div class="carousel-item">
                <div class="flex place-content-center mb-1">
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content for Slide 3 -->
            <div class="carousel-item">
                <div class="flex place-content-center mb-1">
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-1 rounded shadow-md pb-4 w-1/4 mx-2" >
                        <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
                        <div class="p-2">
                            <div class="flex items-center">
                                <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Page 1</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="flex items-center justify-between">
                                <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                                <span class="text-gray-400">Dec 26, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation buttons -->
            <button id="prevBtn" class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 px-2 py-5 text-black text-4xl bg-gray-500 bg-opacity-10 rounded-r-sm font-bold">&lt;</button>
            <button id="nextBtn" class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 px-2 py-5 text-black text-4xl bg-gray-500 bg-opacity-10 rounded-l-sm font-bold">&gt;</button>
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

    <!--Lihat topik hangat saat ini text-->
    <div class="pt-7 px-12 pb-5 mb-12">
        <div class="text-blue-500 text-3xl font-bold">
            Lihat topik hangat saat ini
        </div>
    </div>
    <!--Content Topik Hangat-->
    <div class="flex flex-wrap items-center justify-center h-screen mx-8 mb-4">
        @for($i = 0; $i < 5; $i++)
        <div class="bg-white p-1 rounded shadow-md pb-4 mx-5 mb-5" style="width:25%;">
            <img src="https://g2.img-dpreview.com/81C81CB44922409EA3C99FA3E42369CD.jpg" alt="" class="w-full rounded mb-3">
            <div class="p-2">
                <div class="flex items-center">
                    <img src="{{ asset('asset/old_lecturer.jpg') }}" alt="Image Lecturer" class="rounded-full w-10 mr-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 pt-3">Alvin Setia, S.Kom. M.Kom.</h2>
                </div>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="flex items-center justify-between">
                    <a href="#" class="text-blue-500 hover:underline">Learn More</a>
                    <span class="text-gray-400">Dec 26, 2023</span>
                </div>
            </div>
        </div>
        @endfor
    </div> 
@endsection