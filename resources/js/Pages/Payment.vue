<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <AppLayout title="Payment">
        <div class="bg-gray-100">
            <div class="pt-12 sm:pt-16 lg:pt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2
                            class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl"
                        >
                            Make a payment
                        </h2>
                        <p class="mt-4 text-xl text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Reiciendis, ipsum repudiandae. Optio minus
                            nemo nobis nihil hic quibusdam! Voluptatem similique
                            veniam fugit odit quaerat dicta eos aliquid ut
                            voluptates molestias?
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28">
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-100" />
                    <div
                        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
                    >
                        <div
                            class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex"
                        >
                            <div class="flex-1 bg-white px-6 py-8 lg:p-12">
                                <h3
                                    class="text-2xl font-extrabold text-gray-900 sm:text-3xl"
                                >
                                    Current Due (Includes past due)
                                </h3>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <h4
                                            class="flex-shrink-0 pr-4 bg-white text-sm tracking-wider font-semibold uppercase text-indigo-600"
                                        >
                                            What's included
                                        </h4>
                                        <div
                                            class="flex-1 border-t-2 border-gray-200"
                                        />
                                    </div>
                                    <ul
                                        role="list"
                                        class="mt-8 space-y-5 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-5"
                                    >
                                        <li
                                            v-for="feature in unitsType"
                                            :key="feature"
                                            class="flex items-start lg:col-span-1"
                                        >
                                            <div class="flex-shrink-0">
                                                <CheckCircleIcon
                                                    class="h-5 w-5 text-green-400"
                                                    aria-hidden="true"
                                                />
                                            </div>
                                            <p
                                                class="ml-3 text-sm text-gray-700"
                                            >
                                                {{ feature }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="py-8 px-6 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12"
                            >
                                <p
                                    class="text-lg leading-6 font-medium text-gray-900"
                                >
                                    Make a One-Time Payment
                                </p>
                                <div
                                    class="mt-4 flex items-center justify-center text-5xl font-extrabold text-gray-900"
                                >
                                    <span>
                                        ${{
                                            $props.units.length > 1
                                                ? getTotal($props.units)
                                                : formatPrice(
                                                      $props.units[0].price
                                                  )
                                        }}
                                    </span>
                                    <span
                                        class="ml-3 text-xl font-medium text-gray-500"
                                    >
                                        USD
                                    </span>
                                </div>
                                <div class="mt-6">
                                    <div class="rounded-md shadow">
                                        <a
                                            href="/unit-payment"
                                            class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900"
                                        >
                                            Make a Payment
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="mt-6"
                                    v-if="$props.units.length > 1"
                                >
                                    For all units that you have
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
import { CheckCircleIcon } from "@heroicons/vue/solid";
import AppLayout from "@/Layouts/AppLayout.vue";

const unitsType = [
    "Parking spot",
    "Pest control",
    "Trash - door to door",
    "Additional charges may vary month to month(if applicable)",
];

export default {
    props: {
        units: Array,
    },
    components: {
        CheckCircleIcon,
        AppLayout,
    },
    methods: {
        getTotal(units) {
            let total = units.reduce(function (prev, curr) {
                return prev.price + curr.price;
            });
            return this.formatPrice(total);
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
    },
    setup() {
        return {
            unitsType,
        };
    },
};
</script>
