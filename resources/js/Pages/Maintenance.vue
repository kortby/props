<template>
    <AppLayout title="Maintenance">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Maintenance
            </h2>
        </template>
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
                        Request a Maintenance
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-gray-500">
                        Nullam risus blandit ac aliquam justo ipsum. Quam mauris
                        volutpat massa dictumst amet. Sapien tortor lacus arcu.
                    </p>
                </div>
                <div class="mt-12">
                    <form
                        action="/maintenance/store"
                        method="POST"
                        class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                    >
                        <div class="sm:col-span-2">
                            <label
                                for="title"
                                class="block text-sm font-medium text-gray-700"
                                >Title</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="unit-id"
                                class="block text-sm font-medium text-gray-700"
                                >Unit Number</label
                            >
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="unit_id"
                                    id="unit-id"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="category-id"
                                class="block text-sm font-medium text-gray-700"
                                >Maintenance category</label
                            >
                            <div class="mt-1">
                                <input
                                    id="category-id"
                                    name="category_id"
                                    type="text"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="preferred_maintenece_time"
                                class="block text-sm font-medium text-gray-700"
                                >Preferred maintenece date</label
                            >
                            <div class="mt-1">
                                <input
                                    id="preferred_maintenece_time"
                                    name="preferred_maintenece_time"
                                    type="date"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="phone-number"
                                class="block text-sm font-medium text-gray-700"
                                >Phone Number</label
                            >
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center"
                                >
                                    <label for="country" class="sr-only"
                                        >Country</label
                                    >
                                    <select
                                        id="country"
                                        name="country"
                                        class="h-full py-0 pl-4 pr-8 border-transparent bg-transparent text-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                    >
                                        <option>US</option>
                                        <option>CA</option>
                                        <option>EU</option>
                                    </select>
                                </div>
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone-number"
                                    autocomplete="tel"
                                    class="py-3 px-4 block w-full pl-20 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    placeholder="+1 (555) 987-6543"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-700"
                                >More Details</label
                            >
                            <div class="mt-1">
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <Switch
                                        v-model="agreed"
                                        :class="[
                                            agreed
                                                ? 'bg-indigo-600'
                                                : 'bg-gray-200',
                                            'relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                                        ]"
                                    >
                                        <span class="sr-only"
                                            >Agree to policies</span
                                        >
                                        <span
                                            aria-hidden="true"
                                            :class="[
                                                agreed
                                                    ? 'translate-x-5'
                                                    : 'translate-x-0',
                                                'inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200',
                                            ]"
                                        />
                                    </Switch>
                                </div>
                                <div class="ml-3">
                                    <p class="text-base text-gray-500">
                                        Permission to enter the unit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="access-code"
                                class="block text-sm font-medium text-gray-700"
                                >Access Code (if any)</label
                            >
                            <div class="mt-1">
                                <input
                                    id="access-code"
                                    name="access_code"
                                    type="text"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <button
                                type="submit"
                                class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Request maintenance
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import { Switch } from "@headlessui/vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    components: {
        Switch,
        AppLayout,
    },
    setup() {
        const agreed = ref(false);

        return {
            agreed,
        };
    },
};
</script>
