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
            <form @submit.prevent="submit">
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
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                Use a permanent address where
                                                you can receive mail.
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
                                                        v-model="
                                                            form.first_name
                                                        "
                                                        autocomplete="given-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.first_name,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.first_name"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.first_name"
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.middle_name
                                                        "
                                                        autocomplete="family-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.middle_name,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.middle_name"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.middle_name"
                                                >
                                                </span>
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
                                                        v-model="form.last_name"
                                                        autocomplete="family-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.last_name,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.last_name"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.last_name"
                                                >
                                                </span>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label
                                                    for="date_of_birth"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Date of birth</label
                                                >
                                                <div class="mt-1">
                                                    <input
                                                        v-model="
                                                            form.date_of_birth
                                                        "
                                                        type="date"
                                                        autocomplete="organization"
                                                        class="py-2 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.date_of_birth,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.date_of_birth"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.date_of_birth
                                                    "
                                                >
                                                </span>
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
                                                        v-model="form.phone"
                                                        type="number"
                                                        autocomplete="Phone"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.phone,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.phone"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.phone"
                                                >
                                                </span>
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
                                                        v-model="form.email"
                                                        type="email"
                                                        autocomplete="email"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.email,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.email"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.email"
                                                >
                                                </span>
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
                                                        v-model="form.ssn"
                                                        type="text"
                                                        autocomplete="ssn"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.ssn,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.ssn"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.ssn"
                                                >
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="pt-8 relative flex items-start"
                                        >
                                            <div class="flex items-center h-5">
                                                <input
                                                    v-model="form.pets"
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
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
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
                                                        v-model="
                                                            form.address_line_1
                                                        "
                                                        autocomplete="street-address"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.address_line_1,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.address_line_1"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.address_line_1
                                                    "
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.address_line_2
                                                        "
                                                        autocomplete="apt"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.address_line_2,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.address_line_2"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.address_line_2
                                                    "
                                                >
                                                </span>
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
                                                        v-model="form.city"
                                                        autocomplete="address-level2"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.city,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.city"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.city"
                                                >
                                                </span>
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
                                                        v-model="form.state"
                                                        autocomplete="address-level1"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.state,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.state"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.state"
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.postal_code
                                                        "
                                                        autocomplete="postal-code"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.postal_code,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.postal_code"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.postal_code"
                                                >
                                                </span>
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
                                                        v-model="form.country"
                                                        autocomplete="country-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                    >
                                                        <option value="US">
                                                            United States
                                                        </option>
                                                        <option value="CA">
                                                            Canada
                                                        </option>
                                                        <option value="ME">
                                                            Mexico
                                                        </option>
                                                    </select>
                                                </div>
                                                <span
                                                    v-if="errors.country"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.country"
                                                >
                                                </span>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label
                                                    for="move_in_date"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Move in date</label
                                                >
                                                <div class="mt-1">
                                                    <input
                                                        v-model="
                                                            form.move_in_date
                                                        "
                                                        type="date"
                                                        autocomplete="organization"
                                                        class="py-2 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.move_in_date,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.move_in_date"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.move_in_date"
                                                >
                                                </span>
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
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
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
                                                        v-model="form.job_type"
                                                        autocomplete="job_type"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.job_type,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.job_type"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="errors.job_type"
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.employer_name
                                                        "
                                                        autocomplete="address-level2"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.employer_name,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.employer_name"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.employer_name
                                                    "
                                                >
                                                </span>
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
                                                        type="number"
                                                        v-model="
                                                            form.employer_phone
                                                        "
                                                        autocomplete="address-level2"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.employer_phone,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.employer_phone"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.employer_phone
                                                    "
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.employer_email
                                                        "
                                                        autocomplete="address-level2"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.employer_email,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="errors.employer_email"
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.employer_email
                                                    "
                                                >
                                                </span>
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
                                                        v-model="
                                                            form.employer_address
                                                        "
                                                        autocomplete="address-level2"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.employer_address,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="
                                                        errors.employer_address
                                                    "
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.employer_address
                                                    "
                                                >
                                                </span>
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
                                                        type="number"
                                                        v-model="
                                                            form.annual_income
                                                        "
                                                        autocomplete="annual_income"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.employer_income,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="
                                                        errors.employer_income
                                                    "
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.employer_income
                                                    "
                                                >
                                                </span>
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
                                                        type="number"
                                                        v-model="
                                                            form.additional_income
                                                        "
                                                        autocomplete="additional_income"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        :class="{
                                                            'border-red-500':
                                                                errors.additional_income,
                                                        }"
                                                    />
                                                </div>
                                                <span
                                                    v-if="
                                                        errors.additional_income
                                                    "
                                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                                    v-text="
                                                        errors.additional_income
                                                    "
                                                >
                                                </span>
                                            </div>
                                            <div class="updoad sm:col-span-2">
                                                <input
                                                    type="file"
                                                    multiple
                                                    @input="
                                                        form.documents =
                                                            $event.target.files
                                                    "
                                                />
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
            </form>
        </div>
    </AppLayout>
</template>

<script>
import { ref, reactive } from "vue";
import { CheckCircleIcon } from "@heroicons/vue/solid";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";

const formStep = ref(1);

export default {
    props: {
        errors: Object,
    },
    components: {
        CheckCircleIcon,
        AppLayout,
    },
    setup() {
        return {
            formStep,
        };
    },
    data() {
        const form = reactive({
            first_name: null,
            middle_name: null,
            last_name: null,
            date_of_birth: null,
            email: null,
            ssn: null,
            phone: null,
            address_line_1: null,
            address_line_2: null,
            city: null,
            state: null,
            country: null,
            postal_code: null,
            move_in_date: null,
            job_type: null,
            employer_name: null,
            annual_income: null,
            additional_income: null,
            employer_email: null,
            employer_phone: null,
            employer_address: null,
            pets: true,
            documents: [],
        });
        const submit = () => {
            Inertia.post("/application", form);
            console.log("Application submitted");
        };
        return {
            form,
            submit,
        };
    },
    methods: {
        prevStep() {
            formStep.value--;
        },
        nextStep() {
            formStep.value++;
        },
        selectFile() {
            this.form.documents = $event.target.files;
        },
    },
};
</script>
