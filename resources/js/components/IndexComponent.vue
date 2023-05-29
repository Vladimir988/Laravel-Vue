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
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="person in people"> <!-- v-if="person.age > 20" --> <!-- personAgeFilter -->
                    <tr>
                        <th>{{ person.id }}</th>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                        <td><a href="#" @click.prevent="changeEditPersonId(person.id)" class="btn btn-success">Edit</a></td>
                    </tr>
                    <tr :class="isEdit(person.id) ? '' : 'd-none'">
                        <th></th>
                        <td><input type="text" class="form-control"></td> <!-- value="{{ person.name }}" -->
                        <td><input type="number" class="form-control"></td> <!-- value="{{ person.age }}" -->
                        <td><input type="text" class="form-control"></td> <!-- value="{{ person.job }}" -->
                        <td><a href="#" @click.prevent="changeEditPersonId(null)" class="btn btn-success">Update</a></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'IndexComponent',
    data() {
        return {
            people: null,
            editPersonId: null
        };
    },
    methods: {
        getPeople() {
            axios.get('/api/people', {

            })
            .then(responce => {
                this.people = responce.data
            });
        },
        changeEditPersonId(id) {
            this.editPersonId = id;
        },
        isEdit(id) {
            return this.editPersonId === id;
        }
    },
    mounted() {
        this.getPeople();
    }
}
</script>

<style scoped>

</style>
