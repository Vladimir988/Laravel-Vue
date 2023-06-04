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
            <input :disabled="!isDisabled" @click.prevent="update" class="btn btn-outline-success" value="Update">
        </div>
    </div>
</template>

<script>
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
                this.name = response.data.data.name;
                this.age = response.data.data.age;
                this.job = response.data.data.job;
            });
        },
        update() {
            axios.patch(`/api/people/${this.$route.params.id}`, {
                name: this.name,
                age: this.age,
                job: this.job,
            })
            .then(response => {
                this.$router.push({
                    name: 'person.show',
                    params: { id: this.$route.params.id }
                });
            });
        }
    },
    computed: {
        isDisabled() {
            return this.name && this.age && this.job;
        }
    },
    mounted() {
        this.getPerson();
    }
}
</script>

<style scoped>

</style>
