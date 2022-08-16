<template>
    <PropLayout :propertyname="property.name">
        <div
            class="bg-white py-12 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24 mt-6"
        >
            <div class="relative max-w-xl mx-auto">
                <svg
                    class="absolute left-full transform translate-x-1/2"
                    width="404"
                    height="404"
                    fill="none"
                    viewBox="0 0 404 404"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern
                            id="85737c0e-0916-41d7-917f-596dc7edfa27"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse"
                        >
                            <rect
                                x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor"
                            />
                        </pattern>
                    </defs>
                    <rect
                        width="404"
                        height="404"
                        fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"
                    />
                </svg>
                <svg
                    class="absolute right-full bottom-0 transform -translate-x-1/2"
                    width="404"
                    height="404"
                    fill="none"
                    viewBox="0 0 404 404"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern
                            id="85737c0e-0916-41d7-917f-596dc7edfa27"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse"
                        >
                            <rect
                                x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor"
                            />
                        </pattern>
                    </defs>
                    <rect
                        width="404"
                        height="404"
                        fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"
                    />
                </svg>
                <div class="text-center">
                    <h2
                        class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        Schedule a viewing
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-gray-500">
                        Nullam risus blandit ac aliquam justo ipsum. Quam mauris
                        volutpat massa dictumst amet. Sapien tortor lacus arcu.
                    </p>
                </div>
                <div class="mt-12">
                    <form
                        @submit.prevent="submit"
                        class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                    >
                        <div class="sm:col-span-2">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700"
                                >Name</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    v-model="form.name"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{ 'border-red-500': errors.name }"
                                />
                                <span
                                    v-if="errors.name"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.name"
                                >
                                </span>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="phone-number"
                                class="block text-sm font-medium text-gray-700"
                                >Phone Number</label
                            >
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input
                                    type="text"
                                    v-model="form.phone"
                                    name="phone"
                                    id="phone-number"
                                    class="py-3 px-4 block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    placeholder="+1 (555) 987-6543"
                                    :class="{ 'border-red-500': errors.phone }"
                                />
                                <span
                                    v-if="errors.phone"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.phone"
                                >
                                </span>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700"
                                >Email address</label
                            >
                            <div class="mt-1">
                                <input
                                    type="email"
                                    v-model="form.email"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{ 'border-red-500': errors.email }"
                                />
                                <span
                                    v-if="errors.email"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.email"
                                >
                                </span>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="start"
                                class="block text-sm font-medium text-gray-700"
                                >Showing time</label
                            >
                            <div class="mt-1">
                                <input
                                    type="date"
                                    v-model="form.start"
                                    id="start"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <button
                                type="submit"
                                class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Schedule Showing
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </PropLayout>
</template>

<script>
import { ref } from "vue";
import { Switch } from "@headlessui/vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import PropLayout from "@/Pages/Shared/Partials/PropLayout.vue";

export default {
    props: {
        categories: Array,
        errors: Object,
        property: Object,
        units: Array,
        user: Number,
    },
    components: {
        AppLayout,
        Datepicker,
        PropLayout,
        Switch,
    },
    data() {
        const form = reactive({
            property_id: this.property.id,
            name: null,
            email: null,
            phone: null,
            start: null,
        });

        const submit = () => {
            Inertia.post("/schedule-viewing", form);
        };
        return {
            form,
            submit,
        };
    },
};
</script>
