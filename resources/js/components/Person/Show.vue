<template>
    <div class="mt-4" v-if="person">
        <h2>Person</h2>
        <div class="mb-3">
            Name: {{ person.name }}
        </div>
        <div class="mb-3">
            Age: {{ person.age }}
        </div>
        <div class="mb-3">
            Job: {{ person.job }}
        </div>
        <div class="mb-3">
            <router-link :to="{ name: 'person.edit', params: { id: person.id } }">Edit</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    mounted() {
        this.$store.dispatch('getPerson', this.$route.params.id);
    },
    computed: {
        person() {
            return this.$store.getters.person;
        }
    }
}
</script>

<style scoped>

</style>
