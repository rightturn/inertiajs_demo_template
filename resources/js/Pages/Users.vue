<template>
    <div class="w-3/4 mx-auto mt-10">
        <h1 class="font-bold text-2xl text-center p-4 bg-slate-200">
            List of Users
        </h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <div
                class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900"
            >
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative ml-3">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                    >
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="table-search-users"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users"
                        v-model="search"
                    />
                </div>
            </div>
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="user in users.data"
                        :key="user.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            <div class="">
                                <div class="text-base font-semibold">
                                    {{ user.name }}
                                </div>
                                <div class="font-normal text-gray-500">
                                    {{ user.email }}
                                </div>
                            </div>
                        </th>

                        <td class="px-6 py-4">
                            <a
                                href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <pagination class="mt-6" :links="users.links" />
    </div>
</template>

<script>
import { ref } from "vue";
import Layout from "../Shared/Layout";
import Pagination from "../Shared/Pagination";
import { Inertia } from "@inertiajs/inertia";
export default {
    props: {
        users: Object,
    },
    layout: Layout,

    components: {
        Pagination,
    },

    data() {
        let search = ref("");
        return {
            search,
        };
    },

    watch: {
        search(newValue) {
            this.$inertia.get(
                "/users",
                {
                    search: newValue,
                },
                {
                    preserveState: true,
                }
            );
        },
    },
};
</script>
