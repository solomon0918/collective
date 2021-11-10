export const category = {
    namespaced: true,
    state: { 
        categories: [],
        loading: false,
        error: ""
    },
    getters: {
        categories(state){
            return state.categories;
        },
        loading(state){
            return state.loading;
        },
        error(state){
            return state.error;
        }
    },
    mutations: {
        requestCategories(state){
            state.loading = true;
            state.categories = [];
            state.error = "";
        },
        successCategories(state, payload){
            state.categories = payload;
            state.loading = false;
        },
        failedCategories(state, payload){
            state.loading = false;
            state.error = payload;
        }
    },
    actions: {
        getCategories(context){
            return new Promise((res, rej) => {
                context.commit("requestCategories");
                axios.get("api/categories")
                    .then((response) => {
                        context.commit("successCategories", response.data.data);
                        res();
                    })
                    .catch((err) => {
                        context.commit("failedCategories", err);
                        rej();
                    });
            });          
        }
    }
}