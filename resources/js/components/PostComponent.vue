<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post Component</div>
                    <div class="card-body">
                        <SingleComponent></SingleComponent> <!-- include component in parent component with camel case notation -->
                        <button @click="sayHello">Hello</button>
                        <button @click="sayHi">Hi</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table mt-5">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Age</th>
                <th>Job</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="person in persons"> <!-- v-if="person.age > 20" --> <!-- personAgeFilter -->
                <th>{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
                <td>{{ person.job }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import SingleComponent from "./SingleComponent";
export default {
    name: 'PostComponent',
    components: {
        SingleComponent,
    },
    data() {
        return {
            persons: null
        }
    },
    methods: {
        sayHello() {
            console.log('Hello');
        },
        sayHi() {
            console.log('Hi');
        },
        getPersons() {
            axios.get('/persons')
                // .then(function (response) {
                //     console.log(response.data);
                // })
                .then(response => {
                    this.persons = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
                .finally({

                });
        }
    },
    computed: {
        job() {
            return this.name + ' doing some job';
        },
        personAgeFilter() {
            return this.persons.filter(function (person) {
                return person.age > 20;
            });
        }
    },
    mounted() {
        this.getPersons();
    }
}
</script>

<style scoped>

</style>
