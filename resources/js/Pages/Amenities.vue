<template>
    <AppLayout title="Amenities">
        <div class="bg-gray-50 pt-12 sm:pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <h2
                        class="text-3xl font-extrabold text-gray-900 sm:text-4xl"
                    >
                        Make a reservation.
                    </h2>
                    <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                        Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit. Repellendus repellat laudantium.
                    </p>
                </div>
            </div>
            <div class="mt-10 pb-12 bg-white sm:pb-16">
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-50" />
                    <div
                        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
                    >
                        <div class="max-w-4xl mx-auto">
                            <dl
                                class="flex rounded-lg bg-white shadow-lg sm:grid"
                                :class="'sm:grid-cols-' + amenities.length"
                            >
                                <div
                                    class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r"
                                    v-for="amenity in amenities"
                                    :key="amenity.id"
                                >
                                    <dt
                                        class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500"
                                        v-html="'$' + amenity.price"
                                    >
                                    </dt>
                                    <dd
                                        class="order-2 mt-2 text-sm leading-6 font-medium text-gray-400"
                                        v-html="amenity.description"
                                    ></dd>
                                    <dd
                                        class="order-1 text-3xl font-extrabold text-indigo-600"
                                        v-html="amenity.name"
                                    ></dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="max-w-2xl pt-8 mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:px-6 lg:px-8 lg:py-24 mt-6">
                        <form
                            @submit.prevent="submit"
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                        >
                            <div class="sm:col-span-2">
                                <label
                                    for="amenity_id"
                                    class="block text-sm font-medium text-gray-700"
                                    >Amenity</label
                                >
                                <select
                                    id="amenity_id"
                                    v-model="form.amenity_id"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                >
                                    <option
                                        v-for="category in amenities"
                                        :key="category.id"
                                        :value="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    for="start"
                                    class="block text-sm font-medium text-gray-700"
                                    >Preferred maintenece date</label
                                >
                                <div class="mt-1">
                            <Datepicker v-model="form.start"></Datepicker>
                                </div>
                                
                                <span
                                    v-if="errors.start"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.start"
                                >
                                </span>
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    for="end"
                                    class="block text-sm font-medium text-gray-700"
                                    >Preferred maintenece date</label
                                >
                                <div class="mt-1">
                                    <Datepicker v-model="form.end"></Datepicker>
                                </div>
                                <span
                                    v-if="errors.end"
                                    class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1"
                                    v-text="errors.end"
                                >
                                </span>
                            </div>
                            <div class="sm:col-span-2">
                                <button
                                    type="submit"
                                    class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Schedule now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { reactive } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { Inertia } from "@inertiajs/inertia";
// https://vue3datepicker.com/installation/#global
export default {
    props: {
        amenities: Object,
        errors: Object,
    },
    components: {
        AppLayout,
        Datepicker,
    },
    data() {
        const form = reactive({
            amenity_id: null,
            start: null,
            end: null,
        });

        const submit = () => {
            Inertia.post("/amenities", form);
            console.log('submitted');
        };
        return {
            form,
            submit,
            start: form.start,
            end: form.end,
        };
    },
};
</script>
