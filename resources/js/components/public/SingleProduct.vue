<template>
  <div id="singleproduct">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Product Details</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="#">Home</a>
              <a href="#">Product Details</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                    <img src="/frontend/img/product/single-product/s-product-s-2.jpg" alt />
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1">
                    <img src="/frontend/img/product/single-product/s-product-s-3.jpg" alt />
                  </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2">
                    <img src="/frontend/img/product/single-product/s-product-s-4.jpg" alt />
                  </li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block w-100"
                      :src="`/storage/product/${get_SingleProduct.pro_image}`"
                      alt="First slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100"
                      src="/frontend/img/product/single-product/s-product-1.jpg"
                      alt="Second slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100"
                      src="/frontend/img/product/single-product/s-product-1.jpg"
                      alt="Third slide"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3>{{ get_SingleProduct.pro_name }}</h3>
              <h2>
                Tk .{{ get_SingleProduct.pro_price }}
                <del>{{ get_SingleProduct.pro_offprice }}</del>
              </h2>
              <ul class="list">
                <li>
                  <!-- <a class="active" href="#">
                    <span>Brand</span>
                    : {{ get_SingleProduct.brand.br_name }}
                  </a> -->                  
                  <router-link class="active" :to="`/brand-products/${get_SingleProduct.brand.id}`">
                  <span>Brand </span>
                  : {{  get_SingleProduct.brand.br_name }}
                  </router-link>
                </li>
                <li>
                  <!-- <a class="active" href="#">
                  : {{ get_SingleProduct.category.cat_name }}
                  </a> -->
                    
                    <router-link class="active" :to="`/category-product/${get_SingleProduct.category.id}`" >
                    <span>Category</span>
                      : {{ get_SingleProduct.category.cat_name }}
                    </router-link>
                  
                </li>
                <li>
                  <a href="#">
                    <span>Availibility</span>
                    : {{ get_SingleProduct.pro_qty }} In Stock
                  </a>
                </li>
              </ul>
              <p>{{ get_SingleProduct.short_desc }}</p>
              <form method="post" @submit.prevent="addToCart()">
                <div class="product_count">
                  <label for="qty">Quantity:</label>
                  <input
                    type="number"
                    name="qty"
                    maxlength="12"
                    min="1"
                    v-model="qty"
                    class="input-text qty input-qty"
                  />
                  <input type="hidden" name="id" v-model="get_SingleProduct.id" />
                </div>
                <div class="card_area">
                  <input type="submit" class="main_btn" value="Add to Cart" />
                  <a class="icon_btn" href="#">
                    <i class="lnr lnr lnr-diamond"></i>
                  </a>
                  <a class="icon_btn" href="#">
                    <i class="lnr lnr lnr-heart"></i>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link"
              id="home-tab"
              data-toggle="tab"
              href="#home"
              role="tab"
              aria-controls="home"
              aria-selected="true"
            >Description</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >Specification</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="contact-tab"
              data-toggle="tab"
              href="#contact"
              role="tab"
              aria-controls="contact"
              aria-selected="false"
            >Comments</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link active"
              id="review-tab"
              data-toggle="tab"
              href="#review"
              role="tab"
              aria-controls="review"
              aria-selected="false"
            >Reviews</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p v-html="get_SingleProduct.long_desc"></p>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5>Width</h5>
                    </td>
                    <td>
                      <h5>128mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Height</h5>
                    </td>
                    <td>
                      <h5>508mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Depth</h5>
                    </td>
                    <td>
                      <h5>85mm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Weight</h5>
                    </td>
                    <td>
                      <h5>52gm</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Quality checking</h5>
                    </td>
                    <td>
                      <h5>yes</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Freshness Duration</h5>
                    </td>
                    <td>
                      <h5>03days</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>When packeting</h5>
                    </td>
                    <td>
                      <h5>Without touch of hand</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Each Box contains</h5>
                    </td>
                    <td>
                      <h5>60pcs</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="comment_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-1.png" alt />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                  <div class="review_item reply">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-2.png" alt />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-3.png" alt />
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Post a comment</h4>
                  <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                  >
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="name"
                          placeholder="Your Full name"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email Address"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="number"
                          name="number"
                          placeholder="Phone Number"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          name="message"
                          id="message"
                          rows="1"
                          placeholder="Message"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show active"
            id="review"
            role="tabpanel"
            aria-labelledby="review-tab"
          >
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
                        <li>
                          <a href="#">
                            5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            4 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            3 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            2 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            1 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 01
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="review_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-1.png" alt />
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
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-2.png" alt />
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
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img src="/frontend/img/product/single-product/review-3.png" alt />
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
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
                  <h4>Add a Review</h4>
                  <p>Your Rating:</p>
                  <ul class="list">
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-star"></i>
                      </a>
                    </li>
                  </ul>
                  <p>Outstanding</p>
                  <form
                    class="row contact_form"
                    action="contact_process.php"
                    method="post"
                    id="contactForm"
                    novalidate="novalidate"
                  >
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="name"
                          placeholder="Your Full name"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email Address"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="number"
                          name="number"
                          placeholder="Phone Number"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea
                          class="form-control"
                          name="message"
                          id="message"
                          rows="1"
                          placeholder="Review"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Product Description Area =================-->
  </div>
</template>

<script>
export default {
  name: "singleproduct",

  data() {
    return {
      qty: "1",
      id: ""
    };
  },

  computed: {
    get_SingleProduct() {
      return this.$store.getters.getSingleProduct;
    }
  },

  methods: {
    getsingleproduct() {
      this.$store.dispatch("singleProductbyId", this.$route.params.id);
    },
    addToCart() {
      axios
        .post("/add-to-cart/", {
          qty: this.qty,
          id: this.get_SingleProduct.id
        })
        .then(response => {
          console.log(response.data);
          this.$router.push("/cart/");

          Toast.fire({
            icon: "success",
            title: "Added to cart successfully!"
          });
        });
    }
  },

  mounted() {
    this.getsingleproduct();
  },

  watch: {
    $route(to, form) {
      this.getsingleproduct();
    }
  }
};
</script>

<style>
.input-qty {
  width: 60px;
  float: right;
}
</style>