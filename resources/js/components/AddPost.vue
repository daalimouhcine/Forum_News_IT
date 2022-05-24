<script>
    import axios from 'axios';
    export default {
        name: "AddPost",
        data() {
            return {
                user_id: localStorage.getItem('userData') && JSON.parse(localStorage.getItem('userData')).id,
                title: '',
                body: '',
                image: null,
                category_id: '',
                categories: [],
            }
        },
        methods: {
            uploadImage(e) {
                this.image = e.target.files[0];
            },
            clearInputs() {
                this.title = '';
                this.body = '';
                this.image = null;
                this.category_id = '';
            },
            handleSubmit() {
                axios.post('/api/addPost', {
                    user_id: this.user_id,
                    title: this.title,
                    body: this.body,
                    image: this.image,
                    category_id: this.category_id
                }).then(response => { 
                    this.$router.go('/');
                    console.log(this.image);
                    
                }).catch(error => {
                    console.log(error);
                });
            },
            getCategories() {
                console.log('hello');
                axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data;
                });
            }
        },
        mounted() {
            this.getCategories();
        },
    }
</script>


<template>
    <div class="flex bg-blue-100 p-3 rounded-md">
        <input id="button" type="checkbox" />
        <label for="button" id="label_button" class="ml-auto" @click="clearInputs">
            <ion-icon
                name="add-outline"
                class="text-4xl border-2 border-gray-900 rounded-md text-gray-900 cursor-pointer"
            ></ion-icon>
        </label>
        <div class="modal">
            <form action="" class="flex flex-col" @submit.prevent="handleSubmit">
                <div class="user-box">
                    <input type="text" name="" required v-model="title" />
                    <label>Title</label>
                </div>
                <div class="user-box">
                    <textarea name="body" id="body" required v-model="body" ></textarea>
                    <label>Text Body</label>
                </div>
                <div class="user-box">
                    <input @change="uploadImage" type="file" name="image" accept=".png, .jpg, .jpeg" :maxFileSize="1048576000000" multiple />
                </div>
                <div class="user-box">
                    <select required v-model="category_id" >
                            <option value="" >Select a domaine</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
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
