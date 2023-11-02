<script setup>
defineProps({
    title: String,
    linkUrl: Object,
    linkText: String,
});
</script>

<template>
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ title }}
        </h2>
        <router-link
            :to="linkUrl"
            class="hidden text-sm font-semibold text-sky-700 hover:text-sky-600 sm:block"
        >
            {{ linkText }}
            <span aria-hidden="true"> &rarr;</span>
        </router-link>
    </div>
</template>

<style scoped></style>
