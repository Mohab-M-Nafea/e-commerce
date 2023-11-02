<script setup>
import SearchWindow from "@/components/SearchWindow.vue";
import ShopHeader from "@/components/ShopHeader.vue";
import ShopFooter from "@/components/ShopFooter.vue";
</script>

<template>
    <ShopHeader />
    <SearchWindow />
    <main>
        <RouterView />
    </main>
    <ShopFooter />
</template>

<style scoped></style>
