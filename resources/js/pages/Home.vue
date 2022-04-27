<script>
import Post from "../components/Post.vue";
export default {
    name: "Home",
    data() {
        return {
            post_data: [
                {
                    created_by: "Mouhcine Daali",
                    title: "best articles in the world",
                    created_at: "12-05-2002",
                    body: "Lorem ipsum dolorm excepturi architecto saepe ipsum, alias ut debitis rem voluptas. Eos, odit mollitia distinctio voluptatum molestiae iure ipsa voluptate neque maxime sunt beatae repudiandae culpa molestias exercitationem corrupti quidem. Molestias!",
                    image_path: "",
                    vote: "15",
                    domaine: "Tech",
                },
                {
                    created_by: "abdesslam staili",
                    title: "the worst medical you can eat",
                    created_at: "01-09-2021",
                    body: "Lorem ipsum ut debitis rem voluptas. Eos, odit mollitia distinctio voluptatum molestiae iure ipsa voluptate neque maxime sunt beatae repudiandae culpa molestias exercitationem corrupti quidem. Molestias!",
                    image_path: "",
                    vote: "7",
                    domaine: "medical",
                },
            ],
        };
    },
    components: {
        Post,
    },
};
</script>

<template>
    <div class="flex flex-col">
        <div class="flex w-5/6 h-60 my-10 mx-auto bg-red-200 rounded-sm">
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
        </div>

        <div class="w-full flex justify-evenly">
            <div class="w-3/5 max-w-3xl">
                <div class="flex bg-blue-100 p-3 rounded-md">
                    <input id="button" type="checkbox" />
                    <label for="button" id="label_button" class="ml-auto">
                        <ion-icon
                            name="add-outline"
                            class="text-4xl border-2 border-gray-900 rounded-md text-gray-900 cursor-pointer"
                        ></ion-icon>
                    </label>
                    <div class="modal">
                        <form class="flex flex-col ">
                            <div class="user-box">
                                <input type="text" name="" required="" />
                                <label>Title</label>
                            </div>
                            <div class="user-box">
                                <textarea name="" id="" required=""></textarea>
                                <label>Text Body</label>
                            </div>
                            <div class="user-box">
                                <input type="image" src="" alt="" required="" />
                                <label>Image</label>
                            </div>
                            <div class="user-box">
                                <select name="" id="">
                                    <option>Select a domaine</option>
                                    <option value="tech">Tech</option>
                                    <option value="medical">Medical</option>
                                    <option value="exempt1">Exempt1</option>
                                </select>
                            </div>
                            <a href="#" class="w-fit self-center">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Submit
                            </a>
                        </form>
                    </div>
                </div>
                <Post
                    :created_by="post_data[0].created_by"
                    :created_at="post_data[0].created_at"
                    :title="post_data[0].title"
                    :body="post_data[0].body"
                    :image_path="post_data[0].image_path"
                    :vote="post_data[0].vote"
                    :domaine="post_data[0].domaine"
                />
                <Post
                    :created_by="post_data[1].created_by"
                    :created_at="post_data[1].created_at"
                    :title="post_data[1].title"
                    :body="post_data[1].body"
                    :image_path="post_data[1].image_path"
                    :vote="post_data[1].vote"
                    :domaine="post_data[1].domaine"
                />
            </div>
        </div>
    </div>
</template>
