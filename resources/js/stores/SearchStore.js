import { defineStore } from "pinia";

export let useSearchStore = defineStore("search", {
    state: () => ({
        openSearch: false,
    }),
});
