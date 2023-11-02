import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import CollectionsView from "@/views/CollectionsView.vue";
import CollectionView from "@/views/CollectionView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeView,
        },
        {
            path: "/collections",
            name: "collections",
            component: CollectionsView,
        },
        {
            path: "/collections/:collection",
            name: "collections.collection",
            component: CollectionView,
        },
    ],
});

export default router;
