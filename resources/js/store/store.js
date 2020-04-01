import Axios from "axios"

export default {

    // Start State Area
    state: {
        featured_products: [],
        new_products: [],
        inspire_products: [],
        show_products: [],
        show_category: [],
        show_brand: [],
        single_product: [],
        category_product: [],
        brand_product: []
    },


    // Start Getters Area
    getters: {
        getProducts(state) {
            return state.featured_products
        },
        getNewProducts(state) {
            return state.new_products
        },
        getInspireProducts(state) {
            return state.inspire_products
        },
        getAllProducts(state) {
            return state.show_products
        },
        getAllCategory(state) {
            return state.show_category
        },
        getAllBrands(state) {
            return state.show_brand
        }, 
        getSingleProduct(state) {
            return state.single_product
        },
        getCategoryProduct(state) {
            return state.category_product
        },
        getBrandProduct(state) {
            return state.brand_product
        }
    }, 

    // Start Actions Area
    actions: {
        allFeaturesProduct(context){
            axios.get('/features-product')
                .then((response) => {
                    //console.log(response.data.featured)
                    context.commit('featuredProducts', response.data.featured)
            })
        },
        allNewProduct(context){
            axios.get('/new-products')
                .then((response) => { 
                    context.commit('NewProducts', response.data.newProduct)
            })
        },
        allInspireProduct(context){
            axios.get('/inspire-products')
                .then((response) => { 
                    context.commit('InspireProducts', response.data.inspireProduct)
            })
        },

        allShopProduct(context){
            axios.get('/all-products')
                .then((response) => { 
                    context.commit('allProducts', response.data.allProduct)
            })
        },
        allShopCategory(context){
            axios.get('/all-category')
                .then((response) => { 
                    context.commit('allCategory', response.data.allCategory)
            })
        },
        allShopBrands(context){
            axios.get('/all-brands')
                .then((response) => { 
                    context.commit('allBrands', response.data.allBrand)
            })
        },
        singleProductbyId(context, payload){
            axios.get('/show-single-product/' +payload)
                .then((response) => { 
                    //console.log(response.data.singleProduct)
                    context.commit('singleProduct', response.data.singleProduct)
            })
        },
        allProductsByCatId(context, payload){
            axios.get('/category-wise-product/' +payload)
                .then((response) => {  
                    context.commit('productsByCatId', response.data.catProducts)
            })
        },
        allProductsByBrandId(context, payload){
            axios.get('/brand-wise-product/' +payload)
                .then((response) => {  
                    context.commit('productsByBrand', response.data.brandProducts)
            })
        }
        

    },

    // Start Mutation Area
    mutations: {
        featuredProducts(state, data) {
            return state.featured_products = data;
        },

        NewProducts(state, data) {
            return state.new_products = data;
        },
        InspireProducts(state, data) {
            return state.inspire_products = data;
        },
        allProducts(state, data) {
            return state.show_products = data;
        },
        allCategory(state, data) {
            return state.show_category = data;
        
        },
        allBrands(state, data) {
            return state.show_brand = data;
        
        },
        singleProduct(state, data) {
            return state.single_product = data;
        },
        productsByCatId(state, data) {
            return state.category_product = data;
        },
        productsByBrand(state, data) {
            return state.brand_product = data;
        }

    
    }
}