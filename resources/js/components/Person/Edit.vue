<template>
    <div class="mt-4">
        <h2>Update person</h2>
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
            <input @click.prevent="update" class="btn btn-outline-success" value="Update">
        </div>
    </div>
</template>

<script>
import router from "../../router";
export default {
    name: "Edit",
    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },
    methods: {
        getPerson() {
            axios.get(`/api/people/${this.$route.params.id}`)
            .then(response => {
                this.name = response.data.name;
                this.age = response.data.age;
                this.job = response.data.job;
            });
        },
        update() {
            axios.patch(`/api/people/${this.$route.params.id}`, {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(response => {
                router.push({
                    name: 'person.show',
                    params: { id: this.$route.params.id }
                });
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
