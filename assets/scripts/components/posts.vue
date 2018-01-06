<template>
    <div>
        <div class="text-center loader" v-if="posts === null">
            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
        </div>
        <article v-for="post in posts" class="post">
            <h3><a v-bind:href="post.link">{{post.title.rendered}}</a></h3>
            <div v-html="post.excerpt.rendered"></div>
        </article>
    </div>
</template>

<script>
    let vm;
    let data = {
        posts: null
    };

    export default {
        props: [],
        data() { return data; },
        mounted() {
            vm = this;

            jQuery.get('/wp-json/wp/v2/posts').done(function(posts) {
                data.posts = posts;
            });
        },
        methods: {}
    }
</script>

<style lang="scss">
</style>
