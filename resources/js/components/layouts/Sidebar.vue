<template>
  <div>
    <b-sidebar id="collectiveSidebar" title="Sidebar" shadow :visible="mobile" no-header>
        <template #footer="{ hide }">
        <div class="d-flex bg-dark text-light align-items-center px-3 py-2">
            <strong class="mr-auto">Collective Test</strong>
            <b-button v-if="!mobile" size="sm" @click="hide">Hide</b-button>
        </div>
        </template>
        <div class="px-3 py-2">
            <h4 id="sidebar-no-header-title">Products</h4>
            <hr/>
            <b-container>
                <b-form>
                    <b-form-group
                        label="Price Range"
                        label-for="priceRange"
                    >
                        <b-row>
                            <b-col cols="6">
                                <b-form-spinbutton id="priceRange" v-model="filter.price.min" inline></b-form-spinbutton>
                            </b-col>
                            <b-col cols="6">
                                <b-form-spinbutton id="priceRange" v-model="filter.price.max" inline></b-form-spinbutton>
                            </b-col>
                        </b-row>
                    </b-form-group>
                    <b-form-group
                        label="Category Picker"
                        label-for="categoryPicker"
                    >
                        <b-row>
                            <b-col>
                                <b-form-select v-model="filter.category" :options="categories" value-field="id" text-field="name"></b-form-select>
                            </b-col>
                        </b-row>
                    </b-form-group>

                    <b-form-group
                        label=""
                    >
                        <b-row>
                            <b-col>
                                <b-form-checkbox
                                    id="availability"
                                    v-model="filter.availability"
                                    name="availability"
                                    value="1"
                                    unchecked-value="0"
                                >
                                Availability
                                </b-form-checkbox>
                            </b-col>
                        </b-row>
                    </b-form-group>

                    <b-button variant="outline-primary" @click="applyFilter">Apply</b-button>
                </b-form>
            </b-container>
        </div>
    </b-sidebar>
  </div>
</template>

<script>
    export default {
        name: "Sidebar",
        mounted () {
            this.$store.dispatch("vxCategory/getCategories");
        },
        data() {
            return {
                filter: {
                    price: {
                        min: 1,
                        max: 100
                    },
                    category: -1,
                    availability: 1
                }
            }
        },
        methods: {
            applyFilter() {
                let tempFilter = `min=${this.filter.price.min}&max=${this.filter.price.max}&category=${this.filter.category}&availability=${this.filter.availability}`
                this.$store.dispatch("vxProduct/getProducts", tempFilter);
            }
        },
        computed: {
            mobile() {
                return this.$store.getters["mobile"];
            },
            
            categories() {
                return this.$store.getters["vxCategory/categories"];
            }
        },
    }
</script>

<style scoped>

</style>