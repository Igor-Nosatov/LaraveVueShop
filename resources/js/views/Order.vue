<template>
<div>
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Orders</h1>
                    <nav class="d-flex align-items-center">
                        <router-link to="/" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                        <router-link to="/order" class="nav-link">Order</router-link>
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
                                <th scope="col">Order</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(order, index) in orders">
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img :src="order.image" :alt="order.name" class="img-fluid">
                                        </div>
                                        <div class="media-body">
                                            <p v-model="checkout.name">{{order.name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 v-model="checkout.price">${{order.price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" min="1" max="100" name="qty" id="sst" maxlength="12" v-model="order.qty" value="order.qty" title="Quantity:" class="input-text qty">
                                    </div>
                                </td>
                                <td>
                                    <h5 v-model="checkout.total">$ {{order.price * order.qty }} </h5>
                                </td>
                                <td>
                                    <button type="submit" class="primary-btn" @click="deleteOrder(order.id, index)">Delete Order</button>
                                </td>
                                <td>
                                    <a class="primary-btn" @click="Order(checkout)">Order</a>
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
                total: ''
            },
            orders: []
        }
    },
    methods: {
        fetchOrderProduct() {
            let url = `/api/order`;
            axios.get(url).then(response => {
                this.orders = response.data.orders;
            }).catch(error => {
                console.log(error)
            });
        },
        Order() {
        axios.post('api/products', this.product)
            .then(data => {
                this.product.name = '';
                this.product.description = '';
                this.product.price = '';
                this.product.image = '';
                alert('Product Added');
                this.getProducts();
            })
            .catch(err => console.log(err));
        },
        deleteOrder(id, index) {
            axios.delete('/api/order/delete/' + id).then(response => {
                console.log(response);
                this.orders.splice(index, 1)
            }).catch(error => {
                console.log(error)
            })
        }
    },
    computed: {
        total: function() {
            return this.orders.reduce((t, order) => t + order.price * order.qty, 0)
        }
    },
    mounted() {
        this.fetchOrderProduct();
    }
}
</script>
