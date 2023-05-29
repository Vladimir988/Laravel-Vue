<template>
    <div class="container">
        <IndexComponent></IndexComponent>
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-md-8">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">Post Component</div>-->
<!--                    <div class="card-body">-->
<!--                        <SingleComponent></SingleComponent> &lt;!&ndash; include component in parent component with camel case notation &ndash;&gt;-->
<!--                        <button @click="sayHello">Hello</button>-->
<!--                        <button @click="sayHi">Hi</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <table class="table mt-5">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th></th>-->
<!--                <th>Name</th>-->
<!--                <th>Age</th>-->
<!--                <th>Job</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr v-for="person in persons"> &lt;!&ndash; v-if="person.age > 20" &ndash;&gt; &lt;!&ndash; personAgeFilter &ndash;&gt;-->
<!--                <th>{{ person.id }}</th>-->
<!--                <td>{{ person.name }}</td>-->
<!--                <td>{{ person.age }}</td>-->
<!--                <td>{{ person.job }}</td>-->
<!--            </tr>-->
<!--            </tbody>-->
<!--        </table>-->
    </div>
</template>

<script>
// import SingleComponent from "./SingleComponent";
import IndexComponent from "./IndexComponent";
export default {
    name: 'PostComponent',
    components: {
        IndexComponent,
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
            // axios.get('/persons')
            // .then(response => {
            //     this.persons = response.data;
            // })
            // .catch(error => {
            //     console.log(error);
            // })
            // .finally({
            //
            // });
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
