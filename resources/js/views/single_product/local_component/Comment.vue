<template>
<div class="row">
    <div class="col-lg-6">
        <div class="comment_list">





            <div class="review_item" v-for="category in categories">
                <div class="media">
                    <div class="media-body">
                        <h4></h4>
                    </div>
                </div>
                <p>{{}}</p>
            </div>


        </div>
    </div>
    <div class="col-lg-6">
        <div class="review_box">
            <h4>Post a comment</h4>
            <form class="row contact_form" novalidate="novalidate">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="comment.name" placeholder="Your Full name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" v-model="comment.email" placeholder="Email Address">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="comment.phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" v-model="comment.message" rows="1" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button class="btn primary-btn" @click="addComment(comment)">Submit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['text'],
    data() {
        return {
            comment: {
                name: '',
                email: '',
                phone: '',
                message: ''
            }
        }
    },
    methods: {
        addComment(comment) {
            let url = `/api/product/comment/add`
            axios.post(url, {
                name: comment.name,
                email: comment.email,
                phone: comment.phone,
                message: comment.message,
                product_id: this.text.id
            }).then(response => {
                console.log(response)
                this.name = '',
                    this.phone = '',
                    this.email = '',
                    this.messsage = '',
                    this.product_id = ''
            }).catch(error => {
                console.log(error)
            })
        },
        fetchComment() {
            let url = `/api/product/comment`
            axios.get(url).then(response => {
                this.name = response.data.name;
                this.phone = response.data.categories;
                this.email = response.data.colors;
                this.messsage = response.data.brands;
            }).catch(error => {
                console.log(error)
            });
        },
    }
}
</script>
