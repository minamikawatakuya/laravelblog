<template>
    <div class="category_list">
        <input type="text" v-model="name" class="catgory_name">&nbsp;
        表示順<input type="text" v-model="order_num" class="catgory_order_num">&nbsp;
        <input type="button" value="更新" v-on:click="doUpdate(category_id)">&nbsp;
        <input type="button" value="削除" v-on:click="doDelete(category_id)">
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        props: [
            'category_id'
        ],
        mounted() {
            var url = '/api/category/'+this.category_id;
            axios.get(url)
            .then(response =>{
                this.name = response.data.name;
                this.order_num = response.data.order_num;
            });
        },
        data:function(){
            return {
                name:'',
                order_num:''
            };
        },
        methods:{
            doUpdate:function(id){

                //更新処理
                var params = { 
                    id: id,
                    name: this.name,
                    order_num: this.order_num
                };
                var url = '/api/updateCategory';
                axios.post( url, params )
                .then(function(response){
                    alert("更新しました");
                })
                .catch(function(error){
                    alert("error");
                });
            },

            doDelete:function(id){

                if( window.confirm('削除して宜しいですか？') ) {
                    // 削除処理
                    var params = { 
                        id: id
                    };
                    var url = '/api/deleteCategory';
                    axios.post( url, params )
                    .then(function(response){
                        window.location = "/home/category";
                    })
                    .catch(function(error){
                        alert("error");
                    });
                }
            },
            
        },

        computed: {
            
        }
    }
</script>

<style scoped>
    .category_list{
        margin-bottom:30px;
    }
    .catgory_name{
        width:180px;
    }
    .catgory_order_num{
        width:40px;
    }
</style>
