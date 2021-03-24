<template>
    <div class="container py-4">
        <form enctype="multipart/form-data" method="post" action="" @submit.prevent="addPost">
            <input type="hidden" name="_token" value=""/>
            <div class="modal-header">
                <h4 class="modal-title">Create Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title" v-model="post.title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Body" v-model="post.body"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
		</form>
    </div>
</template>
