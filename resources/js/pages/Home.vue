<script>
import AddPost from "../components/AddPost.vue";
import Post from "../components/Post.vue";
import PostSkeleton from "../components/PostSkeleton.vue";

export default {
    name: "Home",
    data() {
        return {
            isUser: localStorage.getItem("userData") ? true : false,
            searchCategory: "",
        };
    },
    methods: {
        storeCategory(category) {
            this.searchCategory = category;
        },
    },
    components: {
        AddPost,
        Post,
        PostSkeleton,
    },
};
</script>

<template>
    <div class="flex flex-col">
        <div class="w-full flex">
            <div class="w-3/5 max-w-3xl mx-auto">
                <AddPost v-if="isUser" :searchCategory="storeCategory" />

                <Suspense>
                    <template #default>
                        <Post :selectedCategory="searchCategory" />
                    </template>
                    <template #fallback>
                        <!-- loading ... -->
                        <PostSkeleton />
                    </template>
                </Suspense>
            </div>
        </div>
    </div>
</template>
