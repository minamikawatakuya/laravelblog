<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <ul class="cate">
                            <li><a href="/home">すべて({{blog_all_num}})</a></li>
                            <li v-for="category in categories" :key="category.id"><a v-on:click="selectCate(category.id)">{{category.name}}({{category.blog_num}})</a></li>
                        </ul>

                        <table>
                            <tr v-for="blog in blogs" :key="blog.id">
                                <td><a v-on:click="toDetail(blog.id)">{{blog.title}} ({{blog.cate_name}})</a></td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="pagination">
                                <li :class="{disabled: current_page <= 1}"><a href="#" @click="change(1)">&laquo;</a></li>
                                <li :class="{disabled: current_page <= 1}"><a href="#" @click="change(current_page - 1)">&lt;</a></li>
                                <li v-for="page in pages" :key="page" :class="{active: page === current_page}">
                                    <a href="#" @click="change(page)">{{page}}</a>
                                </li>
                                <li :class="{disabled: current_page >= last_page}"><a href="#" @click="change(current_page + 1)">&gt;</a></li>
                                <li :class="{disabled: current_page >= last_page}"><a href="#" @click="change(last_page)">&raquo;</a></li>
                                </ul>
                            </div>
                            <div style="margin-top: 40px" class="col-sm-6 text-right">全 {{total}} 件中 {{from}} 〜 {{to}} 件表示</div>
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
        props: ['cate_id'],
        mounted() {

            axios.get('/api/categories')
            .then(response =>{
                this.categories = response.data;
            });

            axios.get('/api/blogAllNum')
            .then(response =>{
                this.blog_all_num = response.data;
            });

            var page = '1';
            var cate_id = this.cate_id;
            this.load( page, cate_id );
        },
        data:function(){
            return {
                blogs:[],
                categories:[],
                blog_all_num:'',
                current_page: 1,
                last_page: 1,
                total: 1,
                from: 0,
                to: 0
            };
        },
        methods:{
            toDetail:function(id){
                window.location = "/home/detail/"+id+"/";
            },

            selectCate(id){
                window.location = "/home/"+id+"/";
            },

            load( page, cate_id ) {
                axios.get('/api/blogs/'+cate_id+'/?page=' + page).then(({data}) => {
                    this.blogs = data.data
                    this.current_page = data.current_page
                    this.last_page = data.last_page
                    this.total = data.total
                    this.from = data.from
                    this.to = data.to
                })
            },
            change(page) {
                if (page >= 1 && page <= this.last_page) this.load( page, this.cate_id )
            }
        },

        computed: {
            pages() {
                let start = _.max([this.current_page - 2, 1])
                let end = _.min([start + 5, this.last_page + 1])
                start = _.max([end - 5, 1])
                return _.range(start, end)
            },
        }
    }
</script>

<style scoped>
ul.cate li{
    display:inline;
    padding-right:10px;
}
table tr td{
    padding:10px;
}
</style>
