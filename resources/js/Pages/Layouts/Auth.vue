<script lang="ts" setup>
    import route from "ziggy-js";
    import { ref, toRef, computed } from 'vue';
    import GoogleButton from "@/Pages/Components/GoogleButton.vue";
    import { useForm } from "@inertiajs/vue3";
    import { formVisibility, toggleFormVisibility } from "@/Pages/formVisibility";

    let props  = defineProps<{
        title: string,
    }>();

    const loginForm = useForm({
        email: '',
        password: ''
    });

    const registerForm = useForm({
       email: '',
       password: '',
       name: '',
       passwordConfirmation: ''
    });

    let authTitle = ref(props.title);

    const postUrl = computed(() => {
        //TODO change it to the proper logic.
        return authTitle.value === 'login' ? 'login' : 'register';
    });
    function toggleLogin(): void {
        authTitle.value = authTitle.value === 'login' ? 'register' : 'login';
    }

    function checkPasswordStrength(): number {
        return 0;
    }
</script>

<template>
    <div v-if="formVisibility">
        <header class="font-semibold text-3xl text-blue-600 flex flex-col">
            <div class="flex justify-end">
                <button class="my-auto mx-5">
                    <button @click="formVisibility = false">X</button>
                </button>
            </div>
            <div class="flex justify-center">
                <a :href="route('home')" class="">
                    <h1 class="text-5xl font-bold text-blue-600 p-2">RuangDosen</h1>
                </a>
            </div>
        </header>
        <div class="flex justify-center my-5">
            <h1 class="text-blue-600 font-semibold text-3xl">LOGIN</h1>
        </div>
        <article class="flex justify-center">
            <section class="grow w-full">
                <form @submit.prevent="" class="w-full flex justify-center">
                    <div v-if="authTitle === 'login'" class="w-1/2">
                        <div>
                            <label for="loginEmail" class="block text-sm my-1.5">EMAIL</label>
                            <input type="email" name="loginEmail" id="loginEmail" placeholder="nama@gmail.com" class="p-2 border border-black w-full" v-model="loginForm.email">
                        </div>
                        <div>
                            <label for="loginPassword" class="block text-sm my-1.5">PASSWORD</label>
                            <input type="password" name="loginPassword" id="loginPassword" placeholder="Masukkan Kata Sandi Anda" class="p-2 border border-black w-full" v-model="loginForm.password">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white font-semibold p-2 rounded-lg w-full hover:bg-blue-900 border border-black my-6">Login</button>
                    </div>
                    <div v-else class="w-1/2">
                        <div>
                            <label for="registerName" class="block text-sm my-1.5">NAMA LENGKAP</label>
                            <input type="text" name="registerName" id="registerName" placeholder="Masukkan nama lengkap anda" class="p-2 border border-black w-full" v-model="registerForm.name">
                        </div>
                        <div>
                            <label for="registerEmail" class="block text-sm my-1.5">EMAIL</label>
                            <input type="email" name="loginEmail" id="loginEmail" placeholder="nama@gmail.com" class="p-2 border border-black w-full" v-model="registerForm.email">
                        </div>
                        <div>
                            <label for="registerPassword" class="block text-sm my-1.5">PASSWORD</label>
                            <input type="password" name="regregisterPassword" id="regregisterPassword" placeholder="Masukkan password anda" class="p-2 border border-black w-full" v-model="registerForm.password">
                        </div>
                        <div>
                            <label for="registerPasswordConfirmation" class="block text-sm my-1.5">KONFIRMASI PASSWORD</label>
                            <input type="password" name="registerPasswordConfirmation" id="registerPasswordConfirmation" placeholder="Masukkan kembali password anda" class="p-2 border border-black w-full" v-model="registerForm.passwordConfirmation">
                        </div>
                    </div>
                </form>
            </section>
        </article>
        <article class="">
            <hr>
        </article>
        <article class="flex">
            <section class="w-full flex justify-center">
                <div class="flex justify-center border border-black rounded-lg w-1/2 my-5">
                    <div>
                        <img src="/icon/google.svg" alt="" class="inline w-10 h-10 justify-start">
                    </div>
                    <button class="w-1/2 grow text-blue-600 font-semibold p-1.5 rounded-lg hover:bg-blue-600 hover:text-white">
                        Lanjutkan dengan Google
                    </button>
                </div>
            </section>
        </article>
        <article class="flex justify-center">
            <h1>
                Baru di RuangDosen?
                <button @click="toggleLogin" class="underline text-blue-400">
                    Daftar
                </button>
            </h1>
        </article>
    </div>
</template>
