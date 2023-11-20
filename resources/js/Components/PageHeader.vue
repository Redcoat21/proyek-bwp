<script lang="ts" setup>

import Header from "@/Components/Header.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import TextInput from "@/Components/TextInput.vue";
import Button from "@/Components/Button.vue";
</script>

<template>
    <Header class="bg-neutral-300">
        <div class="p-2">
            <ApplicationLogo class="text-4xl font-semibold m-2">
                RuangDosen
            </ApplicationLogo>
        </div>
        <div class="flex items-center grow">
            <form action="">
                <div class="flex p-2">
                    <TextInput input-type="text" id="searchBar" placeholder="Apa yang ingin anda cari?" />
                    <button class="grow bg-blue-600">
                        <img src="/icon/search.svg" alt="search" class="w-9 h-9 p-1.5">
                    </button>
                </div>
            </form>
        </div>
        <div class="grow my-auto">
<!--            TODO: Add Dropdown -->
            This is supposed to be a dropdown
        </div>
        <div class="my-auto mx-2">
            <slot name="authButton"></slot>
        </div>
    </Header>
</template>
