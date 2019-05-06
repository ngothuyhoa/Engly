@foreach($comments as $comment)
    <div class="display-comment" style="margin-left: 30px">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply">Reply</a> 
        <form id="test" style="display:none;" method="post" action="{{ route('reply_store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('page_user.comment.replies', ['comments' => $comment->replies]) 
    </div>
    <hr>
@endforeach

<!-- <script>
$(document).ready(function(){
  $("button").click(function(){
    $("#test").css("display", "block");
  });
});
</script> -->