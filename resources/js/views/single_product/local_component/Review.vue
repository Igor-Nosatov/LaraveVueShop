<template>
<div class="row">
    <div class="col-lg-6">
        <div class="row total_rate">
            <div class="col-6">
                <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                        <li><a >5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a >4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a >3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a >2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a >1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="review_list">
            <div class="review_item">
                <div class="media">
                    <div class="d-flex">
                        <img src="img/product/review-1.png" alt="">
                    </div>
                    <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo</p>
            </div>
            <div class="review_item">
                <div class="media">
                    <div class="d-flex">
                        <img src="img/product/review-2.png" alt="">
                    </div>
                    <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo</p>
            </div>
            <div class="review_item">
                <div class="media">
                    <div class="d-flex">
                        <img src="img/product/review-3.png" alt="">
                    </div>
                    <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="review_box">
            <form class="row contact_form" novalidate="novalidate">
                <h4>Add a Review</h4>
                <div class="col-md-12">

                            <input type="radio"  v-model="review.star"  value="1"/>
                            <input type="radio"  v-model="review.star"  value="2"/>
                            <input type="radio"  v-model="review.star"  value="3"/>
                            <input type="radio"  v-model="review.star"  value="4"/>
                            <input type="radio"  v-model="review.star"  value="5"/>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="review.name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" v-model="review.email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="review.phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" v-model="review.message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button  class="primary-btn" @click="addReview(review)">Submit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['review_product'],
    data() {
        return {
            review: {
                star: '',
                name: '',
                email: '',
                phone: '',
                message: ''
            }
        }
    },
    methods: {
        addReview(review) {
            axios.post('/api/product/review/add', {
                star: review.star,
                name: review.name,
                phone: review.phone,
                email: review.email,
                message: review.message,
                product_id: this.review_product.id

            }).then(response => {
                console.log(response)
                this.star = ''
                this.name = ''
                this.phone = ''
                this.email = ''
                this.messsage = ''
                this.product_id = ''

            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
