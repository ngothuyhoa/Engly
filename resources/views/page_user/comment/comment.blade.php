<div class="row justify-content-center" style="margin-top: 20px">
    <div class="col-md-12">
        <div class="card" id="comment">
            <div class="card-body">
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comment_store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea type="text" name="comment_body" class="form-control" required></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Add Comment"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="card" id="comment">
            @include('page_user.comment.replies', ['comments' => $post->comments,  'post_id' => $post->id])
        </div>
    </div>
</div>