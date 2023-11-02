<script setup>
import { nextTick, ref } from "vue";
import { useSearchStore } from "@/stores/SearchStore.js";
import SearchIcon from "@/assets/SearchIcon.vue";

const search = useSearchStore();
const searchWindow = ref(false);
const transition = ref(false);
const searchInput = ref(null);
const searchQuery = ref("");
const clickAway = ref(false);

function activeSearchWindow() {
    search.openSearch = searchWindow.value = true;

    nextTick(() => {
        searchInput.value.focus();
    });
}

function closeSearchWindow() {
    if (clickAway.value) {
        search.openSearch = clickAway.value = false;
    }

    if (search.openSearch) {
        clickAway.value = true;
    }
}
</script>

<template>
    <div class="flex lg:ml-6">
        <button
            @click="activeSearchWindow"
            class="p-2 text-slate-400 hover:text-slate-500"
        >
            <span class="sr-only">Search</span>
            <SearchIcon class="h-6 w-6" />
        </button>
        <div
            v-show="searchWindow && !transition"
            @keydown.esc="closeSearchWindow"
            class="relative z-[60]"
            role="dialog"
            aria-modal="true"
        >
            <transition
                v-show="search.openSearch"
                enter-from-class="opacity-0"
                enter-active-class="ease-out duration-300"
                enter-to-class="opacity-100"
                leave-from-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-to-class="opacity-0"
                @before-enter="transition = false"
                @after-leave="transition = true"
                class="fixed inset-0 bg-slate-900/50 backdrop-blur"
            >
                <div></div>
            </transition>

            <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">
                <transition
                    v-show="search.openSearch"
                    enter-from-class="opacity-0 scale-95"
                    enter-active-class="ease-out duration-300"
                    enter-to-class="scale-100"
                    leave-from-class="scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-to-class="opacity-0 scale-95"
                    class="mx-auto max-w-xl transform divide-y divide-slate-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all dark:bg-slate-800 dark:divide-white/10 dark:ring-1 dark:ring-slate-700"
                    v-click-away="closeSearchWindow"
                    @before-enter="transition = false"
                    @after-leave="transition = true"
                >
                    <div>
                        <div class="relative">
                            <SearchIcon
                                class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-slate-400"
                            />
                            <label for="search" class="sr-only"> Search </label>
                            <input
                                wire:model.debounce.500ms="query"
                                type="search"
                                id="search"
                                ref="searchInput"
                                class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-slate-900 placeholder:text-slate-400 focus:ring-0 sm:text-sm dark:text-white"
                                placeholder="Type to search..."
                                autocomplete="off"
                                v-model="searchQuery"
                            />
                        </div>

                        <div
                            v-show="searchQuery"
                            wire:loading.delay
                            wire:target="query"
                            class="py-3 px-6 w-full"
                        >
                            <div wire:loading.class="w-full">
                                <div class="animate-pulse flex space-x-4">
                                    <div
                                        class="rounded-lg bg-slate-200 h-10 w-10"
                                    ></div>
                                    <div class="flex-1 space-y-4 py-1">
                                        <div
                                            class="h-2 bg-slate-200 rounded"
                                        ></div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div
                                                class="h-2 bg-slate-200 rounded col-span-2"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
