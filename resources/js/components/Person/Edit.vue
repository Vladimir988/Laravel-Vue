<template>
    <div class="mt-4" v-if="person">
        <h2>Update person</h2>
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
            <input :disabled="!isDisabled" @click.prevent="$store.dispatch('update', {person})" class="btn btn-outline-success" value="Update">
        </div>
    </div>
</template>

<script>
export default {
    name: "Edit",
    mounted() {
        this.$store.dispatch('getPerson', this.$route.params.id);
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
