<script>
import axios from "axios";

export default {
    data() {
        return {
            userData: {
                first_name: JSON.parse(localStorage.getItem("userData"))
                    .first_name,
                last_name: JSON.parse(localStorage.getItem("userData"))
                    .last_name,
                email: JSON.parse(localStorage.getItem("userData")).email,
            },
            userId: JSON.parse(localStorage.getItem("userData")).id,
            first_name: JSON.parse(localStorage.getItem("userData")).first_name,
            last_name: JSON.parse(localStorage.getItem("userData")).last_name,
            email: JSON.parse(localStorage.getItem("userData")).email,
            password: "",
            error: "",
        };
    },
    methods: {
        handleSubmit() {
            axios
                .post("/api/updateProfile", {
                    userId: this.userId,
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    if (response.data.done) {
                        // update the localstorage data with the new data
                        localStorage.setItem(
                            "userData",
                            JSON.stringify(response.data.done)
                        );
                        console.log(response);
                        this.$router.go("/profile");
                    } else {
                        this.error = response.data.error;
                    }
                });
        },
    },
    beforeRouteEnter(to, from, next) {
        if(!localStorage.getItem('userData')) {
            return next('/');
        } 
        next();
    },
};
</script>

<template>
    <div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
            <img
                src="https://thispersondoesnotexist.com/image"
                alt=""
                class="bg w-full h-full object-cover object-center absolute z-0"
            />
            <div
                class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white"
            >
                <img
                    src="https://thispersondoesnotexist.com/image"
                    class="h-24 w-24 object-cover rounded-full"
                />
                <h1 class="text-2xl font-semibold">
                    {{ userData.first_name + " " + userData.last_name }}
                </h1>
                <h4 class="text-sm font-semibold">{{ userData.email }}</h4>
            </div>
        </div>
        <div class="grid grid-cols-12 bg-white">
            <div
                class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start"
            >
                <a
                    href="#"
                    class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold"
                    >Basic Information</a
                >

                <a
                    href="#"
                    class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"
                    >Another Information</a
                >

                <a
                    href="#"
                    class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"
                    >Another Something</a
                >
            </div>

            <div
                class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10"
            >
                <div class="px-4 pt-4">
                    <h1 class="text-center text-red-500 font-semibold">
                        {{ error }}
                    </h1>
                    <form
                        action=""
                        @submit.prevent="handleSubmit"
                        class="flex flex-col space-y-8"
                    >
                        <div>
                            <h3 class="text-2xl font-semibold">
                                Basic Information
                            </h3>
                            <hr />
                        </div>

                        <div class="form-item">
                            <label class="text-xl">First Name*</label>
                            <input
                                type="text"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                                required
                                v-model="first_name"
                            />
                        </div>
                        <div class="form-item">
                            <label class="text-xl">Last Name*</label>
                            <input
                                type="text"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                                required
                                v-model="last_name"
                            />
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl">Email*</label>
                            <input
                                type="email"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                                required
                                v-model="email"
                            />
                        </div>

                        <div class="form-item w-full">
                            <label class="text-xl">New Password</label>
                            <input
                                type="text"
                                class="w-full appearance-none text-black rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25"
                                v-model="password"
                            />
                        </div>
                        <button
                            type="submit"
                            class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300"
                        >
                            Update Info
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
