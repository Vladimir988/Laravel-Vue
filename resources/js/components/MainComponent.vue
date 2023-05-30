<template>
    <div class="container">
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";
export default {
    name: 'PostComponent',
    components: {
        CreateComponent,
        IndexComponent,
    },
    data() {
        return {
            persons: null
        }
    },
    methods: {
        parentLog() {
            console.log('this is ===PARENT=== component');
        }
    },
    computed: {
        job() {
            return this.name + ' doing some job';
        },
        personAgeFilter() {
            return this.persons.filter(function (person) {
                return person.age > 20;
            });
        }
    },
    mounted() {
        // this.$refs.index.indexLog();
    }
}
</script>

<style scoped>

</style>
