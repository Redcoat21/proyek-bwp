<script setup>
    import { Link } from '@inertiajs/vue3';
    import route from "ziggy-js";
    import TextBox from "@/Components/TextBox.vue";
    import CourseraButton from "@/Components/CourseraButton.vue";
</script>

<template>
    <header class="bg-neutral-100 flex items-center">
        <div class="grow p-2">
            <Link :href="route('home')" class="text-coursera-blue text-4xl font-semibold">
                RuangDosen
            </Link>
        </div>
        <div>
            <div class="flex">
                <TextBox type="text" placeholder="Mau belajar apa kali ini?" input-class="p-1.5" />
                <button class="bg-coursera-blue grow">
                    <img src="/icon/search.svg" alt="search" class="w-10 h-10 p-1.5">
                </button>
            </div>
        </div>
        <div class="grow flex justify-end mx-3">
            <slot name="courseraButton"></slot>
        </div>
    </header>
</template>
