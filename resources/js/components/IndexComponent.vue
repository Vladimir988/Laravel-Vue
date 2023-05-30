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
                    <tr :class="isEdit(person.id) ? '' : 'd-none'">
                        <th>{{ person.id }}</th>
                        <td><input type="text" v-model="name" class="form-control"></td>
                        <td><input type="number" v-model="age" class="form-control"></td>
                        <td><input type="text" v-model="job" class="form-control"></td>
                        <td><a href="#" @click.prevent="updateperson(person.id)" class="btn btn-outline-success btn-sm">Update</a></td>
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
            this.name = person.name;
            this.age = person.age;
            this.job = person.job;
        },
        isEdit(id) {
            return this.editPersonId === id;
        },
        updateperson(id) {
            this.editPersonId = null;
            axios.patch(`/api/people/${id}`, {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(responce => {
                if(responce.status === 200) {
                    this.getPeople();
                }
            });
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
