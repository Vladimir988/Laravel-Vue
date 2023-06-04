<template>
    <div class="mt-4" v-if="person">
        <h2>Person</h2>
        <div class="mb-3">
            Name: {{ this.person.name }}
        </div>
        <div class="mb-3">
            Age: {{ this.person.age }}
        </div>
        <div class="mb-3">
            Job: {{ this.person.job }}
        </div>
        <div class="mb-3">
            <router-link :to="{ name: 'person.edit', params: { id: person.id } }">Edit</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    data() {
        return {
            person: null
        }
    },
    methods: {
        getPerson() {
            axios.get(`/api/people/${this.$route.params.id}`)
            .then(response => {
                this.person = response.data.data;
            });
        }
    },
    mounted() {
        this.getPerson();
    }
}
</script>

<style scoped>

</style>
