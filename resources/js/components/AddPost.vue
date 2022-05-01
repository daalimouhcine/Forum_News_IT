<script>
    import axios from 'axios';
    export default {
        name: "AddPost",
        data() {
            return {
                title: '',
                body: '',
                image_path: '',
                domaine: '',
                created_by: JSON.parse(localStorage.getItem('userData')).id
            }
        },
        methods: {
            uploadImage(e) {
                this.image_path = e.target.files[0];
            },
            handleSubmit() {
                axios
            }
        },
    }
</script>


<template>
    <div class="flex bg-blue-100 p-3 rounded-md">
        <input id="button" type="checkbox" />
        <label for="button" id="label_button" class="ml-auto">
            <ion-icon
                name="add-outline"
                class="text-4xl border-2 border-gray-900 rounded-md text-gray-900 cursor-pointer"
            ></ion-icon>
        </label>
        <div class="modal">
            <form class="flex flex-col" @submit.prevent="handleSubmit">
                <div class="user-box">
                    <input type="text" name="" required v-model="title" />
                    <label>Title</label>
                </div>
                <div class="user-box">
                    <textarea name="" id="" required v-model="body" ></textarea>
                    <label>Text Body</label>
                </div>
                <div class="user-box">
                    <input @change="uploadImage" type="file" required accept=".png, .jpg, .jpeg" :maxFileSize="1048576000000" multiple />
                </div>
                <div class="user-box">
                    <select required v-model="domaine">
                        <option value="" >Select a domaine</option>
                        <option value="tech">Tech</option>
                        <option value="medical">Medical</option>
                        <option value="exempt1">Exempt1</option>
                    </select>
                </div>
                <button type="submit" href="#" class="w-fit self-center" >
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>
