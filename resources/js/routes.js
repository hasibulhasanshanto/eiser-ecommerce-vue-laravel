import AdminHomeComponent from "./components/public/Home";
import ShopComponent from "./components/public/Shop";
import BlogComponent from "./components/public/Blog";
import TrackOrderComponent from "./components/public/Track";
import ContactComponent from "./components/public/Contact";
import SingleProductComponent from "./components/public/SingleProduct";
import CategoryProductComponent from "./components/public/CategoryProduct";
import BrandProductComponent from "./components/public/BrandProduct";
import CartComponent from "./components/public/Cart";
// import CheckoutComponent from "./components/public/Checkout";

export const routes = [
    {
        path: "/",
        component: AdminHomeComponent
    },
    {
        path: "/shop",
        component: ShopComponent
    },
    {
        path: "/blog",
        component: BlogComponent
    },
    {
        path: "/track",
        component: TrackOrderComponent
    },
    {
        path: "/contact",
        component: ContactComponent
    },
    {
        path: "/single-product/:id",
        component: SingleProductComponent
    },
    {
        path: "/category-product/:id",
        component: CategoryProductComponent
    },
    {
        path: "/brand-products/:id",
        component: BrandProductComponent
    },
    {
        path: "/cart/",
        component: CartComponent
    },
    // {
    //     path: "/checkout/",
    //     component: CheckoutComponent
    // }
];
