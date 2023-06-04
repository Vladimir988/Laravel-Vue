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
                <tr> <!--:class="this.$parent.isEdit(person.id) ? 'd-none' : ''"-->
                    <th>{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td>
                        <router-link :to="{ name: 'person.edit', params: { id: person.id } }">Edit</router-link>
<!--                        <a href="#" @click.prevent="changeEditPersonId(person)" class="btn btn-outline-success btn-sm">Edit</a>-->
<!--                        <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-outline-danger btn-sm">Delete</a>-->
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
    data() {
        return {
            people: null
        }
    },
    methods: {
        getPeople() {
            axios.get('/api/people')
            .then(response => {
                this.people = response.data;
            })
        }
    },
    mounted() {
        this.getPeople();
    }
}
</script>

<style scoped>
.th-w-20 {
    width: 20%;
}
</style>
