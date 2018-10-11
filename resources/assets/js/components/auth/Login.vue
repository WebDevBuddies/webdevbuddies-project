<template>
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">

                            <div class="alert alert-danger" v-if="error">
                                {{ error }}
                            </div>

                            <form id="login_form" role="form" @submit.prevent="onSubmit">

                                <div class="form-group" :class="{ 'has-error': errors.email }">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" v-model.trim="form.email" required autofocus>
                                        <div class="help-block" v-if="errors.email">
                                            <div v-for="error in errors.email"><strong>{{ error }}</strong></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" :class="{ 'has-error': errors.password }">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" v-model.trim="form.password" required>
                                        <div class="help-block" v-if="errors.password">
                                            <div v-for="error in errors.password"><strong>{{ error }}</strong></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <div class="col-md-8">
                                        <input type="checkbox" id="remember" class="form-check-input" name="remember">
                                        <label class="form-check-label" for="remember">Remember</label><br /><br />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">Login</button>&nbsp;&nbsp;
                                        <router-link :to="{ name: 'register' }">No account? Register here!</router-link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        data () {
            return {
                form: {
                    email: '',
                    password: '',
                },
                error: '',
                errors: {},
            }
        },
        computed: {
            ...mapState({
                me: state => state.auth.me,
            })
        },
        methods: {
            ...mapActions([
                'login',
                'addToastMessage',
            ]),
            onSubmit () {
                this.errors = {}
                this.login(this.form)
                .then(() => {
                    this.addToastMessage({
                        text: 'You logged in!',
                        type: 'success'
                    })
                    this.$router.push('/dashboard')
                })
                .catch((data) => {
                    this.error = data.message
                    this.errors = data.errors || {}
                })
            },
        }
    }
</script>
