import Vue from "vue";
import VueRouter from "vue-router";
import TableList from "../shared/components/TableList";
import ViewProfile from "../shared/components/ViewProfile";
import * as END_POINTS from "../shared/constants/endPoints";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: TableList
    },
    {
        path: '/edit/:id',
        name: 'edit-admin',
        component: ViewProfile,
        props: route => {
            return {
                getProfileRoute: END_POINTS.GET_SELECTED_ADMIN_PROFILE
            };
        }
    }
];

export default new VueRouter({
    mode: "history",
    base: "admin/admins-list",
    routes
});
