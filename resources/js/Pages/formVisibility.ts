import { ref } from 'vue';

export const formVisibility = ref(true);

export function toggleFormVisibility() {
    console.log('im changed');
    formVisibility.value = !formVisibility.value;
}
