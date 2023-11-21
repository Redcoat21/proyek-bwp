<script lang="ts" setup>

import PageHeader from "@/Components/PageHeader.vue";
import CourseraButton from "@/Components/CourseraButton.vue";
import AuthenticationLayout from "@/Layouts/AuthenticationLayout.vue";
import { ref } from 'vue';

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
    <AuthenticationLayout v-on:close-button-clicked="toggleShowForm" v-if="showForm" :is-login-form=true></AuthenticationLayout>
</template>
