<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <Head :title="title" />
        <Menu :currentPage="$page.component" />
        <slot />
        <div>
            <Footer />
        </div>
    </div>
</template>

<script>
import Footer from "../Footer";
import { Link, Head } from "@inertiajs/inertia-vue3";
import Menu from "./Menu";

const navigation = [
    { name: "Products", href: "/products" },
    { name: "Prices", href: "/prices" },
    { name: "Company", href: "/company" },
];

export default {
    components: {
        Link,
        Footer,
        Menu,
    },
    props: {
        title: String,
    },
};
</script>
