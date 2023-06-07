<template>
    <div class="mt-4">
        <h2>Create person</h2>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="person.name" id="name" placeholder="Person name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="person.age" id="age" placeholder="Person age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="person.job" id="job" placeholder="Person job">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" @click.prevent="$store.dispatch('store', {name: person.name, age: person.age, job: person.job})" class="btn btn-outline-success" value="Add person">
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",
    mounted() {
        this.$store.commit('setPerson', {name: null, age: null, job: null});
    },
    computed: {
        isDisabled() {
            return this.$store.getters.isDisabled;
        },
        person() {
            return this.$store.getters.person;
        }
    }
}
</script>

<style scoped>

</style>
