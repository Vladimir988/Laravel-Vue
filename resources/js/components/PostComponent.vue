<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post Component</div>
                    <div class="card-body">
                        <p>I'm an post component.</p>
                        <div>Job: {{ job }}</div>
                        <br>
                        <div>Name: {{ name }}</div>
                        <div>Age: {{ age }}</div>
                        <div>Boolean: {{ boolean }}</div>
                        <div>SomeNull: {{ someNull }}</div>
                        <div>Arr: {{ arr }}</div>
                        <div>SomeObj: {{ someObj }}</div>
                        <SingleComponent></SingleComponent> <!-- include component in parent component with camel case notation -->
                        <single-component></single-component>
                        <button @click="sayHello">Hello</button>
                        <button @click="sayHi">Hi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SingleComponent from "./SingleComponent";
export default {
    name: 'PostComponent',
    components: {
        SingleComponent,
    },
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            name: 'Vasja',
            age: 20,
            boolean: true,
            someNull: null,
            arr: [[], []],
            someObj: {},
        }
    },
    methods: {
        sayHello() {
            console.log('Hello');
        },
        sayHi() {
            console.log('Hi');
        }
    },
    computed: {
        job() {
            return this.name + ' doing some job';
        }
    }
}
</script>

<style scoped>

</style>
