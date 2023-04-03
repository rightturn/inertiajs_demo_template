<template>
    <h1 class="text-2xl font-bold text-center p-2">Hello {{ name }}</h1>
    <h1>Age {{ age }}</h1>

    <h1>Bio</h1>
    <p>{{ bio }}</p>

    <h1>Frameworks</h1>
    <ul>
        <li v-for="tech in frameworks" :key="tech">{{ tech }}</li>
    </ul>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import Layout from "../Shared/Layout";
export default {
    props: {
        name: String,
        age: String,
        frameworks: Array,
    },

    layout: Layout,

    components: {
        Link,
    },

    data() {
        let university = "International Islamaic University";
        let location = "H10 Islamabad";

        let bio =
            "I am " +
            this.name +
            " my age is " +
            this.age +
            " I Study in " +
            university +
            " Which is located at " +
            location;

        return {
            bio,
        };
    },
};
</script>
