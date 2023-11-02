<script setup></script>

<template>
    <transition
        enter-from-class="opacity-0 translate-y-5"
        enter-active-class="transition ease-out duration-300"
        enter-to-class="translate-y-0"
        leave-from-class="translate-y-0"
        leave-active-class="transition ease-in duration-150"
        leave-to-class="opacity-0 translate-y-5"
        class="absolute inset-x-0 top-full text-sm text-slate-500 z-10"
    >
        <div class="dropdown-menu">
            <div
                class="absolute inset-0 top-1/2 bg-white shadow"
                aria-hidden="true"
                key="hide"
            ></div>
            <div class="relative bg-white">
                <div class="mx-auto max-w-7xl px-8">
                    <div
                        class="grid grid-cols-5 gap-y-10 gap-x-8 py-16 text-sm"
                    >
                        <div>
                            <p
                                id="Audio-heading"
                                class="font-medium text-slate-900"
                            >
                                Audio
                            </p>
                            <ul
                                role="list"
                                aria-labelledby="Audio-heading"
                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                            >
                                <li class="flex">
                                    <router-link
                                        to="collections/headphones.html"
                                        class="hover:text-slate-800"
                                    >
                                        Headphones
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/earbuds.html"
                                        class="hover:text-slate-800"
                                    >
                                        Earbuds
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/speakers.html"
                                        class="hover:text-slate-800"
                                    >
                                        Portable speakers
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/turntables.html"
                                        class="hover:text-slate-800"
                                    >
                                        Turntables
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p
                                id="Hifi-heading"
                                class="font-medium text-slate-900"
                            >
                                Hifi
                            </p>
                            <ul
                                role="list"
                                aria-labelledby="Hifi-heading"
                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                            >
                                <li class="flex">
                                    <router-link
                                        to="collections/speakers.html"
                                        class="hover:text-slate-800"
                                    >
                                        Speakers
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/subwoofers.html"
                                        class="hover:text-slate-800"
                                    >
                                        Subwoofers
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/soundbars.html"
                                        class="hover:text-slate-800"
                                    >
                                        Soundbars
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/amplifiers.html"
                                        class="hover:text-slate-800"
                                    >
                                        Amplifiers
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p
                                id="TV &amp; Home Cinema-heading"
                                class="font-medium text-slate-900"
                            >
                                TV &amp; Home Cinema
                            </p>
                            <ul
                                role="list"
                                aria-labelledby="TV &amp; Home Cinema-heading"
                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                            >
                                <li class="flex">
                                    <router-link
                                        to="collections/led-tvs.html"
                                        class="hover:text-slate-800"
                                    >
                                        LED TVs
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/oled-tvs.html"
                                        class="hover:text-slate-800"
                                    >
                                        OLED TVs
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/projectors.html"
                                        class="hover:text-slate-800"
                                    >
                                        Projectors
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/blu-ray-dvd-players.html"
                                        class="hover:text-slate-800"
                                    >
                                        Blu-Ray &amp; DVD players
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p
                                id="Smartphones-heading"
                                class="font-medium text-slate-900"
                            >
                                Smartphones
                            </p>
                            <ul
                                role="list"
                                aria-labelledby="Smartphones-heading"
                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                            >
                                <li class="flex">
                                    <router-link
                                        to="collections/smartphones.html"
                                        class="hover:text-slate-800"
                                    >
                                        Apple
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/smartphones.html"
                                        class="hover:text-slate-800"
                                    >
                                        LG
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/smartphones.html"
                                        class="hover:text-slate-800"
                                    >
                                        Samsung
                                    </router-link>
                                </li>
                                <li class="flex">
                                    <router-link
                                        to="collections/smartphones.html"
                                        class="hover:text-slate-800"
                                    >
                                        Xiaomi
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p
                                id="Our selection-heading"
                                class="font-medium text-slate-900"
                            >
                                Our selection
                            </p>
                            <ul
                                role="list"
                                aria-labelledby="Our selection-heading"
                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                            ></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped></style>
