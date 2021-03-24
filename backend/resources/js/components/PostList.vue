<template>
<div class="container py-4">

    <a href="#newPost" data-toggle="modal" class="card-header-action"><i class="c-icon cil-plus"></i> Create Post</a>

   <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card" v-for="post in posts" v-bind:key="post.id">
                <div class="card-header">
                    <h4><a href="" style="color: inherit;">{{ post.title }}</a></h4>
                </div>
                <div class="card-body" style="max-height: 500px; overflow: hidden;
                -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
                mask-image: linear-gradient(to bottom, black 50%, transparent 100%);">
                    {{ post.body }}
                </div>
                <div class="card-footer">
                    By
                    <a href="">{{ post.author.name }}</a>
                </div>
            </div>
            <!-- pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                        <a class="page-link" href="#" @click="getPosts(pagination.prev_page_url)">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">{{ pagination.current_page }} of {{ pagination.last_page }}</a>
                    </li>
                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                        <a class="page-link" href="#" @click="getPosts(pagination.next_page_url)">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>



    <div id="newPost" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="" @submit.prevent="addPost">
                <input type="hidden" name="_token" value=""/>
				<div class="modal-header">
					<h4 class="modal-title">Create Post</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" placeholder="Title" v-model="post.title" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" placeholder="Body" v-model="post.body" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="submit" id="btnSave" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>



</div>
</template>


<script>
    $('#btnSave').click(function() {
        $('#newPost').modal('hide');
    });

    export default {
        data() {
            return {
                posts: [],
                pagination: {},
                post: {
                    id: '',
                    title: '',
                    body: ''
                }
            };
        },

        created() {
            this.getPosts();
        },

        methods: {
            getPosts(api_url) {
                let vm = this;
                api_url = api_url || '/api/posts';
                fetch(api_url)
                    .then(response => response.json())
                    .then(response => {
                        this.posts = response.data;
                        vm.paginator(response.meta, response.links);
                    })
                    .catch(err => console.log(err));
            },

            paginator(meta, links) {
                this.pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
            },

            addPost(){
                fetch('api/post', {
                    method: 'post',
                    body: JSON.stringify(this.post),
                    headers: {
                        'content-type': 'apllication/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                    // .then(response => response.json())
                    .then(res => res.text())
                    .then(data => {
                        this.getPosts();
                    })
                    .catch(err => console.log(err));
            }
        }
    };
</script>
