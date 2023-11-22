<script setup>
    import { defineProps } from 'vue';
    const props = defineProps({
        borderless: false,
    });
</script>

<template>
    <div class="rounded-lg" :class="{ 'border': !props.borderless }">
        <div>
            <slot name="cardImage"></slot>
        </div>
        <hr>
        <div>
            <slot name="cardContent"></slot>
        </div>
    </div>
</template>
