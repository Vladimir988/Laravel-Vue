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
                    <ShowComponent :person="person" :ref="`edit_${person.id}`"></ShowComponent>
                    <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from './parts/EditComponent';
import ShowComponent from './parts/ShowComponent';
export default {
    name: 'IndexComponent',
    components: {
        EditComponent,
        ShowComponent
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
        isEdit(id) {
            return this.editPersonId === id;
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
