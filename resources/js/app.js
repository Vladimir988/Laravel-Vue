import Vue from 'vue';
import MainComponent from "./components/MainComponent";

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {
        MainComponent,
    }
});
