<script lang="ts" setup>

import TextBox from "@/Components/TextBox.vue";
import { useForm } from "@inertiajs/vue3";
import CourseraButton from "@/Components/CourseraButton.vue";
import {computed, ref} from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    passwordConfirmation: ''
});

const passwordStrengthChecker = ref(false);

function togglePasswordStrengthChecker() {
    passwordStrengthChecker.value = !passwordStrengthChecker.value;
}

const passwordStrength = ref(0);
// Return 1 for weak
// Return 2 for moderate
// Return 3 for strong
function checkPasswordStrength() {
    const password = form.password;

    if(password.length < 5) {
        passwordStrength.value = 1;
    }
    else if(password.length < 10) {
        passwordStrength.value = 2;
    }
    else {
        passwordStrength.value = 3;
    }

    console.log(passwordStrength.value);
}
</script>

<template>
    <div class="w-1/2">
        <form action="">
            <div class="my-1 px-2">
                <TextBox
                    v-on:model-changed="args => { form.name = args }"
                    type="text"
                    placeholder="Masukkan nama lengkap anda"
                    label="NAMA LENGKAP"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 border w-full"
                    :binding="form.name"
                />
            </div>
            <div class="my-1 px-2">
                <TextBox
                    v-on:model-changed="args => { form.email = args }"
                    type="email"
                    placeholder="nama@email.com"
                    label="EMAIL"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 border w-full"
                    :binding="form.email"
                />
            </div>
            <div class="my-1 px-2">
                <TextBox
                    v-on:model-changed="args => { form.password = args; checkPasswordStrength() }"
                    v-on:focus-in="togglePasswordStrengthChecker"
                    v-on:focus-out="togglePasswordStrengthChecker"
                    type="password"
                    placeholder="Masukkan password anda"
                    label="PASSWORD"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 border w-full"
                    :binding="form.password"
                />
            </div>
            <section class="flex" v-if="passwordStrengthChecker">
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrength === 0,
                    'bg-red-600': passwordStrength === 1,
                     'bg-yellow-600': passwordStrength === 2,
                     'bg-green-600': passwordStrength === 3}"
                >
                </div>
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrength === 0,
                     'bg-yellow-600': passwordStrength === 2,
                     'bg-green-600': passwordStrength === 3}"></div>
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrength === 0,
                     'bg-green-600': passwordStrength === 3}"></div>
            </section>
            <section class="flex" v-if="passwordStrengthChecker">
                <p class="text-red-600 mx-2" v-if="passwordStrength === 1">WEAK</p>
                <p class="text-yellow-600 mx-2" v-if="passwordStrength === 2">MODERATE</p>
                <p class="text-green-600 mx-2" v-if="passwordStrength === 3">STRONG!</p>
            </section>
            <div class="my-1 px-2">
                <TextBox
                    v-on:model-changed="args => { form.passwordConfirmation = args }"
                    type="password"
                    placeholder="Masukkan kembali password anda"
                    label="PASSWORD CONFIRMATION"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 border w-full"
                    :binding="form.passwordConfirmation"
                />
            </div>
            <div class="my-1 px-2">
                <CourseraButton class="w-full hover:bg-blue-900 my-2">
                    Register
                </CourseraButton>
            </div>
        </form>
    </div>
</template>
