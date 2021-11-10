export const product = {
    namespaced: true,
    state: { 
        products: [],
        loading: false,
        filters: "",
        error: ""
    },
    getters: {
        products(state){
            return state.products;
        },
        loading(state){
            return state.loading;
        },
        error(state){
            return state.error;
        },
        filters(state){
            return state.filters;
        }
    },
    mutations: {
        requestProducts(state, payload){
            state.loading = true;
            state.filters = payload;
        },
        successProducts(state, payload){
            state.products = payload;
            state.loading = false;
        },
        failedProducts(state, payload){
            state.loading = false;
            state.error = payload;
        }
    },
    actions: {
        getProducts(context, payload = ""){
            return new Promise((res, rej) => {
                context.commit("requestProducts", payload);
                axios.get("api/products?" + payload)
                    .then((response) => {
                        context.commit("successProducts", response.data.data);
                        res();
                    })
                    .catch((err) => {
                        context.commit("failedProducts", err);
                        rej();
                    });
            });          
        }
    }
}