<script>
import axios from "axios";
import { ref } from "vue";

const usersData = async () => {
    return new Promise((resolve) => {
        axios.get("/api/users").then((response) => {
            resolve(response.data);
        });
    });
};

export default {
    name: "Users",
    async setup() {
        const usersElement = ref(await usersData())._rawValue[0];
        return {
            usersElement,
        };
    },
    methods: {
        deleteUser(id) {
            console.log(id);
            axios.post("/api/deleteUser", { userId : id })
            .then(response => {
                this.$router.go('/');
            })
        },
    },
};
</script>

<template>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr v-for="user in usersElement" :key="user.id">
            <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6"
            >
                {{ user.id }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ user.first_name + " " + user.last_name }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm">
                {{ user.email }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm">
                <span class="flex justify-center">
                    <button @click="deleteUser(user.id)" class=" cursor-pointer">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-red-500"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                </span>
            </td>
        </tr>
    </tbody>
</template>
