<script setup>
    import { defineProps, ref, computed } from 'vue';
    import TextBox from "@/Components/TextBox.vue";

    const props = defineProps({
        identifier: String,
        label: String,
        placeholder: String,
        inputClass: String,
        labelClass: String,
        labelBlock: Boolean,
        binding: String,
        hasEye: Boolean
    });

    const model = ref(props.binding);
    const eyeOpen = ref(false);

    function toggleEye() {
        eyeOpen.value = !eyeOpen.value;
    }

    const emit = defineEmits(['model-changed', 'focus-in', 'focus-out']);
    function updateBinding(value) {
        emit('model-changed', value);
    }

    const type = computed(() => eyeOpen.value ? 'text' : 'password');
    const url = computed(() => eyeOpen.value ? '/icon/eye-open.svg' : '/icon/eye-closed.svg');
</script>

<template>
        <label :for="props.identifier" :class="[props.labelClass]">
            {{ props.label }}
        </label>
        <div class="flex border">
            <input
                :type="type"
                :name="props.identifier"
                :id="props.identifier"
                :placeholder="props.placeholder"
                :class="props.inputClass"
                v-model="model"
                @input="updateBinding($event.target.value)"
                @focusin="$emit('focus-in')"
                @focusout="$emit('focus-out')"
            >
            <button @click.prevent="toggleEye" v-if="props.hasEye">
                <img :src="url" alt="" class="w-7 h-7">
            </button>
        </div>
</template>
