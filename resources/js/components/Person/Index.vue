<template>
    <div class="container mt-5">
        <h2>Persons</h2>
        <table class="table mt-5">
            <thead>
            <tr>
                <th class="th-w-20"></th>
                <th class="th-w-20">Name</th>
                <th class="th-w-20">Age</th>
                <th class="th-w-20">Job</th>
                <th class="th-w-20">Actions</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr>
                    <th>{{ person.id }}</th>
                    <td><router-link :to="{ name: 'person.show', params: { id: person.id } }">{{ person.name }}</router-link></td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td>
                        <router-link :to="{ name: 'person.edit', params: { id: person.id } }" class="btn btn-outline-success btn-sm">Edit</router-link>
                        <a href="#" @click.prevent="$store.dispatch('deletePerson', person.id)" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",
    mounted() {
        this.$store.dispatch('getPeople');
    },
    computed: {
        people() {
            return this.$store.getters.people;
        }
    }
}
</script>

<style scoped>
.th-w-20 {
    width: 20%;
}
</style>
