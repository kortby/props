<template>
    <PropLayout :title="`${props.name}`" :propertyname="props.name">
        <div class="relative bg-gray-50 overflow-hidden">
            <!-- Background image and overlap -->
            <div
                aria-hidden="true"
                class="hidden absolute inset-0 sm:flex sm:flex-col"
            >
                <div class="flex-1 relative w-full bg-gray-800">
                    <div class="absolute inset-0 overflow-hidden">
                        <img
                            :src="property.pictures[0].imageSrc"
                            alt=""
                            class="w-full h-full object-center object-cover"
                        />
                    </div>
                    <div class="absolute inset-0 bg-gray-900 opacity-70" />
                </div>
                <div class="w-full bg-white" />
            </div>

            <div class="relative pt-6 pb-16 sm:pb-24">
                <Popover>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6">
                        <nav
                            class="relative flex items-center justify-between sm:h-10 md:justify-center"
                            aria-label="Global"
                        >
                            <div
                                class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0"
                            >
                                <div
                                    class="flex items-center justify-between w-full md:w-auto"
                                >
                                    <a href="#">
                                        <span class="sr-only">Workflow</span>
                                        <h3
                                            class="text-2xl font-bold text-white"
                                            v-text="property.name"
                                        ></h3>
                                    </a>
                                    <div
                                        class="-mr-2 flex items-center md:hidden"
                                    >
                                        <PopoverButton
                                            class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        >
                                            <span class="sr-only"
                                                >Open main menu</span
                                            >
                                            <MenuIcon
                                                class="h-6 w-6"
                                                aria-hidden="true"
                                            />
                                        </PopoverButton>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex md:space-x-10">
                                <a
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    class="font-medium text-white hover:text-gray-300"
                                    >{{ item.name }}</a
                                >
                            </div>
                            <div
                                class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0"
                            >
                                <span class="inline-flex rounded-md shadow">
                                    <a
                                        :href="`/schedule-viewing/${props.id}`"
                                        class="font-medium text-white hover:text-gray-300 p-4"
                                    >
                                        Schedule viewing
                                    </a>
                                    <a
                                        :href="`/application`"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700"
                                    >
                                        Apply now
                                    </a>
                                </span>
                            </div>
                        </nav>
                    </div>

                    <transition
                        enter-active-class="duration-150 ease-out"
                        enter-from-class="opacity-0 scale-95"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="duration-100 ease-in"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-95"
                    >
                        <PopoverPanel
                            focus
                            class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                        >
                            <div
                                class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"
                            >
                                <div
                                    class="px-5 pt-4 flex items-center justify-between"
                                >
                                    <div>
                                        <h3 v-text="property.name"></h3>
                                    </div>
                                    <div class="-mr-2">
                                        <PopoverButton
                                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        >
                                            <span class="sr-only"
                                                >Close menu</span
                                            >
                                            <XIcon
                                                class="h-6 w-6"
                                                aria-hidden="true"
                                            />
                                        </PopoverButton>
                                    </div>
                                </div>
                                <div class="px-2 pt-2 pb-3">
                                    <a
                                        v-for="item in navigation"
                                        :key="item.name"
                                        :href="item.href"
                                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50"
                                        >{{ item.name }}</a
                                    >
                                </div>
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50"
                                >
                                    Schedule viewing
                                </a>
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 ml-3"
                                >
                                    Apply now
                                </a>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>

                <main
                    class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 h-96 flex items-end"
                >
                    <div class="align-bottom">
                        <h4
                            class="text-lg font-bold text-white"
                            v-text="property.phone"
                        ></h4>
                        <h5
                            class="text-md text-white"
                            v-text="`${props.address_1} ${props.address_2}`"
                        ></h5>
                        <span
                            class="text-md text-white"
                            v-text="
                                `${props.city}, ${props.state} ${props.code_postal}`
                            "
                        ></span>
                    </div>
                </main>
            </div>
        </div>

        <!-- Services -->
        <div class="relative bg-gray-50 pb-10 px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <div class="bg-white h-1/3 sm:h-2/3" />
            </div>
            <div class="relative max-w-7xl mx-auto">
                <div
                    class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none"
                >
                    <div
                        v-for="post in posts"
                        :key="post.title"
                        class="flex flex-col rounded-lg shadow-lg overflow-hidden"
                    >
                        <div class="flex-shrink-0">
                            <img
                                class="h-48 w-full object-cover"
                                :src="post.imageUrl"
                                alt=""
                            />
                        </div>
                        <div
                            class="flex-1 bg-white p-6 flex flex-col justify-between"
                        >
                            <div class="flex-1">
                                <a :href="post.href" class="block mt-2">
                                    <p
                                        class="text-xl font-semibold text-gray-900"
                                    >
                                        {{ post.title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ post.description }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials -->
        <section
            aria-labelledby="testimonial-heading"
            class="relative max-w-7xl mx-auto px-4 sm:px-6 pt-24 lg:pt-24 lg:px-8"
        >
            <div class="max-w-2xl mx-auto lg:max-w-none">
                <h2
                    id="testimonial-heading"
                    class="text-2xl font-bold tracking-tight text-gray-900"
                >
                    What are people saying?
                </h2>

                <div
                    class="mt-16 space-y-16 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8"
                >
                    <blockquote
                        v-for="testimonial in testimonials"
                        :key="testimonial.id"
                        class="sm:flex lg:block"
                    >
                        <svg
                            width="24"
                            height="18"
                            viewBox="0 0 24 18"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            class="flex-shrink-0 text-gray-300"
                        >
                            <path
                                d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                fill="currentColor"
                            />
                        </svg>
                        <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                            <p class="text-lg text-gray-600">
                                {{ testimonial.quote }}
                            </p>
                            <cite
                                class="mt-4 block font-semibold not-italic text-gray-900"
                            >
                                {{ testimonial.attribution }}
                            </cite>
                        </div>
                    </blockquote>
                </div>
            </div>
        </section>

        <!-- available units -->
        <div class="bg-white">
            <div
                class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                <h2
                    class="text-3xl font-bold text-center tracking-tight text-gray-900"
                >
                    Available units
                </h2>
                <p
                    class="mt-3 text-center mx-auto text-xl text-gray-500 sm:mt-4"
                >
                    For more available units please contact us at
                    <span class="text-indigo-600" v-text="property.phone"></span
                    >.
                </p>
                <div
                    class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
                >
                    <div
                        v-for="(unit, index) in props.units"
                        :key="index"
                        class="group relative"
                    >
                        <div
                            class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none"
                        >
                            <img
                                :src="props.floor_plans_pictures[index]"
                                class="w-full h-full object-center object-cover lg:w-full lg:h-full"
                            />
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a :href="`/units/${unit.id}`">
                                        <span
                                            aria-hidden="true"
                                            class="absolute inset-0"
                                        />
                                        {{ unit.unit_heading }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ unit.size }} SQFT
                                </p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">
                                ${{ unit.price }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-12 bg-gray-50 overflow-hidden md:py-20 lg:py-24">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <svg
                    class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2"
                    width="404"
                    height="404"
                    fill="none"
                    viewBox="0 0 404 404"
                    role="img"
                    aria-labelledby="svg-workcation"
                >
                    <title id="svg-workcation">Workcation</title>
                    <defs>
                        <pattern
                            id="ad119f34-7694-4c31-947f-5c9d249b21f3"
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
                        fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)"
                    />
                </svg>

                <div class="relative">
                    <img
                        class="mx-auto h-8"
                        src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-and-indigo-600-text.svg"
                        alt="Workcation"
                    />
                    <blockquote class="mt-10">
                        <div
                            class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900"
                        >
                            <p>
                                &ldquo;Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Nemo expedita voluptas culpa
                                sapiente alias molestiae. Numquam corrupti in
                                laborum sed rerum et corporis.&rdquo;
                            </p>
                        </div>
                        <footer class="mt-8">
                            <div
                                class="md:flex md:items-center md:justify-center"
                            >
                                <div class="md:flex-shrink-0">
                                    <img
                                        class="mx-auto h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt=""
                                    />
                                </div>
                                <div
                                    class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center"
                                >
                                    <div
                                        class="text-base font-medium text-gray-900"
                                    >
                                        Judith Black
                                    </div>

                                    <svg
                                        class="hidden md:block mx-1 h-5 w-5 text-indigo-600"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path d="M11 0h3L9 20H6l5-20z" />
                                    </svg>

                                    <div
                                        class="text-base font-medium text-gray-500"
                                    >
                                        CEO, Workcation
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </section>
    </PropLayout>
