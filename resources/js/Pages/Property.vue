<template>
    <div class="bg-white max-w-6xl mx-auto p-8">
        <div class="pt-6 pb-16 sm:pb-24">
            <div
                class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                <div class="grid-cols-12">
                    <h1
                        class="text-3xl font-bold pb-1"
                        v-html="property.name"
                    ></h1>
                    <h2
                        class="text-ml pb-4 text-gray-400"
                        v-html="property.address"
                    ></h2>
                </div>
                <div
                    class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8"
                >
                    <div class="lg:col-start-8 lg:col-span-5">
                        <!-- Reviews -->
                        <div class="mt-4">
                            <h2 class="sr-only">Reviews</h2>
                            <div class="flex items-center">
                                <p class="text-sm text-gray-700">
                                    {{ property.rating }}
                                    <span class="sr-only"> out of 5 stars</span>
                                </p>
                                <div class="ml-1 flex items-center">
                                    <StarIcon
                                        v-for="rating in [0, 1, 2, 3, 4]"
                                        :key="rating"
                                        :class="[
                                            property.rating > rating
                                                ? 'text-yellow-400'
                                                : 'text-gray-200',
                                            'h-5 w-5 flex-shrink-0',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </div>
                                <div
                                    aria-hidden="true"
                                    class="ml-4 text-sm text-gray-300"
                                >
                                    ·
                                </div>
                                <div class="ml-4 flex">
                                    {{ property.reviewCount }} reviews
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image gallery -->
                    <div
                        class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3"
                    >
                        <h2 class="sr-only">Images</h2>

                        <div
                            class="grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-3 lg:gap-8"
                        >
                            <img
                                v-for="image in property.pictures"
                                :key="image.id"
                                :src="image.imageSrc"
                                :alt="image.imageAlt"
                                :class="[
                                    image.primary
                                        ? 'lg:col-span-2 lg:row-span-2'
                                        : 'hidden lg:block',
                                    'rounded-lg',
                                ]"
                            />
                        </div>
                    </div>

                    <div class="mt-8 lg:col-span-5">
                        <a
                            type="button"
                            class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            :href="`/schedule-viewing/${props.id}`"
                            v-html="'Schedule a viewing'"
                        ></a>

                        <!-- unit details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">
                                Description
                            </h2>

                            <div
                                class="mt-4 prose prose-sm text-gray-500"
                                v-html="property.description"
                            />
                        </div>

                        <!-- Policies -->
                        <section
                            aria-labelledby="policies-heading"
                            class="mt-10"
                        >
                            <h2 id="policies-heading" class="sr-only">
                                Our Policies
                            </h2>

                            <dl
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2"
                            >
                                <div
                                    v-for="policy in policies"
                                    :key="policy.name"
                                    class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center"
                                >
                                    <dt>
                                        <component
                                            :is="policy.icon"
                                            class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400"
                                            aria-hidden="true"
                                        />
                                        <span
                                            class="mt-4 text-sm font-medium text-gray-900"
                                        >
                                            {{ policy.name }}
                                        </span>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-500">
                                        {{ policy.description }}
                                    </dd>
                                </div>
                            </dl>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref } from "vue";
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import { CurrencyDollarIcon, GlobeIcon } from "@heroicons/vue/outline";

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
const policies = [
    {
        name: "International delivery",
        icon: GlobeIcon,
        description: "Get your order in 2 years",
    },
    {
        name: "Loyalty rewards",
        icon: CurrencyDollarIcon,
        description: "Don't look at other tees",
    },
];
</script>
