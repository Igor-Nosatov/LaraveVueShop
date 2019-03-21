import Home from '../views/home/Home';
import Shop from '../views/shop/Shop';
import Category from '../views/shop/Category';
import Login from '../views/Login'
import Register from '../views/Register'
import SingleProduct from '../views/single_product/SingleProduct'
import Checkout from '../views/Checkout'
import Confirmation from '../views/Confirmation'
import Order from '../views/Order'

const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        path: '/shop',
        name: 'shop',
        component: Shop
    },
    {
        path: '/category/:id',
        name: 'category',
        component: Category
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/product/:id',
        name: 'single-products',
        component: SingleProduct
    },
    {
        path: '/confirmation',
        name: 'confirmation',
        component: Confirmation
    },
    {
        path: '/order',
        name: 'order',
        component: Order,

    },
    {
        path: '/checkout',
        name: 'checkout',
        component: Checkout,
        props: (route) => ({
            pid: route.query.pid
        })
    }

  ]

export default routes
