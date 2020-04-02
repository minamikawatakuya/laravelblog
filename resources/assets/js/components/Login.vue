<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h4>ログイン</h4>
                    <br>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="email">
                        <div class="alert alert-danger" v-text="errors.email" v-if="errors.email"></div>
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" class="form-control" v-model="password">
                        <div class="alert alert-danger" v-text="errors.password" v-if="errors.password"></div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" v-model="remember"> 次回から省略
                        </label>
                    </div>
                    <div class="form-group">
                        <button style="background:#000;color:#fff;" type="button" class="btn btn-dark btn-block" @click="login">ログイン</button>
                    </div>

                    <div style="margin-top:20px">
                    以下でログインできます。<br>
                    hoge@gmail.com<br>
                    hogepass
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
            
        },
        data:function(){
            return {
                email: '',
                password: '',
                remember: false,
                errors: {}    
            };
        },
        methods:{
            login: function(){
                this.errors = {};
                var self = this;
                var url = '/login';
                var params = {
                    email: this.email,
                    password: this.password,
                    remember: this.remember
                };
                axios.post(url, params)
                .then(function(response){
                    location.href = '/home';
                })
                .catch(function(error){
                    //console.log(JSON.stringify(error));
                    var responseErrors = error.response.data;
                    var errors = {};
                    for(var key in responseErrors) {
                        errors[key] = responseErrors[key][0];
                    }
                    self.errors = errors;
                });
            }
        }
    }
</script>

<style scoped>

</style>
