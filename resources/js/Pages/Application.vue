<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <AppLayout title="Application">
        <div class="bg-gray-100">
            <div class="pt-12 sm:pt-16 lg:pt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2
                            class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl"
                        >
                            Application
                        </h2>
                        <p class="mt-4 text-xl text-gray-600">
                            Tenant Applications.
                        </p>
                    </div>
                </div>
            </div>

            <!-- form step one -->
            <div
                v-if="formStep == 1"
                class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28"
            >
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-100" />
                    <div
                        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
                    >
                        <div
                            class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex"
                        >
                            <div class="flex-1 bg-white px-6 py-8 lg:p-12">
                                <div class="pt-8">
                                    <div>
                                        <h3
                                            class="text-lg leading-6 font-medium text-gray-900"
                                        >
                                            Personal Information
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Use a permanent address where you
                                            can receive mail.
                                        </p>
                                    </div>
                                    <div
                                        class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                                    >
                                        <div class="sm:col-span-2">
                                            <label
                                                for="first-name"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                First name
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="first-name"
                                                    id="first-name"
                                                    autocomplete="given-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="middle-name"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Middle name (if any)
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="middle-name"
                                                    id="middle-name"
                                                    autocomplete="family-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="last-name"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Last name
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="last-name"
                                                    id="last-name"
                                                    autocomplete="family-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="date_of_birth"
                                                class="block text-sm font-medium text-gray-700"
                                                >Date of birth</label
                                            >
                                            <div class="mt-1">
                                                <input
                                                    id="date_of_birth"
                                                    name="date_of_birth"
                                                    type="date"
                                                    autocomplete="organization"
                                                    class="py-2 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="phone"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Phone address
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="phone"
                                                    name="phone"
                                                    type="text"
                                                    autocomplete="Phone"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="email"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Email address
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="email"
                                                    name="email"
                                                    type="email"
                                                    autocomplete="email"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="ssn"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Social Security Number
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="ssn"
                                                    name="ssn"
                                                    type="text"
                                                    autocomplete="ssn"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-8 relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input
                                                id="pets"
                                                name="pets"
                                                type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                            />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label
                                                for="pets"
                                                class="font-medium text-gray-700"
                                                >Do you have pets ?</label
                                            >
                                            <p class="text-gray-500">
                                                We do not except more than 5
                                                pets
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pt-8">
                                        <div class="flex justify-end">
                                            <button
                                                @click="nextStep"
                                                type="button"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form step two -->
            <div
                v-if="formStep == 2"
                class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28"
            >
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-100" />
                    <div
                        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
                    >
                        <div
                            class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex"
                        >
                            <div class="flex-1 bg-white px-6 py-8 lg:p-12">
                                <div class="pt-8">
                                    <div>
                                        <h3
                                            class="text-lg leading-6 font-medium text-gray-900"
                                        >
                                            Current address
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Checking the rent history.
                                        </p>
                                    </div>
                                    <div
                                        class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                                    >
                                        <div class="sm:col-span-4">
                                            <label
                                                for="street-address"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Street address
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="street-address"
                                                    id="street-address"
                                                    autocomplete="street-address"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="apt"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Apt
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="address_line2"
                                                    id="apt"
                                                    autocomplete="apt"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="city"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                City
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="city"
                                                    id="city"
                                                    autocomplete="address-level2"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="region"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                State / Province
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="region"
                                                    id="region"
                                                    autocomplete="address-level1"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="postal-code"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                ZIP / Postal code
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="postal-code"
                                                    id="postal-code"
                                                    autocomplete="postal-code"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label
                                                for="country"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Country
                                            </label>
                                            <div class="mt-1">
                                                <select
                                                    id="country"
                                                    name="country"
                                                    autocomplete="country-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                >
                                                    <option>
                                                        United States
                                                    </option>
                                                    <option>Canada</option>
                                                    <option>Mexico</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                for="move_in_date"
                                                class="block text-sm font-medium text-gray-700"
                                                >Move in date</label
                                            >
                                            <div class="mt-1">
                                                <input
                                                    id="move_in_date"
                                                    name="move_in_date"
                                                    type="date"
                                                    autocomplete="organization"
                                                    class="py-2 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-8">
                                        <div class="flex justify-end">
                                            <button
                                                @click="prevStep"
                                                type="button"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4"
                                            >
                                                Previous
                                            </button>
                                            <button
                                                @click="nextStep"
                                                type="button"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form step three -->
            <div
                v-if="formStep == 3"
                class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28"
            >
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-100" />
                    <div
                        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
                    >
                        <div
                            class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex"
                        >
                            <div class="flex-1 bg-white px-6 py-8 lg:p-12">
                                <div class="pt-8">
                                    <div>
                                        <h3
                                            class="text-lg leading-6 font-medium text-gray-900"
                                        >
                                            Income Information
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Job Information.
                                        </p>
                                    </div>
                                    <div
                                        class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                                    >
                                        <div class="sm:col-span-6">
                                            <label
                                                for="job_type"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Job position
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="job_type"
                                                    id="job_type"
                                                    autocomplete="job_type"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="employer_name"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Employer name
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="employer_name"
                                                    id="employer_name"
                                                    autocomplete="address-level2"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="employer_phone"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Employer phone
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="employer_phone"
                                                    id="employer_phone"
                                                    autocomplete="address-level2"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="employer_email"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Employer email
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="employer_email"
                                                    id="employer_email"
                                                    autocomplete="address-level2"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="employer_address"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Employer address
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="employer_address"
                                                    id="employer_address"
                                                    autocomplete="address-level2"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="annual_income"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Annual income
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="annual_income"
                                                    id="annual_income"
                                                    autocomplete="annual_income"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label
                                                for="additional_income"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Additional income
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="additional_income"
                                                    id="additional_income"
                                                    autocomplete="additional_income"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-8">
                                        <div class="flex justify-end">
                                            <button
                                                @click="prevStep"
                                                type="button"
                                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Previous
                                            </button>
                                            <button
                                                type="submit"
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref } from "vue";
import { CheckCircleIcon } from "@heroicons/vue/solid";
import AppLayout from "@/Layouts/AppLayout.vue";

const includedFeatures = [
    "Private forum access",
    "Member resources",
    "Entry to annual conference",
    "Official member t-shirt",
];

const formStep = ref(1);

export default {
    components: {
        CheckCircleIcon,
        AppLayout,
    },
    setup() {
        return {
            includedFeatures,
            formStep,
        };
    },
    methods: {
        prevStep() {
            formStep.value--;
        },
        nextStep() {
            formStep.value++;
        },
    },
};
</script>
