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
                            Pre-screening Questions
                        </h2>
                        <p class="mt-4 text-xl text-gray-600">
                            Tenant Applications.
                        </p>
                    </div>
                </div>
            </div>

            <!-- new form  -->
            <form @submit.prevent="submit">
                <div v-for="(item, index) in questions" :key="index">
                    <div
                        v-if="formStep == item.id"
                        class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28"
                    >
                        <div class="relative">
                            <div class="absolute inset-0 h-1/2 bg-gray-100" />
                            <div
                                class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-48"
                            >
                                <div
                                    class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex"
                                >
                                    <div
                                        class="flex-1 bg-white px-6 py-8 lg:p-12"
                                    >
                                        <div class="pt-8">
                                            <div>
                                                <h3
                                                    class="text-lg leading-6 font-medium text-gray-900"
                                                    v-text="item.question"
                                                ></h3>
                                            </div>
                                            <div
                                                class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6"
                                            >
                                                <div class="sm:col-span-12">
                                                    <label
                                                        for="first-name"
                                                        class="block text-sm font-medium text-gray-700"
                                                    >
                                                        Answer
                                                    </label>
                                                    <div class="mt-1">
                                                        <textarea
                                                            required
                                                            v-model="
                                                                form.answers[
                                                                    index
                                                                ].answer
                                                            "
                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        >
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-8">
                                                <div class="flex justify-end">
                                                    <button
                                                        @click="prevStep"
                                                        v-if="formStep > 1"
                                                        type="button"
                                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    >
                                                        Previous
                                                    </button>
                                                    <button
                                                        v-if="
                                                            formStep <
                                                            questions.length
                                                        "
                                                        :disabled="
                                                            isDisabled(
                                                                form.answers[
                                                                    index
                                                                ].answer
                                                            )
                                                        "
                                                        @click="nextStep"
                                                        type="button"
                                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3"
                                                        :class="{
                                                            'ml-2 disabled:opacity-40':
                                                                isDisabled(
                                                                    form
                                                                        .answers[
                                                                        index
                                                                    ].answer
                                                                ),
                                                        }"
                                                    >
                                                        Next
                                                    </button>
                                                    <button
                                                        v-if="
                                                            formStep ==
                                                            questions.length
                                                        "
                                                        type="submit"
                                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        :disabled="
                                                            isDisabled(
                                                                form.answers[
                                                                    index
                                                                ].answer
                                                            )
                                                        "
                                                        :class="{
                                                            'ml-2 disabled:opacity-50':
                                                                isDisabled(
                                                                    form
                                                                        .answers[
                                                                        index
                                                                    ].answer
                                                                ),
                                                        }"
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
            </form>
            <!-- end form  -->
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
        questions: Array,
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
            answers: this.questions,
        });

        const submit = () => {
            Inertia.post("/prescreening", form);
            console.log("Questions been answered!");
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
        isDisabled(val) {
            return val === null;
        },
    },
};
</script>
