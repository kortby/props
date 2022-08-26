<template>
    <AppLayout title="Payment">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Payment
            </h2>
        </template>
        <div class="bg-gray-50">
            <div
                class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                <h2 class="sr-only">Checkout</h2>

                <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                    <div>
                        <div>
                            <h2 class="text-2xl font-medium text-gray-900">
                                Rent payment
                            </h2>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <div
                                class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4"
                            >
                                <div class="sm:col-span-2">
                                    <label
                                        for="address"
                                        class="block text-sm font-medium text-gray-700"
                                        >Address</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="address"
                                            id="address"
                                            autocomplete="street-address"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label
                                        for="apartment"
                                        class="block text-sm font-medium text-gray-700"
                                        >Apartment, suite, etc.</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="apartment"
                                            id="apartment"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="city"
                                        class="block text-sm font-medium text-gray-700"
                                        >City</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="city"
                                            id="city"
                                            autocomplete="address-level2"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="country"
                                        class="block text-sm font-medium text-gray-700"
                                        >Country</label
                                    >
                                    <div class="mt-1">
                                        <select
                                            id="country"
                                            name="country"
                                            autocomplete="country-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        >
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="region"
                                        class="block text-sm font-medium text-gray-700"
                                        >State / Province</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="region"
                                            id="region"
                                            autocomplete="address-level1"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="postal-code"
                                        class="block text-sm font-medium text-gray-700"
                                        >Postal code</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="postal-code"
                                            id="postal-code"
                                            autocomplete="postal-code"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment -->
                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">
                                Card information
                            </h2>
                            <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                                <div class="col-span-4">
                                    <label
                                        for="card-number"
                                        class="block text-sm font-medium text-gray-700"
                                        >Card number</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            id="card-number"
                                            name="card-number"
                                            autocomplete="cc-number"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div class="col-span-4">
                                    <label
                                        for="name-on-card"
                                        class="block text-sm font-medium text-gray-700"
                                        >Name on card</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            id="name-on-card"
                                            name="name-on-card"
                                            autocomplete="cc-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div class="col-span-3">
                                    <label
                                        for="expiration-date"
                                        class="block text-sm font-medium text-gray-700"
                                        >Expiration date (MM/YY)</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="expiration-date"
                                            id="expiration-date"
                                            autocomplete="cc-exp"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="cvc"
                                        class="block text-sm font-medium text-gray-700"
                                        >CVC</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="cvc"
                                            id="cvc"
                                            autocomplete="csc"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900">
                            Payment summary
                        </h2>

                        <div
                            class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm"
                        >
                            <h3 class="sr-only">Items in your cart</h3>
                            <ul
                                role="list"
                                class="divide-y divide-gray-200"
                            ></ul>
                            <dl
                                class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6"
                            >
                                <div
                                    v-for="unit in $props.units"
                                    :key="unit.id"
                                    class="flex items-center justify-between"
                                >
                                    <dt class="text-sm">
                                        Unit number {{ unit.unit_number }}
                                    </dt>
                                    <dd
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        ${{ formatPrice(unit.price) }}
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Shipping</dt>
                                    <dd
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        $5.00
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Taxes</dt>
                                    <dd
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        $5.52
                                    </dd>
                                </div>
                                <div
                                    class="flex items-center justify-between border-t border-gray-200 pt-6"
                                >
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd
                                        class="text-base font-medium text-gray-900"
                                    >
                                        ${{ getTotal($props.units) }}
                                    </dd>
                                </div>
                            </dl>

                            <div
                                class="border-t border-gray-200 py-6 px-4 sm:px-6"
                            >
                                <button
                                    type="submit"
                                    class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                                >
                                    Confirm order
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { ref, reactive } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";

const products = [
    {
        id: 1,
        title: "Basic Tee",
        href: "#",
        price: "$32.00",
        color: "Black",
        size: "Large",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg",
        imageAlt: "Front of men's Basic Tee in black.",
    },
    // More products...
];

export default {
    props: {
        units: Array,
        unit_types: Array,
        errors: Object,
    },
    components: {
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
    data() {
        const form = reactive({});
        const submit = () => {
            // Inertia.post("/maintenance", form);
        };
        return {
            form,
            submit,
        };
    },
};
</script>
