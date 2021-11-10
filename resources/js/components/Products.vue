<template>
    <b-container class="pt-2" fluid="sm">
        <b-skeleton-wrapper :loading="loading">
            <template #loading>
                <b-row>
                    <b-col lg="4" md="6" sm="12" v-for="i in 20" :key="i">
                        <b-card class="m-2">
                            <b-skeleton width="85%"></b-skeleton>
                            <hr/>
                            <b-skeleton width="55%"></b-skeleton>
                            <b-skeleton width="70%"></b-skeleton>
                            <b-skeleton width="25%"></b-skeleton>
                            <b-skeleton width="90%"></b-skeleton>
                            <template #footer>
                                <b-skeleton width="70%"></b-skeleton>
                            </template>
                        </b-card>
                    </b-col>
                </b-row>
            </template>

            <b-row>
                <b-col col lg="4" md="6" sm="12" class="d-flex" v-for="product in products.data" :key="product.id">
                    <b-card class="m-2 flex-fill">
                        <b-card-text>
                            <small id="productCategory">{{ product.category.name }}</small>
                            <p>
                                <span id="productName">{{ product.name }}</span> 
                                <small id="productPrice" class="float-right">${{ product.price }}</small>
                            </p>
                        </b-card-text>
                        <hr/>

                        <b-card-text>
                            {{ product.description }}
                        </b-card-text>
                        
                        <template #footer>
                            <span id="productAvailable" class="float-right">
                                {{ availability(product.available) }}
                            </span>
                        </template>
                    </b-card>
                </b-col>
            </b-row>
        </b-skeleton-wrapper>
        <b-row>
            <b-col class="m-2">
                <b-pagination
                    @change="onPageChanged"
                    v-model="products.current_page"
                    :total-rows="products.total"
                    :per-page="products.per_page"
                    :disabled="loading"
                    pills
                ></b-pagination>
            </b-col>
        </b-row>
    </b-container>
    
</template>

<script>
    export default {
        name: "Products",
        data() {
            return {
                
            }
        },
        mounted () {
            this.$store.dispatch("vxProduct/getProducts");
        },
        methods: {
            onPageChanged(to) {
                let tempFilters = this.filters != "" ? `${this.filters}&page=${to}` : `page=${to}`;
                this.$store.dispatch("vxProduct/getProducts", tempFilters);
            },
            availability(flag) {
                return flag == 1 ? "Available" : "Not Available";
            }
        },
        computed: {
            products() {
                return this.$store.getters["vxProduct/products"]; 
            },
            loading() {
                return this.$store.getters["vxProduct/loading"];
            },
            error() {
                return this.$store.getters["vxProduct/error"];
            },
            filters() {
                return this.$store.getters["vxProduct/filters"];
            }
        },
    }
</script>

<style scoped>
    .col {
        flex-basis: content !important;
    }

    #productName{
        font-size: 20px;
        font-weight: 700;
        padding-left: 3px;
    }

    #productPrice{
        font-weight: 700;
        background-color: rgb(88, 61, 185);
        padding: 5px;
        color: white;
        border-radius: 8px;
    }

    #productCategory{
        font-weight: 500;
        background-color: rgb(207, 46, 46);
        padding: 5px 10px;
        color: white;
        border-radius: 8px;
        letter-spacing: .2em;
    }

    #productAvailable{
        font-weight: 500;
        border: 1px solid rgb(46, 148, 207);
        padding: 5px 10px;
        border-radius: 8px;
        letter-spacing: 1px;
    }
</style>