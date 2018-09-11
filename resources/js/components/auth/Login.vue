<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Login</h1>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, unable to sign in with those credentials.</p>
                    </div>
                    <form class="auth" autocomplete="off" @submit.prevent="login">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" v-model="password" required>
                        </div>
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                email: null,
                password: null,
                error: false
            }
        },
        mounted(){
            //
        },
        methods: {
            login(){
                var app = this
                this.$auth.login({
                    params: {
                        email: app.email,
                        password: app.password
                    },
                    success: function () {},
                    error: function (resp) {
                        alert(resp.response.data.msg)
                    },
                    rememberMe: true,
                    redirect: '/dashboard',
                    fetchUser: true,
                });
            },
        }
    }
</script>
