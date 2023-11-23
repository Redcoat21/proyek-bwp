<script setup>

import {computed, defineComponent} from "vue";
import PageHeader from "@/Components/PageHeader.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<template>
    Logged in as {{ user }}
    <GuestLayout />
</template>
