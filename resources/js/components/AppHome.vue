<template>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand" href="/">WebDevBuddies</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'register' }">
                                Register
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'login' }">
                                Login
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <section class="section-1 hero">
            <div class="section-text">
                <h1>Some Stuff in Hurr</h1>
                <p>Hey! I like to type words right here it's pretty cool.</p>
                <button type="button" class="btn btn-light btn-lg">Get Started!</button>
            </div>
        </section>

        <section class="section-2">
            <div class="section-text">
                <h2>Is this more things? Down here?</h2>
            </div>
        </section>

        <section class="section-3">
            <div class="section-text">
                <h3>Is this... even more things?! Ah!</h3>
            </div>
        </section>
    </div>
</template>

<script>
    export default {

    }
</script>


<style lang="scss">
    header {
        .navbar-brand {
            font-size: 2em;
        }
        a {
            font-weight: bold;
            color: #fff;
            font-size: 1.1em;
            margin-right: 1em;
            &:hover {
                text-decoration: none;
            }
        }
    }
    section {
        text-align: center;
        height: 100vh;
        &.hero {
            background-image: url('~/images/nesa.jpg');
            background-repeat: no-repeat;
            background-position: center right;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        &.section-2 {
            background-color: lightblue;
        }
        &.section-3 {
            background-color: gray;
        }
        .section-text {
            position: relative;
            top: 50%;
        }
        h1 {
            font-size: 4em;
            color: #fff;
            text-shadow: 2px 2px #333;
        }
        p {
            font-size: 1.2em;
            color: #fff;
        }
    }
</style>
