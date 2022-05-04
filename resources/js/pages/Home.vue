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
        <!-- <div class="flex w-5/6 h-60 my-10 mx-auto bg-red-200 rounded-sm">
            <div
                class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300"
            >
                top posts 11111111
            </div>
            <div
                class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300"
            >
                top posts 22222222
            </div>
            <div
                class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300"
            >
                top posts 33333333
            </div>
            <div
                class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300"
            >
                top posts 44444444
            </div>
        </div> -->

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
