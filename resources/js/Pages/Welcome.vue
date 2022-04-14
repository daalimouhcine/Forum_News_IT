<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Home from './Home/Home.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
  <div class="flex flex-col bg-gray-100 ">

    <div class="w-full px-6 py-3 bg-indigo-500">
      <div v-if="canLogin" class="flex items-center justify-between">
          <!-- Header logo -->
          <div class="mx-3">
              <!-- <img src="../../img/horizontal_logo.png" alt="" /> -->
          </div>
          <!-- search input -->
        <div class="w-fit relative mx-auto text-gray-600">
            <input
                class="border-2 border-gray-300 bg-white lg:w-72 h-10 pl-2 pr-8 rounded-lg text-sm focus:outline-none"
                type="search"
                name="search"
                placeholder="Search"
            />
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-2">
                <svg
                    class="text-gray-600 h-4 w-4 fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    version="1.1"
                    id="Capa_1"
                    x="0px"
                    y="0px"
                    viewBox="0 0 56.966 56.966"
                    style="enable-background: new 0 0 56.966 56.966"
                    xml:space="preserve"
                    width="512px"
                    height="512px"
                >
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                    />
                </svg>
            </button>
        </div>
        

        <Link v-if="$page.props.user" :href="route('dashboard')" class="text-white font-semibold hover:border-b-2 border-white pb-1">
            Dashboard
        </Link>

        <template v-else>
          <div>

              <Link :href="route('login')" class=" border-b-2 text-white font-semibold border-white pb-1 mr-3">
                  Acceuill
              </Link>

              <Link :href="route('login')" class="text-md ml-2 border hover:bg-indigo-700 px-3 py-2 rounded text-white font-bold cursor-pointer">
                  Log in
              </Link>

              <Link v-if="canRegister" :href="route('register')" class="text-md ml-2 bg-white text-indigo-500 hover:bg-blue-100 px-3 py-2 rounded font-bold cursor-pointer">
                  Register
              </Link>

          </div>
        </template>
    </div>
    </div>

    <Home />
  </div>
</template>

<style scoped>
 
</style>
