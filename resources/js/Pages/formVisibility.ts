import { ref } from 'vue';

export const formVisibility = ref(true);

export function toggleFormVisibility() {
    formVisibility.value = !formVisibility.value;
}
