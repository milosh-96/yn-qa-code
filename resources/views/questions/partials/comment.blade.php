<li class="list-group-item border-0">
    <div id="comment-{{$comment->id}}">
        <div class="row">
        <div class="col-10 comment-content">
        <a href="#">{{$comment->user->user_name}}</a>:
        <span @if($comment->isLoggedUserAuthor()) class="comment-text" data-type="text" data-url="{{route('api.comment.update')}}" data-pk="{{$comment->id}}" data-name="comment_text" value="{{$comment->comment_text}}"@endif>{{$comment->comment_text}}</span>
        </div>
        <div class="col-2 text-right">
        @if($comment->isLoggedUserAuthor())
        <div class="dropdown">
  <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    ...
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item edit-comment" href="#comment-{{$comment->id}}"><i class="fa fa-pencil-alt"></i> Edit</a>
    <a class="dropdown-item delete-comment" href="#comment-{{$comment->id}}"><i class="fa fa-trash"></i> Delete</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"><i class="fa fa-exclamation-triangle"></i> Report</a>
  </div>
</div>
@endif  
    </div>
    <div>
        <small>{{$comment->createdAt()}}</small>
    </div>
</li>