<template>
    <div class="my-5">
        <div class="h-72 p-10 bg-blue-300">
            post content

        </div>
        <Comment />

    </div>
</template>

<script>
    import Comment from './Comment.vue'

    export default {
        name: 'Post',
        components: {
            Comment,
        }
    }
</script>