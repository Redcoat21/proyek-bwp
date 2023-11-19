<script lang="ts" setup>
    import route from "ziggy-js";
</script>

<template>
    <header class="flex bg-neutral-100">
        <a :href="route('home')">
            <h1 class="text-4xl font-semibold text-blue-600 p-2">RuangDosen</h1>
        </a>
        <form action="" method="">
            <div class="flex p-2">
                <label for="searchBar"></label>
                <input type="text" name="searchBar" id="searchBar" placeholder="Apa yang ingin anda cari?" class="border p-1.5">
                <button class="grow bg-blue-600">
                    <img src="/icon/search.svg" alt="search" class="w-9 h-9 p-1.5">
                </button>
            </div>
        </form>
        <div class="my-auto grow flex justify-end">
            <button class="flex bg-blue-600 rounded-lg py-2.5 px-4 text-white">
                Dropdown
                <img src="/icon/dropdown-white.svg" alt="dropdown-arrow" class="w-3 h-3 my-2 mx-1">
            </button>
        </div>
        <div class="grow flex justify-end my-auto">
            <button class="text-white bg-blue-600 rounded-lg py-3 px-4 my-auto font-semibold hover:bg-blue-900">
                Login
            </button>
        </div>
    </header>
</template>
