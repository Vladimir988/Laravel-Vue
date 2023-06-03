import Vue from 'vue';
import VueRouter from 'vue-router';
require('./bootstrap');

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/people',
            name: 'person.index',
            component: () => import('./components/Person/Index')
        }
    ]
});
