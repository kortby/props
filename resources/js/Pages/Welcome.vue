<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Layout title="Welcome">
        <div>
            <div class="relative bg-white pt-16 pb-32 overflow-hidden">
                <div class="relative">
                    <div
                        class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24"
                    >
                        <div
                            class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0"
                        >
                            <div>
                                <div>
                                    <Animation />
                                </div>
                                <div class="mt-6">
                                    <h2
                                        class="text-3xl font-extrabold tracking-tight text-gray-900"
                                    >
                                        Stay on top of customer support
                                    </h2>
                                    <p class="mt-4 text-lg text-gray-500">
                                        An easy-to-use property managemant app
                                        that allows landlors to easily advertise
                                        vacant units, request rental
                                        applications and credit reports, sign
                                        leases, and collect rent.
                                    </p>
                                    <div class="mt-6">
                                        <a
                                            href="/prices"
                                            class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700"
                                        >
                                            Get started
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 border-t border-gray-200 pt-6">
                                <blockquote>
                                    <div>
                                        <p class="text-base text-gray-500">
                                            &ldquo;Cras velit quis eros eget
                                            rhoncus lacus ultrices sed diam. Sit
                                            orci risus aenean curabitur donec
                                            aliquet. Mi venenatis in euismod
                                            ut.&rdquo;
                                        </p>
                                    </div>
                                    <footer class="mt-3">
                                        <div
                                            class="flex items-center space-x-3"
                                        >
                                            <div class="flex-shrink-0">
                                                <img
                                                    class="h-6 w-6 rounded-full"
                                                    src="https://images.unsplash.com/photo-1509783236416-c9ad59bae472?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                    alt=""
                                                />
                                            </div>
                                            <div
                                                class="text-base font-medium text-gray-700"
                                            >
                                                Marcia Hill, Digital Marketing
                                                Manager
                                            </div>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                        <div class="mt-12 sm:mt-16 lg:mt-0">
                            <div
                                class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full"
                            >
                                <img
                                    class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                    src="img/pages/welcome-1.png"
                                    alt="Inbox user interface"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <Features />
                <div class="mt-24">
                    <div
                        class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24"
                    >
                        <div
                            class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2"
                        >
                            <div>
                                <div>
                                    <Animation />
                                </div>
                                <div class="mt-6">
                                    <h2
                                        class="text-3xl font-extrabold tracking-tight text-gray-900"
                                    >
                                        Better understand your customers
                                    </h2>
                                    <p class="mt-4 text-lg text-gray-500">
                                        Ability to easily advertise vacant
                                        units, request rental applications and
                                        credit reports, sign leases, and collect
                                        rent. We are here to make live easier
                                        for landlord and tenant who can not only
                                        pay rent electronically but also submit
                                        maintenance requests at a push of a
                                        button.
                                    </p>
                                    <div class="mt-6">
                                        <a
                                            href="/prices"
                                            class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700"
                                        >
                                            Get started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                            <div
                                class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full"
                            >
                                <img
                                    class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none"
                                    src="img/pages/welcome-2.png"
                                    alt="Customer profile user interface"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import { MenuIcon, XIcon } from "@heroicons/vue/outline";
import Layout from "./Shared/Partials/Layout";
import Features from "./Features";
import Animation from "./Shared/Partials/Animation";

export default {
    components: {
        Animation,
        Layout,
        MenuIcon,
        XIcon,
        Features,
    },
    setup() {},
};
</script>
