<script setup>
import NavbarDropdown from "@/components/NavbarDropdown.vue";
import { nextTick, ref } from "vue";
import NavbarSearch from "@/components/NavbarSearch.vue";

const mobileMenuOpen = ref(false);
const clickAway = ref(false);
const closeButton = ref(null);
const open = ref([false, false, false, false, false]);

function activeSidebarMenu() {
    mobileMenuOpen.value = true;

    nextTick(() => {
        closeButton.value.focus();
    });
}

function closeSidebarMenu() {
    if (clickAway.value) {
        mobileMenuOpen.value = clickAway.value = false;
    }

    if (mobileMenuOpen.value) {
        clickAway.value = true;
    }
}
</script>

<template>
    <div class="border-b border-slate-200">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex flex-1 lg:hidden">
                    <button
                        @click="activeSidebarMenu"
                        type="button"
                        class="bg-white -ml-2 p-2 text-slate-400"
                    >
                        <span class="sr-only">Open menu</span>
                        <svg
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div @keydown.esc="closeSidebarMenu">
                        <div
                            v-show="mobileMenuOpen"
                            class="relative z-40 lg:hidden"
                            role="dialog"
                            aria-modal="true"
                        >
                            <transition
                                v-show="mobileMenuOpen"
                                enter-from-class="opacity-0"
                                enter-active-class="transition-opacity ease-linear duration-300"
                                leave-active-class="transition-opacity ease-linear duration-300"
                                leave-to-class="opacity-0"
                                class="fixed inset-0 bg-black bg-opacity-25"
                            >
                                <div></div>
                            </transition>

                            <div class="fixed inset-0 z-40 flex">
                                <transition
                                    v-show="mobileMenuOpen"
                                    enter-from-class="-translate-x-full"
                                    enter-active-class="transition ease-in-out duration-300 transform"
                                    enter-to-class="translate-x-0"
                                    leave-from-class="translate-x-0"
                                    leave-active-class="transition ease-in-out duration-300 transform"
                                    leave-to-class="-translate-x-full"
                                    v-click-away="closeSidebarMenu"
                                    class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl"
                                >
                                    <div>
                                        <div class="flex px-4 pt-5 pb-2">
                                            <button
                                                @click="closeSidebarMenu"
                                                type="button"
                                                class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-slate-400"
                                                ref="closeButton"
                                            >
                                                <span class="sr-only"
                                                    >Close menu</span
                                                >
                                                <svg
                                                    class="h-6 w-6"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"
                                                    />
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="space-y-6 px-4 pt-10 pb-6">
                                            <div
                                                class="grid grid-cols-1 items-start gap-y-6 gap-x-6"
                                            >
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900"
                                                    >
                                                        Shop
                                                    </p>
                                                    <ul
                                                        role="list"
                                                        aria-labelledby="mobile-collection-heading"
                                                        class="ml-3 mt-6 space-y-6"
                                                    >
                                                        <li>
                                                            <span
                                                                @click="
                                                                    open[0] =
                                                                        !open[0]
                                                                "
                                                                class="text-sm font-medium text-slate-900"
                                                            >
                                                                Audio
                                                            </span>
                                                            <ul
                                                                v-show="open[0]"
                                                                role="list"
                                                                aria-labelledby="Audio-heading"
                                                                class="ml-3 mt-6 space-y-6 text-sm sm:mt-4 sm:space-y-4"
                                                            >
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/headphones.html"
                                                                        class="hover:text-slate-800"
                                                                        >Headphones</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/earbuds.html"
                                                                        class="hover:text-slate-800"
                                                                        >Earbuds</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/speakers.html"
                                                                        class="hover:text-slate-800"
                                                                        >Portable
                                                                        speakers</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/turntables.html"
                                                                        class="hover:text-slate-800"
                                                                        >Turntables</router-link
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span
                                                                @click="
                                                                    open[1] =
                                                                        !open[1]
                                                                "
                                                                class="text-sm font-medium text-slate-900"
                                                            >
                                                                Hifi
                                                            </span>
                                                            <ul
                                                                v-show="open[1]"
                                                                role="list"
                                                                aria-labelledby="Hifi-heading"
                                                                class="ml-3 mt-6 space-y-6 text-sm sm:mt-4 sm:space-y-4"
                                                            >
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/speakers.html"
                                                                        class="hover:text-slate-800"
                                                                        >Speakers</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/subwoofers.html"
                                                                        class="hover:text-slate-800"
                                                                        >Subwoofers</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/soundbars.html"
                                                                        class="hover:text-slate-800"
                                                                        >Soundbars</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/amplifiers.html"
                                                                        class="hover:text-slate-800"
                                                                        >Amplifiers</router-link
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span
                                                                @click="
                                                                    open[2] =
                                                                        !open[2]
                                                                "
                                                                class="text-sm font-medium text-slate-900"
                                                            >
                                                                TV &amp; Home
                                                                Cinema
                                                            </span>
                                                            <ul
                                                                v-show="open[2]"
                                                                role="list"
                                                                aria-labelledby="TV &amp; Home Cinema-heading"
                                                                class="ml-3 mt-6 space-y-6 text-sm sm:mt-4 sm:space-y-4"
                                                            >
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/led-tvs.html"
                                                                        class="hover:text-slate-800"
                                                                        >LED
                                                                        TVs</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/oled-tvs.html"
                                                                        class="hover:text-slate-800"
                                                                        >OLED
                                                                        TVs</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/projectors.html"
                                                                        class="hover:text-slate-800"
                                                                        >Projectors</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/blu-ray-dvd-players.html"
                                                                        class="hover:text-slate-800"
                                                                        >Blu-Ray
                                                                        &amp;
                                                                        DVD
                                                                        players</router-link
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span
                                                                @click="
                                                                    open[3] =
                                                                        !open[3]
                                                                "
                                                                class="text-sm font-medium text-slate-900"
                                                            >
                                                                Smartphones
                                                            </span>
                                                            <ul
                                                                v-show="open[3]"
                                                                role="list"
                                                                aria-labelledby="Smartphones-heading"
                                                                class="ml-3 mt-6 space-y-6 text-sm sm:mt-4 sm:space-y-4"
                                                            >
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/smartphones.html"
                                                                        class="hover:text-slate-800"
                                                                        >Apple</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/smartphones.html"
                                                                        class="hover:text-slate-800"
                                                                        >LG</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/smartphones.html"
                                                                        class="hover:text-slate-800"
                                                                        >Samsung</router-link
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="flex"
                                                                >
                                                                    <router-link
                                                                        to="collections/smartphones.html"
                                                                        class="hover:text-slate-800"
                                                                        >Xiaomi</router-link
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span
                                                                @click="
                                                                    open[4] =
                                                                        !open[4]
                                                                "
                                                                class="text-sm font-medium text-slate-900"
                                                            >
                                                                Our selection
                                                            </span>
                                                            <ul
                                                                v-show="open[4]"
                                                                role="list"
                                                                aria-labelledby="Our selection-heading"
                                                                class="ml-3 mt-6 space-y-6 text-sm sm:mt-4 sm:space-y-4"
                                                            ></ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="space-y-6 border-t border-slate-200 py-6 px-4"
                                        >
                                            <div class="flow-root">
                                                <router-link
                                                    to="login.html"
                                                    class="-m-2 block p-2 font-medium text-slate-900"
                                                >
                                                    Sign in
                                                </router-link>
                                            </div>
                                            <div class="flow-root">
                                                <router-link
                                                    to="register.html"
                                                    class="-m-2 block p-2 font-medium text-slate-900"
                                                >
                                                    Create account
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                        </div>
                    </div>
                </div>

                <router-link to="index.html">
                    <span class="sr-only">Cartify</span>
                    <img
                        src="img/logo.png"
                        alt="Cartify"
                        class="h-8 w-auto"
                        width="32"
                    />
                </router-link>

                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="flex h-full justify-center space-x-8">
                        <NavbarDropdown />
                    </div>
                </div>

                <div class="flex flex-1 items-center justify-end lg:ml-auto">
                    <div
                        class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6"
                    >
                        <router-link
                            to="login.html"
                            class="text-sm font-medium text-slate-700 hover:text-slate-800"
                        >
                            Sign in
                        </router-link>
                        <span
                            class="h-6 w-px bg-slate-200"
                            aria-hidden="true"
                        ></span>
                        <router-link
                            to="register.html"
                            class="text-sm font-medium text-slate-700 hover:text-slate-800"
                        >
                            Create account
                        </router-link>
                    </div>

                    <NavbarSearch />
                    <!-- Cart -->
                    <div class="ml-4 flow-root lg:ml-6">
                        <router-link
                            to="cart.html"
                            class="group -m-2 flex items-center p-2"
                        >
                            <svg
                                class="h-6 w-6 flex-shrink-0 text-slate-400 group-hover:text-slate-500"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                />
                            </svg>
                            <span
                                class="ml-2 text-sm font-medium text-slate-700 group-hover:text-slate-800"
                                >0</span
                            >
                            <span class="sr-only"
                                >items in cart, view cart</span
                            >
                        </router-link>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
