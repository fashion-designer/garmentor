import Vue from "vue";
import VueRouter from "vue-router";
import DesignersContainer from "../designers/components/DesignersContainer";
import router from "../designers/routes";

window.axios = require('axios');

Vue.use(VueRouter);

new Vue({
    el: "#designers-container",
    router,
    components: {
        DesignersContainer
    }
});
