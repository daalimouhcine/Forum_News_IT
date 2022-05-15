<script>
import axios from 'axios';
import { ref } from 'vue';


const commentsData = async () => {
    return new Promise((resolve) => {
        axios.get('http://127.0.0.1:8000/api//getComments/' + 74)
        .then(response => {
            resolve(response.data);
        })
    });
};

export default {
    async setup () {
        const comments = ref(await commentsData())._rawValue.reverse();
        console.log(comments);
        return {
            comments,
        }
    },
    data() {
        return {
            userId: JSON.parse(localStorage.getItem("userData")).id,
            postId: this.postId,
            body: "",
        };
    },
    methods: {
        handleSubmit() {
            axios
                .post("http://127.0.0.1:8000/api/addComment", {
                    userId: this.userId,
                    postId: this.postId,
                    body: this.body
                })
                .then((response) => {
                    console.log(response);
                    console.log(this.body);
                });
        },
    },
    props: ["postId"],
};
</script>

<template>
    <div class="comments w-full bg-red-500">
        <div class="comments-content">
            <form @submit.prevent="handleSubmit" action="" class="flex rounded-sm">
                <input
                    v-model="body"
                    type="text"
                    placeholder="Add Comment"
                    required
                />
                <button type="submit">Send</button>
            </form>
            <div class="h-fit w-full bg-blue-500" v-for="comment in comments" :key="comment.id">
                <div class="flex items-center justify-between p-2">
                    <div class="flex items-center">
                        <img
                            class="h-10 w-10 rounded-full"
                            src="https://thispersondoesnotexist.com/image"
                            alt="avatar"
                        />
                        <p class="ml-3">{{ comment.user_id }}</p>
                    </div>
                    <div class="ml-auto cursor-pointer text-black">
                        <ion-icon class="text-3xl p-1 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="ellipsis-vertical-outline"></ion-icon>
                    </div>
                </div>
                <p class="p-2">{{ comment.body }}</p>
            </div>
        </div>
    </div>
</template>

<style scope>
.comments {
    height: 0px;
    transition: height 300ms linear;
}
.comments .comments-content {
    display: none;
}
.post-display-comments .comments {
    height: 200px;
}
.post-display-comments .comments .comments-content {
    display: block;
}
</style>
