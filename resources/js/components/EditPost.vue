<script>
    import axios from 'axios';
    
    export default {
        name: "EditPost",
        data() {
            return {
                postId: JSON.parse(JSON.stringify(this.postInfo.id)),
                title: JSON.parse(JSON.stringify(this.postInfo.title)),
                body: JSON.parse(JSON.stringify(this.postInfo.body)),
                image: null,
                category_id: JSON.parse(JSON.stringify(this.postInfo.category_id)),
                categories: [],
            }
        },
        methods: {
            handleSubmit() {
                axios.post('/api/updatePost', {
                    id: this.postId,
                    title: this.title,
                    body: this.body,
                    image: this.image,
                    category_id: this.category_id
                }).then(response => { 
                    console.log(response);
                    this.$router.go('/');
                                        
                })
            },
            getCategories() {
                axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data;
                });
            }
        },
        props: {
            postInfo: {
                type: Object,
                required: true,
            },
        },
        mounted() {
            this.getCategories();
        },
    }
</script>


<template>
    <div class="flex p-3 rounded-md">
        <input id="button" type="checkbox" checked={{this.status}} />
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
