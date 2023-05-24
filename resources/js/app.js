import Vue from 'vue';
import PostComponent from "./components/PostComponent";
import SingleComponent from "./components/SingleComponent";
import CreateComponent from "./components/CreateComponent";

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {
        PostComponent,
        SingleComponent,
        CreateComponent,
    }
});
