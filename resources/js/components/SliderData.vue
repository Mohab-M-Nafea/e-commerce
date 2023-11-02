<script setup>
const props = defineProps([
    "srcset",
    "src",
    "title",
    "description",
    "collectionLink",
    "collectionText",
]);
</script>

<template>
    <li class="snap-center shrink-0 w-full">
        <div class="relative bg-slate-900">
            <div aria-hidden="true" class="absolute inset-0">
                <img
                    class="h-full w-full object-cover object-center"
                    :srcset="srcset"
                    onload="
                                window.requestAnimationFrame(function () {
                                    if (!(size = getBoundingClientRect().width))
                                        return;
                                    onload = null;
                                    sizes =
                                        Math.ceil(
                                            (size / window.innerWidth) * 100,
                                        ) + 'vw';
                                })
                            "
                    sizes="1px"
                    :src="src"
                    width="1920"
                    height="1080"
                />
            </div>
            <div
                class="relative px-6 py-32 bg-slate-900 bg-opacity-50 sm:px-12 sm:py-40 lg:px-16"
            >
                <div
                    class="relative mx-auto flex max-w-3xl flex-col items-center text-center"
                >
                    <h2
                        class="text-3xl font-bold tracking-tight text-white sm:text-4xl"
                    >
                        {{ title }}
                    </h2>
                    <p class="mt-3 text-xl text-white line-clamp-2">
                        {{ description }}
                    </p>
                    <router-link
                        :to="collectionLink"
                        class="mt-8 block w-full rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-slate-900 hover:bg-slate-100 sm:w-auto"
                    >
                        {{ collectionText }}
                    </router-link>
                </div>
            </div>
        </div>
    </li>
</template>

<style scoped></style>
