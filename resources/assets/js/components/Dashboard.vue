<template>
    <div>
        <nav class="navbar navbar-dark bg-dark fixed-top flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">WebDevBuddies</a>
            <ul class="nav navbar-nav px-3" v-if="me">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ me.name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <router-link tag="li" to="/profile" active-class="active"><a>Profile</a></router-link>
                        <router-link tag="li" to="/logout" active-class="active"><a>Logout</a></router-link>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <span data-feather="home"></span>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file"></span>
                                    Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="resources"></span>
                                    Resources
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        data () {
            return {
                //
            }
        },
        mounted () {
            // this.loadDashboard()
        },
        computed: {
            ...mapState({
                me: state => state.auth.me,
                // dashboard: state => state.general.dashboard,
            }),
        },
        methods: {
            ...mapActions([
                // 'loadDashboard',
                'storeProject',
                'addToastMessage',
            ]),
            onSubmit (form) {
                this.storeEntry(form)
                .then(() => {
                    // this.loadDashboard()
                    this.addToastMessage({
                        text: 'New project was added!',
                        type: 'success'
                    })
                    // this.project = {
                    //
                    // }
                    this.errors = {}
                })
                .catch((data) => {
                    this.errors = data.errors || {}
                })
            },
        }
    }
</script>

<style lang="scss">
    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /*
    * Sidebar
    */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /*
    * Content
    */

    [role="main"] {
        padding-top: 48px; /* Space for fixed navbar */
    }

    /*
    * Navbar
    */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }
</style>
