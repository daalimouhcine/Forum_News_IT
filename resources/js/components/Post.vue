<script>
import axios from "axios";
import { ref } from "vue";
import Comment from "../components/Comment.vue";
import EditPost from "./EditPost.vue";

const postsData = async () => {
    return new Promise((resolve) => {
        axios.get("/api/posts").then((response) => {
            resolve(response.data);
            console.log(response);
        });
    });
};

export default {
    async setup() {
        const posts = ref(await postsData())._rawValue.reverse() || [];
        console.log(posts);
        return {
            posts,
        };
    },
    data() {
        return {
            settings: localStorage.getItem('userData') ? true : false,
            isAdmin: localStorage.getItem("userData") && JSON.parse(localStorage.getItem('userData')).role == "admin" ? true : false,
            displayComments: false,
            displayOptions: false,
        };
    },
    methods: {
        displayCommentCondition(e) {
            this.displayComments = !this.displayComments;
            let postDisplayComments = e.target.parentNode.parentNode.parentNode;
            postDisplayComments.classList.toggle("post-display-comments");
        },
        displayOptionsCondition(e) {
            this.displayOptions = !this.displayOptions;
            let postDisplayOptions = e.target.parentNode;
            postDisplayOptions.classList.toggle("post-display-options");
        },
        editPost(post_id) {
            this.$router.push({
                name: "edit-post",
                params: {
                    post_id: post_id,
                },
            });
        },
        deletePost(id) {
            console.log(id);
            axios.post("/api/deletePost", { id })
            .then(response => {
                console.log(response);
                this.$router.go('/');
            })
        },
        sameUser(userPostId) {
            let userData = JSON.parse(localStorage.getItem('userData'));
            let userId = userData.id;
            if (userId == userPostId) {
                return true;
            } else {
                return false;
            }
        },
    },
    components: {
        Comment,
    },
};
</script>

<template>
    <article
        class="my-4 break-inside p-6 rounded-xl bg-blue-50 flex flex-col bg-clip-border"
        v-for="post in posts"
        :key="post.id"
    >
        <div class="flex pb-6 items-center justify-between">
            <div class="flex justify-between">
                <a class="inline-block mr-4" href="#">
                    <img
                        class="rounded-full max-w-none w-14 h-14"
                        src="https://thispersondoesnotexist.com/image"
                    />
                </a>
                <div class="flex flex-col">
                    <div class="flex items-center">
                        <a
                            class="inline-block text-lg font-bold mr-2"
                            href="#"
                            >{{
                                post.user.first_name + " " + post.user.last_name
                            }}</a
                        >
                        <span v-if="post.user.role === 'admin'">
                            <svg
                                class="fill-blue-500 w-5 h-5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"
                                ></path>
                            </svg>
                        </span>
                    </div>
                    <div class="text-slate-500">
                        {{ post.created_at }}
                    </div>
                </div>
            </div>
                <div v-if="(settings && sameUser(post.user.id)) || isAdmin" class="ml-auto relative cursor-pointer text-black" @click="displayOptionsCondition">
                    <ion-icon
                        class="text-3xl p-1 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all"
                        name="ellipsis-vertical-outline"
                    ></ion-icon>
                    <div class="options flex absolute flex-col ">
                        <button class="m-1 p-2 bg-green-400 rounded-md" @click="editPost(post.id)">
                            edit 
                        </button>
                        <button class="m-1 p-2 bg-red-400 rounded-md" @click="deletePost(post.id)">
                            delete
                        </button>
                    </div>
                </div>
        </div>
        <h2 class="text-3xl font-extrabold">
            {{ post.title }}
        </h2>
        <div class="py-4">
            <div class="mt-3 w-full" v-if="post.image">
                <img class="max-w-full rounded-lg" :src="post.image" alt="" />
            </div>
        </div>
        <p>
            {{ post.body }}
        </p>
        <div class="mt-6 flex flex-col justify-between">
            <div class="w-full flex flex-row items-center gap-3">
                <div class="flex flex-row justify-evenly items-center">
                    <ion-icon
                        class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all"
                        name="chevron-up-outline"
                    ></ion-icon>
                    <p class="text-2xl font-bold font-[Poppins]">{{ vote }}</p>
                    <ion-icon
                        class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all"
                        name="chevron-down-outline"
                    ></ion-icon>
                </div>
                <div
                    class="flex flex-row cursor-pointer p-3 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all"
                    @click="displayCommentCondition"
                >
                    <ion-icon
                        class="text-2xl"
                        name="chatbubbles-outline"
                    ></ion-icon>
                    <p class="ml-2">Comments</p>
                </div>
                <div class="flex items-center justify-self-end gap-2 ml-auto">
                    <ion-icon
                        class="text-xl"
                        name="chevron-back-outline"
                    ></ion-icon>
                    <p>{{ post.category.name }}</p>
                    <ion-icon
                        class="text-xl"
                        name="chevron-forward-outline"
                    ></ion-icon>
                </div>
            </div>
            <Comment :postId="post.id" :comments="post.comments" />
        </div>
    </article>
    <!-- End comments row -->
</template>
<style scoped>
.options {
    right:-50%;
    top:-70%;
    opacity: 0;
    pointer-events: none;
    transition: all 500ms ease-in-out;
}
.post-display-options .options {
    opacity:1;
    top:100%;
    pointer-events: all;
}

</style>
