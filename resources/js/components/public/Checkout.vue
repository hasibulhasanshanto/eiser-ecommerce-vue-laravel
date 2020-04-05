<template>
  <div id="checkout">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Checkout</h2>
              <p>Please Register first or Log in with extisting account!</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="cart.html">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    <div class="container">
      <div class="row m-5">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3>Login extisting account!</h3>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <label for="emailAddress">Email address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="emailAddress" 
                    v-model="email"
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" v-model="password"/>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3>Register new account !</h3>
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="regisCustomer()">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="register.f_name" 
                  />
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input
                    type="text"
                    class="form-control" 
                    v-model="register.l_name"
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input
                    type="text"
                    class="form-control" 
                    v-model="register.email"
                  />
                </div>
                <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phoneNumber" 
                    v-model="register.phone"
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword2"  v-model="register.password"/>
                </div> 

                <div class="form-group">
                  <label for="address">Address</label> 
                  <textarea v-model="register.address" id="address" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "checkout",

  data(){
      return{
        register:{
            f_name:'',
            l_name:'',
            email:'',
            phone:'',
            password:'',
            address:''
        }
      }
     
  },
   methods: {
          regisCustomer(){
            axios.post("/register-customer/", this.register)
            .then((response)=> {
                console.log(response) 
            })
          }
      }
};
</script>


<style>
</style>