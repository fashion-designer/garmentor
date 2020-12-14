import Vue from "vue";
import VueRouter from "vue-router";
import UsersContainer from "../users/components/UsersContainer";
import router from "../users/routes";

window.axios = require('axios');

Vue.use(VueRouter);

new Vue({
    el: "#users-container",
    router,
    components: {
        UsersContainer
    }
});
