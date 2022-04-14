<template>
    <div class="flex flex-col mt-10">
        <div class="flex w-5/6 h-60 my-10 mx-auto bg-red-200 rounded-sm">
            <div class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300">
                top posts 11111111
            </div>
            <div class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300">
                top posts 22222222
            </div>
            <div class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300">
                top posts 33333333
            </div>
            <div class="flex basis-full h-5/6 m-5 items-center justify-center bg-green-300">
                top posts 44444444
            </div>
        </div>

        <div class="w-full flex justify-evenly">
            <div class="w-3/5">
                <div class="bg-blue-100 p-3 rounded-md">
                    elements
                </div>
                <Post />
            </div>
            <aside class="w-1/4 h-96 bg-gray-500 rouded-sm">
                
            </aside>

        </div>

    </div>

</template>

<script>
    import Post from './Post'

    export default {
        name: 'Home',
        components: {
            Post
        }
    }
</script>