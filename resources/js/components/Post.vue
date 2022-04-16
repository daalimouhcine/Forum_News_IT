<template>
    <div class="w-full max-w-3xl bg-white font-[Poppins] py-7 px-9 my-2 shadow-md rounded-xl">
        <div class="w-full sm:flex hidden text-gray-400 text-base">
            <div class="flex cursor-pointer items-center">
                <ion-icon name="person-outline" ></ion-icon>
                <p class="ml-2">{{ created_by }}</p>
            </div>
            <div class="ml-auto cursor-pointer text-black">
                <ion-icon class="text-3xl p-1 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="ellipsis-vertical-outline"></ion-icon>
            </div>

        </div>
        <div class="flex flex-col">
            <p class="text-gray-400 text-sm mb-3">{{ created_at }}</p>
            <h1 class="font-bold sm:text-2xl text-base w-[80%]">{{ title }}</h1>
        </div>
        <p class=" text-gray-400 mt-4">{{ body }}</p>
        <!-- <p>{{image_path}}</p> -->
        <div class="mt-3 w-full">
            <img class="h-[200px] w-full" :src="image_path" alt="">
        </div>
        <div class=" mt-5 flex flex-row justify-between">
            <div class="w-full flex flex-row items-center gap-3">
                <div class="flex flex-row justify-evenly items-center">
                    <ion-icon class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="chevron-up-outline"></ion-icon>
                    <p class="text-2xl font-bold font-[Poppins]">{{ vote }}</p>
                    <ion-icon class="text-2xl cursor-pointer p-2 m-0.5 rounded-full hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all" name="chevron-down-outline"></ion-icon>
                </div>
                <div class="flex flex-row cursor-pointer p-3 rounded-md hover:bg-gray-100 hover:shadow-xl shadow-slate-900 transition-all">
                    <ion-icon class="text-2xl" name="chatbubbles-outline"></ion-icon>
                    <p class="ml-2">Comments</p>
                </div>
                <div class="flex items-center justify-self-end gap-2 ml-auto">
                    <ion-icon class="text-xl" name="chevron-back-outline"></ion-icon>
                    <p>{{ domaine }}</p>
                    <ion-icon class="text-xl" name="chevron-forward-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props: {
        created_by: String,
        created_at: Date,
        title: String,
        body: String,
        image_path: String,
        vote: Number,
        domaine: String,
    },

}
</script>