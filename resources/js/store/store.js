import Axios from "axios"

export default {
    state: {
        featured_products: [],
        new_products: [],
        inspire_products: [],
        show_products: [],
        show_category: [],
        show_brand: [],
        single_product: [],
    },

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
    }, 

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
        
    },

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
        }
    }
}