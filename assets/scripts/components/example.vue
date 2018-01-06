<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <p>I'm an example component!</p>
        </div>
        <div class="panel-footer">
            <button class="btn btn-default" v-on:click="btnClick($event)">Button with click event listener</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title'],
        data: function () {
            return {
                test: 'Test value'
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods: {
             btnClick: function (e) {
                 console.log('Button click');
             }
        }
    }
</script>

<style lang="scss" scoped>
</style>
