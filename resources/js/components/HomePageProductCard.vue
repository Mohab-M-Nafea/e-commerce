<script setup>
import StarIcon from "@/assets/StarIcon.vue";

const props = defineProps({
    product: Object,
});

const { image, url, title, stars, reviews, price } = props.product;
</script>

<template>
    <div
        class="group relative rounded-lg p-4 ring-1 ring-slate-200 sm:p-6 hover:ring-1 hover:ring-sky-300 hover:shadow-lg hover:shadow-sky-300/50 transition"
    >
        <div
            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg group-hover:opacity-75"
        >
            <img
                :alt="title"
                class="h-full w-full object-cover object-center"
                :srcset="image.srcset"
                onload="window.requestAnimationFrame(function(){if(!(size=getBoundingClientRect().width))return;onload=null;sizes=Math.ceil(size/window.innerWidth*100)+'vw';});"
                sizes="1px"
                :src="image.src"
            />
        </div>
        <div class="pb-4 pt-10 text-center">
            <h3 class="text-sm font-medium text-slate-900 line-clamp-2">
                <router-link :to="url">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ title }}
                </router-link>
            </h3>
            <div class="mt-3 flex flex-col items-center">
                <p class="sr-only">1 out of 5 stars</p>
                <div class="flex items-center">
                    <StarIcon
                        v-for="star in 5"
                        :class="{
                            'text-sky-500': star <= stars,
                            'text-slate-300': star > stars,
                        }"
                    />
                </div>
                <p class="mt-1 text-sm text-slate-500">{{ reviews }} reviews</p>
            </div>
            <p class="mt-4 text-base font-medium text-slate-900">
                ${{ price }}
            </p>
        </div>
    </div>
</template>

<style scoped></style>