</template>

<script setup>
import { computed, ref, defineComponent, h } from "vue";
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import { CurrencyDollarIcon, GlobeIcon } from "@heroicons/vue/outline";

import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { MenuIcon, XIcon } from "@heroicons/vue/outline";

import PropLayout from "@/Pages/Shared/Partials/PropLayout.vue";

const navigation = [
    { name: "Product", href: "#" },
    { name: "Features", href: "#" },
    { name: "Marketplace", href: "#" },
    { name: "Company", href: "#" },
];

const testimonials = [
    {
        id: 1,
        quote: "My order arrived super quickly. The product is even better than I hoped it would be. Very happy customer over here!",
        attribution: "Sarah Peters, New Orleans",
    },
    {
        id: 2,
        quote: "I had to return a purchase that didn’t fit. The whole process was so simple that I ended up ordering two new items!",
        attribution: "Kelly McPherson, Chicago",
    },
];

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
    units: Object,
    amenities: String,
    floor_plans_pictures: Array,
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

const products = [
    {
        id: 1,
        name: "Basic Tee",
        href: "#",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
        imageAlt: "Front of men's Basic Tee in black.",
        price: "$35",
        color: "Black",
    },
    // More products...
];

const posts = [
    {
        title: "Amenities",
        href: "#",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.",
        imageUrl: props.amenities[0],
    },
    {
        title: "Gallery",
        href: "#",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.",
        imageUrl: props.amenities[1],
    },
    {
        title: "Floor plans",
        href: "#",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque corporis perferendis hic.",
        imageUrl:
            "https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
    },
];

const navigationFooter = {
    main: [
        { name: "About", href: "#" },
        { name: "Blog", href: "#" },
        { name: "Jobs", href: "#" },
        { name: "Press", href: "#" },
        { name: "Accessibility", href: "#" },
        { name: "Partners", href: "#" },
    ],
    social: [
        {
            name: "Facebook",
            href: "#",
            icon: defineComponent({
                render: () =>
                    h("svg", { fill: "currentColor", viewBox: "0 0 24 24" }, [
                        h("path", {
                            "fill-rule": "evenodd",
                            d: "M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z",
                            "clip-rule": "evenodd",
                        }),
                    ]),
            }),
        },
        {
            name: "Instagram",
            href: "#",
            icon: defineComponent({
                render: () =>
                    h("svg", { fill: "currentColor", viewBox: "0 0 24 24" }, [
                        h("path", {
                            "fill-rule": "evenodd",
                            d: "M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z",
                            "clip-rule": "evenodd",
                        }),
                    ]),
            }),
        },
        {
            name: "Twitter",
            href: "#",
            icon: defineComponent({
                render: () =>
                    h("svg", { fill: "currentColor", viewBox: "0 0 24 24" }, [
                        h("path", {
                            d: "M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84",
                        }),
                    ]),
            }),
        },
    ],
};
</script>
