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
            <tr v-for="person in personAgeFilter"> <!-- v-if="person.age > 20" -->
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
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            persons: [
                {
                    id: 1,
                    name: 'Vasja',
                    age: 19,
                    job: 'coach',
                },
                {
                    id: 2,
                    name: 'Kolja',
                    age: 12,
                    job: 'rest',
                },
                {
                    id: 3,
                    name: 'Nastja',
                    age: 31,
                    job: 'doing something',
                },
                {
                    id: 4,
                    name: 'Irina',
                    age: 99,
                    job: 'rider',
                },
                {
                    id: 5,
                    name: 'Enokentii',
                    age: 88,
                    job: 'doing nothing',
                }
            ]
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
        },
        personAgeFilter() {
            return this.persons.filter(function (person) {
                return person.age > 20;
            });
        }
    }
}
</script>

<style scoped>

</style>
