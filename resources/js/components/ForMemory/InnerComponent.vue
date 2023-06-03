<template>
    <div class="container mt-5">
<!--        <div>Color: {{ color }}</div>-->
<!--        <div>Number: {{ number > 10 ? 'more 10' : 'less 10' }}</div>-->
<!--        <div>Is published: {{ isPublished ? 'Published' : 'Not published' }}</div>-->
        <div>Color: {{ obj.color }}</div>
        <div>Number: {{ obj.number > 10 ? 'more 10' : 'less 10' }}</div>
        <div>Is published: {{ obj.isPublished ? 'Published' : 'Not published' }}</div>
    </div>
</template>

<script>
export default {
    name: 'InnerComponent',
    data() {
        return {
        };
    },
    methods: {
    },
    mounted() {
        // this.$parent.$parent.parentLog();
    },
    props: [
        // 'color', 'number', 'isPublished'
        'obj'
    ]
}
</script>

<style scoped>

</style>
