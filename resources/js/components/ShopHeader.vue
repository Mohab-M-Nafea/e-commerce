<script setup>
import ShopNavbar from "@/components/ShopNavbar.vue";
</script>

<template>
    <header class="relative bg-white">
        <div class="bg-sky-700">
            <div
                class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8"
            >
                <p class="text-sm font-medium text-white">
                    Welcome to our store!
                </p>
                <div
                    class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6"
                >
                    <a
                        href="https://www.google.com/maps"
                        class="text-sm font-medium text-white hover:text-gray-100"
                    >
                        Our locations
                    </a>
                    <span
                        class="h-6 w-px bg-sky-600/50"
                        aria-hidden="true"
                    ></span>
                    <router-link
                        to="contact.html"
                        class="text-sm font-medium text-white hover:text-gray-100"
                    >
                        Contact us
                    </router-link>
                </div>
            </div>
        </div>
        <ShopNavbar />
    </header>
</template>

<style scoped></style>
