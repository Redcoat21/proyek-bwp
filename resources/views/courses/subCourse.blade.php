@extends('template.baseTemplate')

@section('title')
    Sub Course
@endsection

@section('header')
<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-1 p-4">
        <a href="{{ route('home.get') }}" class="flex items-center space-x-3 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap">BACK</span>
        </a>
    </div>
</nav>
@endsection

@section('content')
    <div class="mx-8 my-4">
        <div class="w-full p-3 font-semibold text-2xl">Introduction to AWS</div>
        <hr class="h-px my-2 border-0 bg-gray-400">
        <div class="p-3 font-base text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic maiores dolorem aliquid quam repellat, voluptates magnam saepe dolore aut soluta quas voluptatibus et provident! Vero natus corporis reprehenderit voluptate sapiente beatae esse mollitia, repudiandae provident praesentium exercitationem error officia aliquid! Velit unde voluptas cumque beatae amet officia temporibus vel modi, illo natus magni, eligendi sapiente voluptates excepturi ex! Natus excepturi unde blanditiis eius voluptate omnis quam alias deserunt dolores nemo laboriosam nesciunt cupiditate similique aliquid porro temporibus placeat a dolorum inventore ad obcaecati sint, soluta iste beatae. Neque facilis incidunt error ab amet veritatis alias mollitia blanditiis tenetur sed. Maxime.</div>
        <div class="flex justify-between mx-5 my-3">
            <a href="" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Previous
            </a>
            <a href="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center inline-flex items-center">
                Next
                <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
@endsection
