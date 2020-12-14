import Vue from "vue";
import VueRouter from "vue-router";
import AdminsContainer from "../admins/components/AdminsContainer";
import router from "../admins/routes";

window.axios = require('axios');

Vue.use(VueRouter);

new Vue({
    el: "#admins-container",
    router,
    components: {
        AdminsContainer
    }
});
