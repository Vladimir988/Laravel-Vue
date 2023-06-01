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
                <template v-for="person in people"> <!-- v-if="person.age > 20" --> <!-- personAgeFilter -->
                    <tr :class="isEdit(person.id) ? 'd-none' : ''">
                        <th>{{ person.id }}</th>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                        <td>
                            <a href="#" @click.prevent="changeEditPersonId(person)" class="btn btn-outline-success btn-sm">Edit</a>
                            <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from './parts/EditComponent';
export default {
    name: 'IndexComponent',
    components: {
        EditComponent
    },
    data() {
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: ''
        };
    },
    methods: {
        getPeople() {
            axios.get('/api/people')
            .then(responce => {
                this.people = responce.data
            });
        },
        changeEditPersonId(person) {
            this.editPersonId = person.id;
            let editName      = `edit_${person.id}`;
            let fullEditName  = this.$refs[editName][0];
            fullEditName.name = person.name;
            fullEditName.age  = person.age;
            fullEditName.job  = person.job;
        },
        isEdit(id) {
            return this.editPersonId === id;
        },
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
            .then(responce => {
                if(responce.status === 200) {
                    this.getPeople();
                }
            });
        },
        indexLog() {
            console.log('this is ===INDEX=== component');
        }
    },
    mounted() {
        this.getPeople();
        // this.$parent.parentLog();
    }
}
</script>

<style scoped>
.th-w-20 {
    width: 20%;
}
</style>
