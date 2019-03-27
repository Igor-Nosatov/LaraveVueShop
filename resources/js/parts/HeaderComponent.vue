<template>
<div>
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <router-link to="/" class="nav-link"><img src="img/logo.png" alt=""></router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active">
                                <router-link to="/" class="nav-link">Home</router-link>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <router-link to="/shop" class="nav-link">Shop</router-link>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <router-link to="/cart" class="nav-link">Cart</router-link>
                            </li>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <router-link :to="{ name: 'login' }" class="nav-link text-uppercase text-dark" v-if="!isLoggedIn">Login</router-link>
                                    <router-link :to="{ name: 'register' }" class="nav-link text-uppercase text-dark" v-if="!isLoggedIn">Register</router-link>
                                    <span v-if="isLoggedIn">
                                        <router-link :to="{ name: 'userboard' }" class="nav-link text-uppercase text-dark" v-if="user_type == 0"> Hi, {{name}}</router-link>
                                        <router-link :to="{ name: 'admin' }" class="nav-link text-uppercase text-dark" v-if="user_type == 1"> Hi, {{name}}</router-link>
                                    </span>
                                    <li class="nav-link text-uppercase" v-if="isLoggedIn" @click="logout"> Logout</li>
                                </ul>
                            </div>
                            <li class="nav-item ">
                                <router-link to="/contact" class="text-uppercase text-dark">Contact</router-link>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <router-link to="/cart" class="nav-link"><span class="ti-bag"></span></router-link>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <router-link to="/wishlist" class="nav-link"><span class=" ti-heart"></span></router-link>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            user_type: 0,
            isLoggedIn: localStorage.getItem('jwt') != null
        }
    },
    mounted() {
        this.setDefaults()
    },
    methods: {
        setDefaults() {
            if (this.isLoggedIn) {
                let user = JSON.parse(localStorage.getItem('user'))
                this.name = user.name
                this.user_type = user.is_admin
            }
        },
        change() {
            this.isLoggedIn = localStorage.getItem('jwt') != null
            this.setDefaults()
        },
        logout() {
            localStorage.removeItem('jwt')
            localStorage.removeItem('user')
            this.change()
            this.$router.push('/')
        }
    }
}
</script>
