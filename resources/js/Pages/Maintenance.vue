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
                        @submit.prevent="submit"
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
                                    v-model="form.title"
                                    name="title"
                                    id="title"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{ 'border-red-500': errors.title }"
                                />
                                <span
                                    v-if="errors.title"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.title"
                                >
                                </span>
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
                                    type="number"
                                    v-model="unit_id"
                                    :disabled="disabled_input"
                                    id="unit-id"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{
                                        'disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none focus:invalid:ring-pink-500':
                                            disabled_input,
                                    }"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="category-id"
                                class="block text-sm font-medium text-gray-700"
                                >Maintenance Category</label
                            >
                            <select
                                id="category-id"
                                v-model="category_id"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                            >
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
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
                                    v-model="form.preferred_maintenece_time"
                                    name="preferred_maintenece_time"
                                    type="date"
                                    autocomplete="organization"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{
                                        'border-red-500':
                                            errors.preferred_maintenece_time,
                                    }"
                                />
                            </div>
                            <span
                                v-if="errors.preferred_maintenece_time"
                                class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                v-text="errors.preferred_maintenece_time"
                            >
                            </span>
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
                                for="description"
                                class="block text-sm font-medium text-gray-700"
                                >More Details</label
                            >
                            <div class="mt-1">
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    name="description"
                                    rows="4"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"
                                    :class="{
                                        'border-red-500': errors.description,
                                    }"
                                />
                                <span
                                    v-if="errors.description"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.description"
                                >
                                </span>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <Switch
                                        v-model="form.permission_to_enter"
                                        name="permission_to_enter"
                                        :class="[
                                            form.permission_to_enter
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
                                                form.permission_to_enter
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
                                    v-model="form.access_code"
                                    name="access_code"
                                    type="text"
                                    class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                    :class="{
                                        'border-red-500': errors.access_code,
                                    }"
                                />
                                <span
                                    v-if="errors.access_code"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.access_code"
                                >
                                </span>
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
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        units: Array,
        categories: Array,
        user: Number,
        errors: Object,
    },
    components: {
        Switch,
        AppLayout,
    },
    data() {
        const form = reactive({
            title: null,
            unit_id: this.units[0].id,
            category_id: this.categories[0].id,
            preferred_maintenece_time: null,
            phone: this.user.phone,
            description: null,
            access_code: null,
            permission_to_enter: true,
        });

        const submit = () => {
            Inertia.post("/maintenance", form);
        };
        return {
            form,
            submit,
            unit_id: ref(this.$page.props.units[0].unit_number),
            disabled_input: true,
            phone: ref(this.$page.props.user.phone),
            category_id: ref(this.$page.props.categories[2].id),
        };
    },
};
</script>
