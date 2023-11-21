<script setup>

import PageHeader from "@/Components/PageHeader.vue";
import CourseraButton from "@/Components/CourseraButton.vue";
import AuthenticationLayout from "@/Layouts/AuthenticationLayout.vue";
import { ref } from 'vue';
import Jumbotron from "@/Components/Jumbotron.vue";
import ModalOverlay from "@/Components/ModalOverlay.vue";

const showForm = ref(false);

function toggleShowForm() {
    showForm.value = !showForm.value;
}
</script>

<template>
    <PageHeader>
        <template #courseraButton>
            <CourseraButton v-on:click="toggleShowForm" class="hover:bg-blue-900">
                Login
            </CourseraButton>
        </template>
    </PageHeader>
    <ModalOverlay v-on:close-button-clicked="toggleShowForm" v-if="showForm">
        <AuthenticationLayout :is-login-form=true></AuthenticationLayout>
    </ModalOverlay>
    <main>
        <article>
            <Jumbotron>
                <div class="flex flex-col items-center justify-center h-full">
                    <div>
                        <h1 class="text-5xl font-semibold my-2">Belajar dimana saja dan kapan saja</h1>
                    </div>
                    <div>
                        <h1 class="text-3xl font-semibold my-2">Dengan pengajar professional setara dengan Dosen Universitas</h1>
                    </div>
                    <div>
                        <h1 class="text-3xl font-semibold my-2">Dilengkapi dengan berbagai macam topik menarik</h1>
                    </div>
                </div>
            </Jumbotron>
        </article>
        <article>
            <section class="flex justify-center">
                <h1 class="font-semibold text-coursera-blue text-4xl">Our Top Lecturer</h1>
            </section>
            <section class="flex">
                <div></div>
                <div></div>
                <div></div>
            </section>
        </article>
    </main>
</template>
