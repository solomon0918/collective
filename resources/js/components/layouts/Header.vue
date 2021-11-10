<template>
    <b-container class="pt-2" fluid="sm">
        <b-button v-b-toggle.collectiveSidebar class="ml-2" v-if="!mobile">
            Toggle Sidebar
        </b-button>
    </b-container>
    
</template>

<script>
    export default {
        name: "Header",
        computed: {
            mobile() {
                return this.$store.getters["mobile"];
            }
        },
    }
</script>

<style scoped>

</style>