<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h4>ブログ作成</h4>
                        <br>
                        <div class="form-group">
                            <label>タイトル</label>
                            <input type="text" class="form-control" v-model="title">
                        </div>
                        <div class="form-group">
                            <label>カテゴリー</label><br>
                            <select v-model="cate_id">
                                <option value="">未選択</option>
                                <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>内容</label><br>
                            <textarea v-model="content" class="blog_content"></textarea>
                        </div>
                        <div class="form-group">
                            <button style="background:#000;color:#fff;" type="button" class="btn btn-dark btn-block" @click="add()">作成</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        mounted() {

            axios.get('/api/categories')
            .then(response =>{
                this.categories = response.data;
            });
            
        },
        data:function(){
            return {
                title:'',
                cate_id:'',
                content:'',
                categories:[]
            };
        },
        methods:{
            add:function(){
                // 作成処理
                var params = { 
                    title: this.title,
                    content: this.content,
                    cate_id: this.cate_id
                };
                var url = '/api/addBlog';
                axios.post( url, params )
                .then(function(response){
                    window.location = "/home";
                })
                .catch(function(error){
                    alert("error");
                });
            },
        },

        computed: {
            
        }
    }
</script>

<style scoped>
.blog_content{
    width:100%;
    height:400px;
}
</style>
