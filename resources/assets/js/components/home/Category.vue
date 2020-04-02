<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div>
                            <input type="text" v-model="name" class="catgory_name">&nbsp;
                            表示順<input type="text" v-model="order_num" class="catgory_order_num">&nbsp;
                            <input type="button" value="追加" v-on:click="add()">
                        </div>

                        <div style="margin-top:20px">
                        <category-form v-for="category in categories" :key="category.id" v-bind:category_id="category.id"></category-form>
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
                categories:[],
                name:'',
                order_num:''
            };
        },
        methods:{
            add:function(){
                if( (this.name != "") && (this.order_num != "") ){
                    // 追加処理
                    var params = { 
                        name: this.name,
                        order_num: this.order_num
                    };
                    var url = '/api/addCategory';
                    axios.post( url, params )
                    .then(function(response){
                        window.location = "/home/category";
                    })
                    .catch(function(error){
                        alert("error");
                    });
                }else{
                    alert("未入力です");
                }
            },
            
        },

        computed: {
            
        }
    }
</script>

<style scoped>
    .catgory_name{
        width:180px;
    }
    .catgory_order_num{
        width:40px;
    }
</style>
