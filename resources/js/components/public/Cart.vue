<template>
  <div id="cart">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="/">Home</a>
              <a href="/cart">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">
                    Total
                    <span class="total">{{ sum = 0 }} {{ total = 0 }}</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="cartProduct in showCartProduct" :key>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img
                          :src="`/storage/product/${cartProduct.options.image}`"
                          alt
                          width="70"
                          height="70"
                        />
                      </div>
                      <div class="media-body">
                        <p>{{ cartProduct.name }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>Tk. {{ cartProduct.price }}</h5>
                  </td>
                  <td>
                    <form method="post" @submit.prevent="updateCart()">
                      <div class="product_count">
                        <input
                          type="number"
                          name="qty" 
                          min="1"
                          maxlength="12"
                          v-model="cartProduct.qty" 
                          class="input-text qty input-qty"
                        />
                      </div>
                    </form>
                  </td>
                  <td>
                    <h5>Tk.{{ total = cartProduct.price*cartProduct.qty }}</h5>
                  </td>
                  <span class="total">{{ sum = sum+total }}</span>
                  <td>
                    <button
                      class="btn btn-danger btn-sm"
                      @click.prevent="deleteCart(cartProduct.rowId)"
                    >X</button>
                  </td>
                </tr>
                <tr class="bottom_button">
                  <td>
                    <button
                      class="gray_btn"
                      @submit.prevent="updateCart()"
                    >Update Cart</button>
                    <!-- <a class="gray_btn" href="#">Update Cart</a> -->
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                      <input type="text" placeholder="Coupon Code" />
                      <a class="main_btn" href="#">Apply</a>
                    </div>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                      <ul class="list">
                        <li class="active">
                          <a href="#">Free Shipping</a>
                        </li>
                        <li>
                          <a href="#">Delivery in Dhaka: Tk. 60</a>
                        </li>
                        <li>
                          <a href="#">Flat Rate: Tk. 100</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Discount</h5>
                  </td>
                  <td>
                    <h5>Tk. 0</h5>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>Tk.{{ sum }}</h5>
                  </td>
                </tr>

                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="/">Continue Shopping</a>
                      <a href="/checkout" class="main_btn">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->
  </div>
</template>

<script>
  export default {
    name: "cart",

    data() {
      return {
        qty: "",
        rowId: ""
      };
    },

    mounted() {
      this.$store.dispatch("showCartProducts");
    },

    computed: {
      showCartProduct() {
        return this.$store.getters.getCartProduct;
      }
    },
    methods: {
      deleteCart(rowId) {
        axios.get("/delete-cart/" + rowId).then(response => {
          //console.log(response.data.cartDelete)
          this.$store.dispatch("showCartProducts");
        });
      },
      updateCart() {
        axios
          .post("`/update-cart/${this.$route.params.rowId}`")
          .then(response => {
            //console.log(response.data);
            this.$router.push("/cart");
            this.$store.dispatch("showCartProducts");
          });
      }
    },
    watch: {
      $click(to, from) {
        this.deleteCart();
        this.updateCart();
      }
    }
  };
</script>

<style>
  .total {
    visibility: hidden;
    overflow: hidden;
    margin-left: -120px;
  }
  .input-qty {
  width: 60px;
  float: right
}
</style>
