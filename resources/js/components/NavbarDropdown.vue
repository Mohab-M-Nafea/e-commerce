<script setup>
import { ref } from "vue";
import NavbarDropdownMenu from "@/components/NavbarDropdownMenu.vue";

const isOpen = ref(false);

function close() {
    if (isOpen.value) {
        isOpen.value = false;
    }
}
</script>

<template>
    <div @keydown.esc="isOpen = false" class="flex" v-click-away="close">
        <div class="dropdown relative flex">
            <button
                @click="isOpen = !isOpen"
                type="button"
                class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out focus-visible:outline-0"
                :class="{
                    'border-sky-600 text-sky-600': isOpen,
                    'border-transparent text-slate-700 hover:text-slate-800':
                        !isOpen,
                }"
                :aria-expanded="isOpen.toString()"
            >
                <span>Shop</span>
            </button>
        </div>
        <NavbarDropdownMenu v-show="isOpen" />
    </div>
</template>

<style scoped></style>
