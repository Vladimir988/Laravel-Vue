<template>
    <div class="mt-4">
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
            <input :disabled="!isDisabled" @click.prevent="store" class="btn btn-outline-success" value="Add person">
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },
    methods: {
        store() {
            axios.post('/api/people', {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(response => {
                this.$router.push({ name: 'person.index' });
            });
        }
    },
    computed: {
        isDisabled() {
            return this.name && this.age && this.job;
        }
    }
}
</script>

<style scoped>

</style>
