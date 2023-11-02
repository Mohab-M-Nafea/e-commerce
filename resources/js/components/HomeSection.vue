<script setup>
import SectionHeader from "@/components/SectionHeader.vue";

defineProps({
    title: String,
    linkUrl: Object,
    linkText: String,
});
</script>

<template>
    <section
        class="bg-white px-4 pt-24 space-y-5 sm:px-6 sm:pt-32 xl:mx-auto xl:max-w-7xl lg:px-8"
    >
        <SectionHeader
            :title="title"
            :link-url="linkUrl"
            :link-text="linkText"
        />
        <slot />
    </section>
</template>

<style scoped></style>
