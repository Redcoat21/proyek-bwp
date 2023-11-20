<script lang="ts" setup>

import Button from "@/Components/Button.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Jumbotron from "@/Components/Jumbotron.vue";
</script>

<template>
    <PageHeader>
        <template #authButton>
            <Button class="hover:bg-blue-900 text-white">
                Login
            </Button>
        </template>
    </PageHeader>
    <main class="h-screen">
        <article class="h-1/2">
            <Jumbotron>
                <template #jumbotronImage>
                    <div class="bg-[url('../../public/asset/jumbotron.jpg')] h-full">

                    </div>
                </template>
                <template #jumbotronText>
                    abccdef
                </template>
            </Jumbotron>
        </article>
    </main>
</template>
