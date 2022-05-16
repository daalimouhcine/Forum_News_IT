<script>
import axios from "axios";

export default {
    data() {
        return {
            userId: JSON.parse(localStorage.getItem("userData")).id,
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
        // getAllComments() {
        //     axios.get('http://127.0.0.1:8000/api/allComments'+this.postId)
        //     .then(response => {
        //         this.comments = response.data;
        //         console.log(this.comments);
        //     })
        // }
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
                        class="pt-2 pb-2 pl-3 w-full h-11 bg-slate-200 rounded-lg placeholder:text-slate-600 font-medium pr-20"
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
                            >{{ comment.user_id }}</a
                        >
                        <span class="text-slate-500 "
                            >{{ comment.created_at }}</span
                        >
                    </div>
                    <p>
                        {{ comment.body }}
                    </p>
                    <div class="mt-2 flex items-center">
                        <button
                            class="py-2 px-4 font-medium hover:bg-slate-50 rounded-lg"
                        >
                            Repply
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
