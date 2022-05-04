<script>
import axios from 'axios';
import { ref } from 'vue';

const postsData = async () => {
    return new Promise((resolve) => {
        axios.get('http://127.0.0.1:8000/api/allPosts')
        .then(response => {
            resolve(response.data);
        })
    });
};

export default {
    async setup () {
        const posts = ref(await postsData())._rawValue.reverse();
        console.log(posts);
        return {
            posts,
        }
    },
    data() {
        return {
            displayComments: false, 

        }
    },
    methods: {
        displayCommentCondition() {
            this.displayComments = !this.displayComments;
        },
    },
        
  

}
</script>



<template>
    <div class="w-full max-w-3xl bg-white font-[Poppins] py-7 px-9 my-2 shadow-md rounded-xl" v-for='post in posts' :key='post.id'>
        <div class="w-full sm:flex hidden text-gray-400 text-base">
            <div class="flex cursor-pointer items-center">
                <div class="my-3">
                    <img class="h-10 w-10 rounded-full" src="https://thispersondoesnotexist.com/image" alt="avatar">
                </div>
                <p class="ml-3">{{ post.userId }}</p>
            </div>
            <div class="ml-auto cursor-pointer text-black">
                <ion-icon class="text-3xl p-1 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="ellipsis-vertical-outline"></ion-icon>
            </div>

        </div>
        <div class="flex flex-col">
            <p class="text-gray-400 text-sm mb-3">{{ post.created_at }}</p>
            <h1 class="font-bold sm:text-2xl text-base w-[80%]">{{ post.title }}</h1>
        </div>
        <p class=" text-gray-400 mt-4">{{ post.body }}</p>
        <!-- <p>{{image_path}}</p> -->
        <div class="mt-3 w-full" v-if="post.image">
            <img class="h-[200px] w-full" :src="post.image" alt="">
        </div>
        <div class=" mt-5 flex flex-row justify-between">
            <div class="w-full flex flex-row items-center gap-3">
                <div class="flex flex-row justify-evenly items-center">
                    <ion-icon class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="chevron-up-outline"></ion-icon>
                    <p class="text-2xl font-bold font-[Poppins]">{{ vote }}</p>
                    <ion-icon class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="chevron-down-outline"></ion-icon>
                </div>
                <div class="flex flex-row cursor-pointer p-3 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all"  @click="displayCommentCondition">
                    <ion-icon class="text-2xl" name="chatbubbles-outline"></ion-icon>
                    <p class="ml-2">Comments</p>
                </div>
                <div class="flex items-center justify-self-end gap-2 ml-auto">
                    <ion-icon class="text-xl" name="chevron-back-outline"></ion-icon>
                    <p>{{ post.domaine }}</p>
                    <ion-icon class="text-xl" name="chevron-forward-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
</template>
