<script setup>

import TextBox from "@/Components/TextBox.vue";
import { useForm } from "@inertiajs/vue3";
import CourseraButton from "@/Components/CourseraButton.vue";
import { ref } from 'vue';
import { passwordStrength } from "check-password-strength";
import PasswordInput from "@/Components/PasswordInput.vue";

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    passwordConfirmation: ''
});

const passwordStrengthChecker = ref(false);

function togglePasswordStrengthChecker() {
    passwordStrengthChecker.value = !passwordStrengthChecker.value;
}

const passwordStrengthValue = ref(0);

function checkPasswordStrength() {
    const password = form.password;
    const result = passwordStrength(password).value;
    let value = -1;

    if(result === "Medium") {
        value = 2;
    } else if(result === "Strong") {
        value = 3;
    } else if(result === "Weak") {
        value = 1;
    } else {
        value = 0;
    }

    passwordStrengthValue.value = value;
}

const passwordMatch = ref(false);
function checkPasswordConfirmation() {
    passwordMatch.value = form.password === form.passwordConfirmation;
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
                    v-on:model-changed="args => { form.username = args }"
                    type="text"
                    placeholder="Masukkan username anda"
                    label="USERNAME"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 border w-full"
                    :binding="form.username"
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
                <PasswordInput
                    v-on:model-changed="args => { form.password = args; checkPasswordStrength() }"
                    v-on:focus-in="togglePasswordStrengthChecker"
                    v-on:focus-out="togglePasswordStrengthChecker"
                    placeholder="Masukkan password anda"
                    label="PASSWORD"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 w-full h-full"
                    :binding="form.password"
                    :hasEye="true"
                />
            </div>
            <section class="flex" v-if="passwordStrengthChecker">
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrengthValue === 0,
                    'bg-red-600': passwordStrengthValue === 1,
                     'bg-yellow-600': passwordStrengthValue === 2,
                     'bg-green-600': passwordStrengthValue === 3}"
                >
                </div>
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrengthValue === 0,
                     'bg-yellow-600': passwordStrengthValue === 2,
                     'bg-green-600': passwordStrengthValue === 3}"></div>
                <div
                    class="h-2 w-1/3 mx-2"
                    :class="{
                    'bg-neutral-200': passwordStrengthValue === 0,
                     'bg-green-600': passwordStrengthValue === 3}"></div>
            </section>
            <section class="flex" v-if="passwordStrengthChecker">
                <p class="text-red-600 mx-2" v-if="passwordStrengthValue === 0">TOO WEAK</p>
                <p class="text-red-600 mx-2" v-if="passwordStrengthValue === 1">WEAK</p>
                <p class="text-yellow-600 mx-2" v-if="passwordStrengthValue === 2">MODERATE</p>
                <p class="text-green-600 mx-2" v-if="passwordStrengthValue === 3">STRONG!</p>
            </section>
            <div class="my-1 px-2">
                <PasswordInput
                    v-on:model-changed="args => { form.passwordConfirmation = args; checkPasswordConfirmation() }"
                    placeholder="Masukkan password anda"
                    label="PASSWORD"
                    label-class="block text-sm my-2"
                    input-class="p-1.5 w-full h-full"
                    :binding="form.passwordConfirmation"
                    :hasEye="true"
                />
            </div>
            <section class="flex" v-if="!passwordMatch">
                <p class="text-red-600 mx-2">Password doesnt match!</p>
            </section>
            <div class="my-1 px-2">
                <CourseraButton class="w-full hover:bg-blue-900 my-2">
                    Register
                </CourseraButton>
            </div>
        </form>
    </div>
</template>
