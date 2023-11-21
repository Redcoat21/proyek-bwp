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

    console.log(showForm);
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
    <main class="z-10">
        <article>
            <Jumbotron></Jumbotron>
        </article>
    </main>
</template>
