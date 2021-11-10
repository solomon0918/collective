import { product } from "./stores/product";
import { category } from "./stores/category";

export default{
    modules: {
        vxProduct: product,
        vxCategory: category
    },
    state: {
        
    },
    getters: {
        mobile(state){
            if( screen.width <= 760 ) {
                return false;
            }
            else {
                return true;
            }
        }
    },
    mutations: {
        
    },
    actions: {
        
    }
}