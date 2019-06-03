@foreach($comments as $comment)
<hr>
 <div class="col-md-11">
    <div class="display-comment" style="margin-left: 20px; font-size: 15px;">
        <strong>
            <span>
                @foreach($comment->user->images as $image)
                    <img width="30" height="30" style="border-radius: 50%" src="{{$image->url}}">
                @break
                @endforeach   
            </span>
            {{ $comment->user->fullname }}</strong> @<small>{{ $comment->user->username }}</small>
        <br>
        {{ $comment->body }}
        <br>
        <button id="r{{$comment->id}}" type="button" onclick="reply(2, 'reply{{$comment->id}}')" class="btn btn-link">Reply</button>
        <form style="display: none" id="reply{{$comment->id}}" method="post" action="{{ route('reply_store') }}">
            @csrf
            <div class="form-group">
                 <textarea type="text" name="comment_body" class="form-control" required></textarea>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Reply"/>
                <button onclick="reply(1, 'reply{{$comment->id}}')" type="button" class="btn btn-light">Huy</button>
            </div>
        </form>
        @include('page_user.comment.replies', ['comments' => $comment->replies]) 
    </div>
</div>
@endforeach

<script>
function reply(a,id)
{
    if(a==1)
    document.getElementById(id).style.display="none";
    else
    document.getElementById(id).style.display="block";
}
</script>