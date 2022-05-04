<script>
export default {
    
}
</script>

<template>
    <div class="comments w-full bg-red-500">
        <div class="comments-content">
            <form action="" class="flex  rouded-sm">
                <input type="text" placeholder="Add Comment" required>
                <button type="submit">Send</button>
            </form>
            

        </div>
    </div>
</template>

<style  scope>
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