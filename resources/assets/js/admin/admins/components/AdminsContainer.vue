<template>
    <div>
        <router-view v-bind="myProps"/>
    </div>
</template>

<script>
    export default {
        name: "AdminsContainer",
        props: {
            items: {
                type: Array,
                default: () => []
            }
        },
        computed: {
            myProps() {
                return this.$props;
            }
        }
    }
</script>

<style scoped>

</style>