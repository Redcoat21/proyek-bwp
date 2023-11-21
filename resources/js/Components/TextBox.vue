<script setup>
    import { onMounted, ref, watch } from 'vue';
    const props = defineProps({
        identifier: String,
        type: String,
        label: String,
        placeholder: String,
        inputClass: String,
        labelClass: String,
        labelBlock: Boolean,
        binding: String
    });

    const model = ref(props.binding);
    const emit = defineEmits(['model-changed', 'focus-in', 'focus-out']);

    function updateBinding(value) {
        emit('model-changed', value);
    }
</script>

<template>
    <div>
        <label :for="props.identifier" :class="[props.labelClass]">
            {{ props.label }}
        </label>
        <input
            :type="props.type"
            :name="props.identifier"
            :id="props.identifier"
            :placeholder="props.placeholder"
            :class="props.inputClass"
            v-model="model"
            @input="updateBinding($event.target.value)"
            @focusin="$emit('focus-in')"
            @focusout="$emit('focus-out')"
        >
    </div>
</template>
