<template>
<div>
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>cart</h1>
                    <nav class="d-flex align-items-center">
                        <router-link to="/" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                        <router-link to="/cart" class="nav-link">cart</router-link>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                                <th scope="col">cart</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(cart, index) in cart">
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img :src="cart.image" :alt="cart.name" class="img-fluid">
                                        </div>
                                        <div class="media-body">
                                            <p>{{cart.name}}</p>
                                            <input type="hidden" :value="cart.name" v-model="cart.name">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{cart.price}}</h5>
                                    <input type="hidden" :value="cart.price" v-model="cart.price">
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" min="1" max="100" name="qty" id="sst" maxlength="12" v-model="cart.qty" value="cart.qty" title="Quantity:" class="input-text qty">
                                    </div>
                                </td>
                                <td>
                                    <h5>$ {{cart.price * cart.qty }} </h5>
                                </td>
                                <td>
                                    <button type="submit" class="primary-btn" @click="deletecart(cart.id, index)">Delete cart</button>
                                </td>
                                <td>
                                    <a class="primary-btn" @click="addToOrder()">cart</a>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5 class="black">Subtotal</h5>
                                </td>
                                <td>
                                    <h5 class="black">{{total}}</h5>
                                </td>
                            </tr>

                            <tr class="out_button_area">
                                <td>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <router-link to="/shop" class="primary-btn">Shop</router-link>
                                        <router-link to="/checkout" class="primary-btn">Checkout</router-link>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</template>


<script>
export default {
    data() {
        return {
            checkout: {
                name: '',
                qty: '',
                price: ''
            },
            cart: []
        }
    },
    methods: {
        fetchCart() {
            let url = `/api/cart`;
            axios.get(url).then(response => {
                this.cart = response.data.cart;
            }).catch(error => {
                console.log(error)
            });
        },
        addToOrder() {
            axios.post('/api/order/add', {
                name: cart.name,
                price: cart.price,
                qty: cart.qty
            }).then(response => {
                console.log(response)
                this.name = ''
                this.price = ''
                this.qty = ''
            }).catch(error => {
                console.log(error)
            })
        },
        deleteCart(id, index) {
            axios.delete('/api/cart/delete/' + id).then(response => {
                console.log(response);
                this.cart.splice(index, 1)
            }).catch(error => {
                console.log(error)
            })
        }
    },
    computed: {
        total() {
            return this.cart.reduce((t, cart) => t + cart.price * cart.qty, 0)
        }
    },
    mounted() {
        this.fetchCart();
    }
}
</script>
