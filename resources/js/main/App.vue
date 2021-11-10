<template>
    <div>
        <b-sidebar></b-sidebar>
        <b-header></b-header>
        <products></products>
    </div>
</template>

<script>
    import Header from "../components/layouts/Header.vue";
    import Sidebar from "../components/layouts/Sidebar.vue";

    // Contents
    import Products from "../components/Products.vue";

    export default {
        components: {
            "b-header": Header,
            "b-sidebar": Sidebar,
            Products
        },
    }
</script>

<style scoped>

</style>