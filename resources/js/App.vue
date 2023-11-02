<script setup>
import { computed } from "vue";
import AdminLayout from "@/layouts/AdminLayout.vue";
import PublicLayout from "@/layouts/PublicLayout.vue";

let url = window.location.pathname.substring(1).split("/", 1)[0];

const layout = computed(() => (url === "admin" ? AdminLayout : PublicLayout));
</script>

<template>
    <component :is="layout"> </component>
</template>

<style scoped></style>
