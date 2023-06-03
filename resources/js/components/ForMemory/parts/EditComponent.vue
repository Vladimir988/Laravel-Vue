<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th>{{ person.id }}</th>
        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="number" v-model="age" class="form-control"></td>
        <td><input type="text" v-model="job" class="form-control"></td>
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-outline-success btn-sm">Update</a></td>
    </tr>
</template>

<script>
export default {
    name: 'EditComponent',
    props: [
        'person'
    ],
    data() {
        return {
            name: null,
            age: null,
            job: null
        };
    },
    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null;
            axios.patch(`/api/people/${id}`, {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(responce => {
                if(responce.status === 200) {
                    this.$parent.getPeople();
                }
            });
        }
    },
    mounted() {}
}
</script>

<style scoped></style>
