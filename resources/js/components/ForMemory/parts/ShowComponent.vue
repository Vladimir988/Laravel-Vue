<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : ''">
        <th>{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td>
            <a href="#" @click.prevent="changeEditPersonId(person)" class="btn btn-outline-success btn-sm">Edit</a>
            <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-outline-danger btn-sm">Delete</a>
        </td>
    </tr>
</template>

<script>
export default {
    name: 'ShowComponent',
    props: [
        'person'
    ],
    data() {
        return {

        };
    },
    methods: {
        changeEditPersonId(person) {
            this.$parent.editPersonId = person.id;
            let editName      = `edit_${person.id}`;
            let fullEditName  = this.$parent.$refs[editName][0];
            fullEditName.name = person.name;
            fullEditName.age  = person.age;
            fullEditName.job  = person.job;
        },
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(responce => {
                    if(responce.status === 200) {
                        this.$parent.getPeople();
                    }
                });
        },
    },
    mounted() {}
}
</script>

<style scoped></style>
