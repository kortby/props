<template>
    <div class="bg-white max-w-6xl mx-auto p-8">
        <div class="pt-6 pb-16 sm:pb-24">
            <div
                class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                <div class="grid-cols-12">
                    <h1
                        class="text-3xl font-bold pb-1"
                        v-html="unit.property_name"
                    ></h1>
                    <h2
                        class="text-ml pb-4 text-gray-400"
                        v-html="unit.property_address"
                    ></h2>
                </div>
                <div
                    class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8"
                >
                    <div class="lg:col-start-8 lg:col-span-5">
                        <div class="flex justify-between">
                            <h1 class="text-xl font-medium text-gray-900">
                                {{ unit.name }}
                            </h1>
                            <p class="text-xl font-medium text-gray-900">
                                {{ unit.price }}
                            </p>
                        </div>
                        <!-- Reviews -->
                        <div class="mt-4">
                            <h2 class="sr-only">Reviews</h2>
                            <div class="flex items-center">
                                <p class="text-sm text-gray-700">
                                    {{ unit.rating }}
                                    <span class="sr-only"> out of 5 stars</span>
                                </p>
                                <div class="ml-1 flex items-center">
                                    <StarIcon
                                        v-for="rating in [0, 1, 2, 3, 4]"
                                        :key="rating"
                                        :class="[
                                            unit.rating > rating
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
                                    {{ unit.reviewCount }} reviews
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
                                v-for="image in unit.pictures"
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
                            type="submit"
                            class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            :href="`tel:+1${unit.property_phone}`"
                            v-html="unit.property_phone"
                        ></a>

                        <!-- unit details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">
                                Description
                            </h2>

                            <div
                                class="mt-4 prose prose-sm text-gray-500"
                                v-html="unit.description"
                            />
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <h2 class="text-sm font-medium text-gray-900">
                                Fabric &amp; Care
                            </h2>

                            <div class="mt-4 prose prose-sm text-gray-500">
                                <ul role="list">
                                    <li
                                        v-for="item in unit.details"
                                        :key="item"
                                    >
                                        {{ item }}
                                    </li>
                                </ul>
                            </div>
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
    unit_heading: String,
    number_of_bedroom: Number,
    number_of_bathroom: Number,
    number_of_balcony: Number,
    date_available_from: String,
    description: String,
    unit_number: Number,
    size: Number,
    price: Number,
    property_name: String,
    property_address_1: String,
    property_address_2: String,
    property_city: String,
    property_state: String,
    property_postal_code: Number,
    property_phone: Number,
    pictures: Array,
});

const unit = {
    name: props.unit_heading,
    price: "$" + new Intl.NumberFormat().format(props.price),
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
    details: [
        "Unit Number: " + props.unit_number,
        "Size: " + props.size + " sqft",
        props.number_of_bedroom +
            " Bedrooms " +
            props.number_of_bathroom +
            " Bathrooms ",
        "Available from: " +
            new Date(props.date_available_from).toString().slice(0, 15),
        "Has " + props.number_of_balcony + " Balcony.",
    ],
    property_name: props.property_name,
    property_address:
        props.property_address_1 +
        " " +
        props.property_address_2 +
        " , " +
        props.property_city +
        " , " +
        props.property_state +
        " " +
        props.property_postal_code,
    property_phone: props.property_phone,
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
