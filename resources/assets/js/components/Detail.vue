<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="blog_title">{{title}} ({{cate_name}})</div>
                        <div class="blog_content">
                            <p v-text="content"></p>
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
        props: [
            'blog_id'
        ],
        mounted() {
            //let params = new URLSearchParams();
			//params.append('id', this.blog_id);
            var url = '/api/detail/'+this.blog_id;
            //axios.get(url, params)
            axios.get(url)
            .then(response =>{
                this.title = response.data.title;
                this.cate_name = response.data.cate_name;
                this.content = response.data.content;
            });
        },
        data:function(){
            return {
                title:'',
                cate_name:'',
                content:''
            };
        },
        methods:{
            
        },

        computed: {
            
        }
    }
</script>

<style scoped>
.blog_title{
    font-size:16px;
}
.blog_content{
    margin-top:20px;
    word-break: break-all;
    white-space: pre-wrap;
}
</style>
