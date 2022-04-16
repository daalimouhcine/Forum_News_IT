<template>
    <div>
        <div class="flex items-center min-h-full bg-white">
            <div class="container mx-auto">
                <div class="max-w-md mx-auto my-10">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700">Sign up</h1>
                        <p class="text-gray-500 dark:text-gray-400">
                            Sign up to create you account
                        </p>
                    </div>
                    <div class="mx-5 font-semibold text-red-500" role="alert" v-if="error !== null">
                        {{ error }}
                    </div>
                    <div class="m-7">
                        <form action="">
                            <div class="flex gap-x-5">
                                <div class="mb-6">
                                    <label
                                        for="first_name"
                                        class="block mb-2 text-sm text-gray-600"
                                        >First Name
                                    </label>
                                    <input
                                        @v-model="first_name"
                                        type="text"
                                        name="first_name"
                                        id="first_name"
                                        placeholder="Enter your first name"
                                        required
                                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                    />
                                </div>

                                <div class="mb-6">
                                    <label
                                        for="last_name"
                                        class="block mb-2 text-sm text-gray-600"
                                        >Last Name
                                    </label>
                                    <input
                                        @v-model="last_name"
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        placeholder="Enter your last name"
                                        required
                                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                    />
                                </div>
                            </div>

                            <div class="mb-6">
                                <label
                                    for="email"
                                    class="block mb-2 text-sm text-gray-600"
                                    >Email Address</label
                                >
                                <input
                                    @v-model="email"
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="you@example.com"
                                    required
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                />
                            </div>

                            <div class="mb-6">
                                <label
                                    @v-model="password"
                                    for="password"
                                    class="text-sm text-gray-600"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Your Password"
                                    required
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                />
                            </div>
                            <div class="mb-6">
                                <button
                                    @click="handleSubmit"
                                    type="submit"
                                    class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none"
                                >
                                    register
                                </button>
                            </div>
                            <p class="text-sm text-center text-gray-400">
                                You have an account? 
                                <a
                                    
                                    class="text-indigo-400 focus:outline-none cursor-pointer focus:underline focus:text-indigo-500"
                                    >Sign in</a
                                >.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    date() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            role: 'user',
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if(this.password.length > 0) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/register', {
                        first_name: this.first_name,
                        last_name: this.last_name,
                        email: this.email,
                        password: this.password,
                        role: this.role
                    })
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/login"
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            }
        }
    },
    beforeRouteEnter (to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('/');
        }
        next();
    }
};
</script>
