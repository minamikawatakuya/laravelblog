<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <br>
                    <h4>ブログ編集</h4>
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
                        <button style="background:#000;color:#fff;" type="button" class="btn btn-dark btn-block" @click="doUpdate(blog_id)">更新</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        props: [
            'blog_id'
        ],
        mounted() {

            var url = '/api/detail/'+this.blog_id;
            axios.get(url)
            .then(response =>{
                this.title = response.data.title;
                this.cate_id = response.data.category_id;
                this.content = response.data.content;
            });

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
            doUpdate:function(id){
                // 更新処理
                var params = { 
                    id: id,
                    title: this.title,
                    content: this.content,
                    cate_id: this.cate_id
                };
                var url = '/api/updateBlog';
                axios.post( url, params )
                .then(function(response){
                    alert("更新しました");
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
