<template>
    <div>
      <header-component></header-component>
       <router-view :key="$route.fullPath"  @loggedIn="change"></router-view>
       <footer-component></footer-component>
    </div>
</template>


<script>
      export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('shop.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('shop.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('shop.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('shop.jwt')
                localStorage.removeItem('shop.user')
                this.change()
                this.$router.push('/')
            }
        }
    }

</script>
