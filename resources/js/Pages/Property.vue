<template>
    <div class="relative bg-gray-50 overflow-hidden">
        <!-- Background image and overlap -->
        <div
            aria-hidden="true"
            class="hidden absolute inset-0 sm:flex sm:flex-col"
        >
            <div class="flex-1 relative w-full bg-gray-800">
                <div class="absolute inset-0 overflow-hidden">
                    <img
                        :src="property.pictures[0].imageSrc"
                        alt=""
                        class="w-full h-full object-center object-cover"
                    />
                </div>
                <div class="absolute inset-0 bg-gray-900 opacity-70" />
            </div>
            <div class="w-full bg-white" />
        </div>

        <div class="relative pt-6 pb-16 sm:pb-24">
            <Popover>
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <nav
                        class="relative flex items-center justify-between sm:h-10 md:justify-center"
                        aria-label="Global"
                    >
                        <div
                            class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0"
                        >
                            <div
                                class="flex items-center justify-between w-full md:w-auto"
                            >
                                <a href="#">
                                    <span class="sr-only">Workflow</span>
                                    <h3
                                        class="text-2xl font-bold text-white"
                                        v-text="property.name"
                                    ></h3>
                                </a>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <PopoverButton
                                        class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                    >
                                        <span class="sr-only"
                                            >Open main menu</span
                                        >
                                        <MenuIcon
                                            class="h-6 w-6"
                                            aria-hidden="true"
                                        />
                                    </PopoverButton>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-10">
                            <a
                                v-for="item in navigation"
                                :key="item.name"
                                :href="item.href"
                                class="font-medium text-white hover:text-gray-900"
                                >{{ item.name }}</a
                            >
                        </div>
                        <div
                            class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0"
                        >
                            <span class="inline-flex rounded-md shadow">
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50"
                                >
                                    Schedule viewing
                                </a>
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 ml-3"
                                >
                                    Apply now
                                </a>
                            </span>
                        </div>
                    </nav>
                </div>

                <transition
                    enter-active-class="duration-150 ease-out"
                    enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-95"
                >
                    <PopoverPanel
                        focus
                        class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                    >
                        <div
                            class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"
                        >
                            <div
                                class="px-5 pt-4 flex items-center justify-between"
                            >
                                <div>
                                    <h3 v-text="property.name"></h3>
                                </div>
                                <div class="-mr-2">
                                    <PopoverButton
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                    >
                                        <span class="sr-only">Close menu</span>
                                        <XIcon
                                            class="h-6 w-6"
                                            aria-hidden="true"
                                        />
                                    </PopoverButton>
                                </div>
                            </div>
                            <div class="px-2 pt-2 pb-3">
                                <a
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"
                                    >{{ item.name }}</a
                                >
                            </div>
                            <a
                                href="#"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50"
                            >
                                Schedule viewing
                            </a>
                            <a
                                href="#"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 ml-3"
                            >
                                Apply now
                            </a>
                        </div>
                    </PopoverPanel>
                </transition>
            </Popover>

            <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 h-96"></main>
        </div>
    </div>
</template>

<script setup>
import { computed, ref } from "vue";
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import { CurrencyDollarIcon, GlobeIcon } from "@heroicons/vue/outline";

import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { MenuIcon, XIcon } from "@heroicons/vue/outline";

const navigation = [
    { name: "Product", href: "#" },
    { name: "Features", href: "#" },
    { name: "Marketplace", href: "#" },
    { name: "Company", href: "#" },
];

let props = defineProps({
    id: Number,
    name: String,
    description: String,
    address_1: String,
    address_2: String,
    city: String,
    state: String,
    postal_code: Number,
    phone: Number,
    pictures: Array,
});

const property = {
    name: props.name,
    rating: Math.floor(Math.random() * 5),
    reviewCount: Math.floor(Math.random() * 500),
    href: "#",
    pictures: [
        {
            id: 0,
            imageSrc: props.pictures[0],
            imageAlt: "Apartment Architecture",
            primary: true,
        },
        {
            id: 1,
            imageSrc: props.pictures[1],
            imageAlt: "Kitchen.",
            primary: false,
        },
        {
            id: 2,
            imageSrc: props.pictures[2],
            imageAlt: "View from the top.",
            primary: false,
        },
    ],
    description: props.description,
    address:
        props.address_1 +
        " " +
        props.address_2 +
        " , " +
        props.city +
        " , " +
        props.state +
        " " +
        props.postal_code,
    phone: props.phone,
};
</script>