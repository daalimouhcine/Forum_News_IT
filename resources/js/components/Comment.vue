<script>
import axios from "axios";

export default {
    data() {
        return {
            userId: localStorage.getItem('userData') && JSON.parse(localStorage.getItem("userData")).id,
            postId: this.postId,
            body: "",
            comments: this.comments,
        };
    },
    methods: {
        handleSubmit() {
            axios
                .post("/api/addComment", {
                    userId: this.userId,
                    postId: this.postId,
                    body: this.body,
                })
                .then((response) => {
                    this.$router.go('/');
                });
        },
        deleteComment(id) {
            console.log(id);
            axios.post("/api/deleteComment", { id })
            .then(response => {
                console.log(response);
                this.$router.go('/');
            })
        },
    },
    props: ["postId", "comments"],
    // mounted() {
    //     this.getAllComments();
    // },
};
</script>

<template>
    <div class="comments w-full">
        <div class="comments-content">
            <form
                @submit.prevent="handleSubmit"
                action=""
                class="flex rounded-sm"
            >
                <div class="relative w-full">
                    <input
                        class="pt-2 mt-2 pb-2 pl-3 w-full h-11 bg-slate-200 rounded-lg placeholder:text-slate-600 font-medium pr-20"
                        v-model="body"
                        type="text"
                        placeholder="Add Comment"
                        required
                    />
                    <button
                        type="submit"
                        class="flex absolute right-3 top-2/4 -mt-3 items-center cursor-pointer"
                    >
                        <svg
                            class="fill-blue-500 hover:fill-blue-900"
                            style="width: 24px; height: 24px"
                            viewBox="0 0 24 24"
                        >
                            <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Comment row -->
            <div
                class="media flex pb-4 mt-5"
                v-for="comment in comments"
                :key="comment.id"
            >
                <div class="mr-4">
                    <img
                        class="rounded-full max-w-none w-12 h-12"
                        src="https://thispersondoesnotexist.com/image"
                    />
                </div>
                <div class="media-body">
                    <div>
                        <a
                            class="inline-block text-base font-bold mr-2"
                            href="#"
                            >{{ comment.user.first_name + " " + comment.user.last_name }}</a
                        >
                        <span class="text-slate-500 "
                            >{{ comment.created_at }}</span
                        >
                    </div>
                    <p>
                        {{ comment.body }}
                    </p>
                    <div class="mt-2 flex items-center">
                        <button v-if="comment.user_id == userId" @click="deleteComment(comment.id)"
                            class="flex items-center justify-center text-red-500 hover:text-red-900"
                        >
                            <svg
                                class="fill-current w-6 h-6"
                                viewBox="0 0 24 24"
                            >
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- End comments row -->
        </div>
    </div>
</template>

<style scope>
.comments {
    height: 0px;
}
.comments .comments-content {
    display: none;
}
.post-display-comments .comments {
    height: fit-content;
}
.post-display-comments .comments .comments-content {
    display: block;
}
</style>
