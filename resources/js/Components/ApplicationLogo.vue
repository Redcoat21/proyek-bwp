<template>
    <!--    Will always route back to home -->
    <a :href="route('home')" class="text-blue-600">
        <slot />
    </a>
</template>
