<script setup>

import PageHeader from "@/Components/PageHeader.vue";
import CourseraButton from "@/Components/CourseraButton.vue";
import AuthenticationLayout from "@/Layouts/AuthenticationLayout.vue";
import { ref } from 'vue';
import Jumbotron from "@/Components/Jumbotron.vue";
import ModalOverlay from "@/Components/ModalOverlay.vue";
import Card from "@/Components/Card.vue";
import Footer from "@/Components/Footer.vue";

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
        <article class="grow">
            <section class="flex justify-center">
                <h1 class="font-semibold text-coursera-blue text-4xl my-7">Our Top Lecturer</h1>
            </section>
            <section class="flex">
                <Card :borderless="false">
                    <template #cardImage>
                        <div class="h-52 w-52 rounded-full bg-green-300">
                            <img src="" alt="">
                        </div>
                    </template>
                    <template #cardContent>
                        <div>
                            <h1 class="text-coursera-blue text-2xl font-semibold break-all">Ahmad Bambang Cecep S.Mat, M.Mat</h1>
                        </div>
                    </template>
                </Card>
                <div></div>
                <div></div>
            </section>
        </article>
        <article class="grow">

        </article>
    </main>
    <Footer />
</template>
