<script>
import AddPost from '../components/AddPost.vue';
import Post from "../components/Post.vue";
import PostSkeleton from "../components/PostSkeleton.vue";

export default {
    name: "Home",
    data() {
        return {

        };
    },
    components: {
        AddPost,
        Post,
        PostSkeleton
    },
};
</script>

<template>
    <div class="flex flex-col">
        <div class="w-full flex justify-evenly">
            <div class="w-3/5 max-w-3xl">
                <AddPost />

                <Suspense>
                    <template #default>
                        <Post />
                    </template>
                    <template #fallback>
                        <PostSkeleton />
                        <!-- loading ... -->
                    </template>
                </Suspense>

            </div>
        </div>
    </div>
</template>
