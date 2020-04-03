<template>
  <div id="shop">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Shop Category</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="#">Home</a>
              <a href="#">Shop</a>
              <a href="#">Shop Category</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
                <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select>
              </div>
            </div>

            <div class="latest_product_inner">
              <div class="row">
                <div class="col-lg-4 col-md-6" v-for="shopProduct in getShopProduct" :key>
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        :src="`storage/product/${shopProduct.pro_image}`"
                        alt
                        width="255"
                        height="255"
                      />
                      <div class="p_icon">
                        <router-link :to="`single-product/${shopProduct.id}`">
                          <i class="ti-eye"></i>
                        </router-link>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <router-link :to="`single-product/${shopProduct.id}`" class="d-block">
                        <h4>{{ shopProduct.pro_name }}</h4>
                      </router-link>
                      <div class="mt-3">
                        <span class="mr-4">Tk. {{ shopProduct.pro_price }}</span>
                        <del>Tk. {{ shopProduct.pro_offprice }}</del>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li v-for="shopCategory in getShopCategory" :key>
                      <router-link :to="`/category-product/${shopCategory.id}`" >
                      {{ shopCategory.cat_name }}</router-link>
                    </li>
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Product Brand</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li v-for="shopBrands in getShopBrands" :key>
                      <router-link :to="`/brand-products/${shopBrands.id}`">{{ shopBrands.br_name }}</router-link>
                    </li>
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Color Filter</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li>
                      <a href="#">Black</a>
                    </li>
                    <li>
                      <a href="#">Black Leather</a>
                    </li>
                    <li class="active">
                      <a href="#">Black with red</a>
                    </li>
                    <li>
                      <a href="#">Gold</a>
                    </li>
                    <li>
                      <a href="#">Spacegrey</a>
                    </li>
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Price Filter</h3>
                </div>
                <div class="widgets_inner">
                  <div class="range_item">
                    <div id="slider-range"></div>
                    <div class>
                      <label for="amount">Price :</label>
                      <input type="text" id="amount" readonly />
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->
  </div>
</template>

<script>
  export default {
    name: "shop",

    mounted() {
      this.$store.dispatch("allShopProduct"),
        this.$store.dispatch("allShopCategory"),
        this.$store.dispatch("allShopBrands");
    },

    computed: {
      getShopProduct() {
        return this.$store.getters.getAllProducts;
      },
      getShopCategory() {
        return this.$store.getters.getAllCategory;
      },
      getShopBrands() {
        return this.$store.getters.getAllBrands;
      }
    }
    
  };
</script>

<style>

</style>