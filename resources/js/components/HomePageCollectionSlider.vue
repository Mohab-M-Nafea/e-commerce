<script setup>
import HomeSection from "@/components/HomeSection.vue";

const collections = [
    {
        url: "collections/smartphones",
        image: "https://cartify.novabolt.dev/storage/media/2162/smartphone.png",
        collection: "Smartphones",
    },
    {
        url: "collections/earbuds",
        image: "https://cartify.novabolt.dev/storage/media/2163/earbuds.webp",
        collection: "Earbuds",
    },
    {
        url: "collections/speakers",
        image: "https://cartify.novabolt.dev/storage/media/2164/speakers.webp",
        collection: "Speakers",
    },
    {
        url: "collections/headphones",
        image: "https://cartify.novabolt.dev/storage/media/2165/headphones.webp",
        collection: "Headphones",
    },
    {
        url: "collections/audio",
        image: "https://cartify.novabolt.dev/storage/media/2166/subwoofers.webp",
        collection: "Subwoofers",
    }
];
</script>

<template>
    <HomeSection
        title="Our collections"
        :link-url="{ name: 'collections' }"
        link-text="Browse all collections"
    >
        <div class="mt-5 flow-root">
            <div class="-my-2">
                <div
                    class="relative box-content h-64 overflow-x-auto scroll-no-bar py-2 xl:overflow-visible"
                >
                    <div
                        class="min-w-screen-xl absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-8 xl:space-x-0 xl:px-0"
                    >
                        <router-link
                            v-for="collection in collections"
                            :key="collection.collection"
                            :to="collection.url"
                            class="group relative flex h-64 w-56 flex-col overflow-hidden rounded-lg p-6 xl:w-auto"
                        >
                            <span aria-hidden="true" class="absolute inset-0">
                                <img
                                    :src="collection.image"
                                    :alt="collection.collection"
                                    class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-125"
                                />
                            </span>
                            <span
                                aria-hidden="true"
                                class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-slate-800 opacity-50"
                            ></span>
                            <span
                                class="relative mt-auto text-center text-xl font-bold text-white"
                            >
                                {{ collection.collection }}
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </HomeSection>
</template>

<style scoped></style>
