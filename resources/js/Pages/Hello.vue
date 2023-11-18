<script lang="ts" setup>
import Layout from "@/Pages/Layout.vue";
import Babi from "@/Pages/test/Babi.vue";
const a: string = "hello";
</script>

<template>
    <Babi />
    <Layout>
        {{ a }}
    </Layout>
</template>
