<template>
    <div class="container mt-5">
        <h2>Index Component</h2>

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
            <tr v-for="person in people"> <!-- v-if="person.age > 20" --> <!-- personAgeFilter -->
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
export default {
    name: 'IndexComponent',
    data() {
        return {
            people: null
        };
    },
    methods: {
        getPeople() {
            axios.get('/api/people', {

            })
            .then(responce => {
                this.people = responce.data
            });
        }
    },
    mounted() {
        this.getPeople();
    }
}
</script>

<style scoped>

</style>
