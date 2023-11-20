<script lang="ts" setup>
    const props = defineProps<{
        id?: string,
        name?: string,
        label?: string,
        placeholder?: string,
        inputType: string,
    }>();
</script>

<template>
    <label :for="props.id">{{ props.label }}</label>
    <input :type="props.inputType"
           class="p-1.5 border"
           :name="props.id"
           :id="props.id"
           :placeholder="props.placeholder"
    >
</template>
