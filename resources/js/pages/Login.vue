<template>
    <div>
        <div class="flex items-center min-h-full bg-white">
            <div class="container mx-auto">
                <div class="max-w-md mx-auto my-10">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700">Sign in</h1>
                        <p class="text-gray-500">Sign in to access your account</p>
                    </div>
                    <div class="m-7">
                        <div class="mx-5 font-semibold text-red-500" role="alert" v-if="error !== null">
                            {{ error }}
                        </div>
                        <form>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="you@example.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" @v-model="email" />
                            </div>
                            
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-400" required @v-model="password">Password</label>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Your Password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                            </div>

                            <div class="mb-6">
                                <button @click="handleSubmit" type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Sign in</button>
                            </div>
                            <p class="text-sm text-center text-gray-400">Don&#x27;t have an account yet? <router-link to="/register" class="text-indigo-400 focus:outline-none focus:underline cursor-pointer focus:text-indigo-500">Sign up</router-link>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    }) 
                    .then(response => {
                        console.log(response.data)
                        if (response.data.success) {
                            this.$router.go('/')
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
                })
            }
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('/');
        }
        next();
    }

}
</script>