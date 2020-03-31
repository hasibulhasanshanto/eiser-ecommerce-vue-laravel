import AdminHomeComponent from './components/public/Home';
import ShopComponent from './components/public/Shop';
import BlogComponent from './components/public/Blog';
import TrackOrderComponent from './components/public/Track';
import ContactComponent from './components/public/Contact';
import SingleProductComponent from './components/public/SingleProduct';


export const routes = [
    {
        path: '/',
        component: AdminHomeComponent
    }, 
    {
        path: '/shop',
        component: ShopComponent
    }, 
    {
        path: '/blog',
        component: BlogComponent
    }, 
    {
        path: '/track',
        component: TrackOrderComponent
    },
    {
        path: '/contact',
        component: ContactComponent
    }, 
    {
        path: '/single-product/:id',
        component: SingleProductComponent
    }, 
]