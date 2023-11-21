<script setup>
import LoginForm from "@/Components/LoginForm.vue";
import {computed, onMounted, ref} from 'vue';
import RegistrationForm from "@/Components/RegistrationForm.vue";

const props = defineProps({
    isLoginForm: Boolean
});

defineEmits(['close-button-clicked']);

const isLogin = ref(props.isLoginForm);

function toggleLoginForm() {
    isLogin.value = !isLogin.value;
}

const headerText = computed(() => isLogin.value ? 'Login' : 'Register');
</script>

<template>
    <article class="flex flex-col rounded-lg mx-auto w-1/2 h-1/2 bg-white overflow-y-scroll">
        <article class="rounded-lg mx-3 my-3">
            <section class="flex justify-end p-3">
                <button v-on:click="$parent.$emit('close-button-clicked')" class="text-3xl text-coursera-blue mx-5">X</button>
            </section>
            <section class="mx-auto flex justify-center">
                <h1 class="text-coursera-blue text-3xl font-semibold">{{ headerText }}</h1>
            </section>
            <section class="flex">
                <div class="my-1 flex justify-center grow" v-if="isLogin">
                    <LoginForm />
                </div>
                <div class="my-1 flex justify-center grow" v-else>
                    <RegistrationForm />
                </div>
            </section>
            <section class="flex justify-center" v-if="isLogin">
                Baru di RuangDosen?
                <button v-on:click="toggleLoginForm" class="underline text-blue-400">Daftar</button>
            </section>
            <section class="flex justify-center" v-else>
                Sudah punya akun?
                <button v-on:click="toggleLoginForm" class="underline text-blue-400">Log in sekarang</button>
            </section>
        </article>
    </article>
</template>
