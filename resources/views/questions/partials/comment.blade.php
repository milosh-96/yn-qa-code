<li class="list-group-item border-0">
    <div>
        <a href="#">{{$comment->user->user_name}}</a>:
        <span @if($comment->isLoggedUserAuthor()) class="comment-text" data-type="text" data-url="{{route('api.comment.update')}}" data-pk="{{$comment->id}}" data-name="comment_text" value="{{$comment->comment_text}}"@endif>{{$comment->comment_text}}</span>
    </div>
    <div>
        <small>{{$comment->createdAt()}}</small>
    </div>
</li>