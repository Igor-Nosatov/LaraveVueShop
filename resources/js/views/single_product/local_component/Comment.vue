<template>
    <div class="row">
      <div class="col-lg-6">
        <div class="comment_list">
          <div class="review_item">
            <div class="media">
              <div class="d-flex">
                <img src="img/product/review-1.png" alt="">
              </div>
              <div class="media-body">
                <h4>Blake Ruiz</h4>
                <h5>12th Feb, 2018 at 05:56 pm</h5>
                <a class="reply_btn" href="#">Reply</a>
              </div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo</p>
          </div>
          <div class="review_item reply">
            <div class="media">
              <div class="d-flex">
                <img src="img/product/review-2.png" alt="">
              </div>
              <div class="media-body">
                <h4>Blake Ruiz</h4>
                <h5>12th Feb, 2018 at 05:56 pm</h5>
                <a class="reply_btn" href="#">Reply</a>
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
                <h5>12th Feb, 2018 at 05:56 pm</h5>
                <a class="reply_btn" href="#">Reply</a>
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
          <h4>Post a comment</h4>
          <form class="row contact_form"  novalidate="novalidate">
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
              <button class="btn primary-btn"  @click="addComment(comment)">Submit Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
export default{
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
        axios.post('/api/product/comment/add', {
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
    }
}
}
</script>
