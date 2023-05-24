<template>
    <div class="container mt-5">
        <h2>Create person</h2>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" id="name" placeholder="Person name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="age" id="age" placeholder="Person age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" id="job" placeholder="Person job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" class="btn btn-primary" value="Add person">
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateComponent',
    data() {
        return {
            name: null,
            age: null,
            job: null,
        };
    },
    methods: {
        addPerson() {
            axios.post('/api/people', {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(person => {
                this.name = null
                this.age = null
                this.job = null
            });
        }
    }
}
</script>

<style scoped>

</style>
