<template>
   <div class="row justify-content-center">
        <div class="col-md-8">
       <div class="card" v-for="post in posts" v-bind:key="post.id">
            <div class="card-header">
                <h4><a href="" style="color: inherit;">{{ post.the_custom_title }}</a></h4>
            </div>
            <div class="card-body" style="max-height: 500px; overflow: hidden;
            -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
            mask-image: linear-gradient(to bottom, black 50%, transparent 100%);">
                {{ post.the_custom_body }}
            </div>
            <div class="card-footer">
                 By
                <a href="">author_name</a>
            </div>
        </div>
        </div>
</div>
</template>






<script>
    export default {
        data() {
            return {
                posts: {}
            };
        },
        created() {
            this.getPosts();
            console.log('posts debug', this.posts);
        },

        methods: {
            getPosts(api_url) {
                fetch('/api/posts')
                    .then(response => response.json())
                    .then(json => (this.posts = json.data))
                    .catch(err => console.log(err));
            }
        }
    };
</script>
