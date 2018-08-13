<div class="question mb-2">
    @if(request()->route()->getName() != "question.show")
    <div class="modal" id="question-{{$item->slug}}Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discussion about {{$item->title}}?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="user-comment">
                        <a href="#commentForm-{{$item->hash}}" data-toggle="collapse">What do you think?</a>
                        <div id="commentForm-{{$item->hash}}">
                        @include('questions.partials.comments-feed')
                        </div>  

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                   <a href="{{route('question.show',['slug'=>$item->slug,'hash'=>$item->hash])}}">
                   <h5 class="card-title">
                    @if((auth()->user()) && (auth()->user()->isAnswered($item->id))) &bull; @endif
                    {{$item->title}}
                   </h5>
                   </a>
                </div>
                @if(auth()->user())
                    @if(auth()->user()->id == $item->user_id)
                    <div class="col-12 col-md-2 text-right">
                        <div class="icons">
                            <a href="#editQuestion" onclick="getEditModal({{'"'.$item->hash.'"'}})"><button class="btn"><i class="fa fa-pencil-alt"></i></button></a>
                            <a href="#deleteQuestion">
                                <form class="d-inline" action="{{route('question.destroy',$item->hash)}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <button class="btn"><i class="fa fa-trash"></i></button></a>
                                </form>

                        </div>
                    </div>
                    @endif
                @endif
                
            </div>
            <p>{{$item->question_text}}</p>
            <div class="row">
                @if(request()->route()->getName() == "question.show")
                @if(auth()->user())
                <div class="col-12 col-md-3 buttons" @if(auth()->user() && auth()->user()->isAnswered($item->id))data-toggle="popover" data-trigger="hover" data-placement="right" data-content="You have answered to this question, this is your answer." @endif
>
                    <form class="d-inline-block mt-1" method="POST" action="{{route('question.answer',$item->hash)}}">
                        {{csrf_field()}}
                        <button class="btn btn-xs btn-dark" type="submit" value="0" name="answer">
                            @if(auth()->user()->whichAnswer($item->id) == "a")<i class="fa fa-check"></i>@endif
                            {{$item->answer1}}
                        </button>
                    </form>
                    <form class="d-inline-block mt-1" method="POST" action="{{route('question.answer',$item->hash)}}">
                    {{csrf_field()}}
                        <button class="btn btn-xs btn-light" type="submit" value="1" name="answer">
                            @if(auth()->user()->whichAnswer($item->id) == "b")<i class="fa fa-check"></i>@endif
                            {{$item->answer2}}
                        </button>
                    </form>
                </div>
                @else
                <div class="col-12 col-md-3">
                    <a href="#" data-toggle="modal" data-target="#loginModal">Sign in to Answer</a>
                </div>
                @endif
                @endif
                <div class="col-12 @if(request()->route()->getName() == 'question.show') col-md-9 @endif meta text-right">
                    <a href="#">View Voting Results</a>
                    @if($item->discussion_enabled && request()->route()->getName() != "question.show") 
                    <a href="#" data-toggle="modal" data-target="#question-{{$item->slug}}Modal">{{$item->commentsCount()}} Comments</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(request()->route()->getName() == "question.show")
  
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
             @if(auth()->user())
                 <div class="col-12">
                     <form action="{{route('api.comment.store')}}" name="commentForm" method="POST">
                         {{csrf_field()}}
                         <input type="hidden" name="object_hash" value="{{$item->hash}}">
                         <textarea class="form-control comment-item" name="comment_text" placeholder="Use Shift+Enter for a new line!"></textarea>
                     </form>
                 </div>
            @endif
            </div>
            <div class="row">
                <div class="col">
                   @include('questions.partials.comments-feed')
                </div>
            </div>
        </div>
    </div>
    @endif
</div>


@section('additional_scripts')
@parent
@if(request()->route()->getName() == "question.show")
<script>
             $(".comment-item").keypress((event) => {
            if(event.keyCode == 13 && !event.shiftKey) {
                event.preventDefault();
               
                if(confirm("You are about to submit a comment, are you sure?")) {
                    this.commentForm.submit();
                     alert("Your comment has been sent.");
                }
                else {
                    alert("You need to click 'OK' to send an answer'");
                }
            }
            
         });

         $(".edit-comment").click(function(e) {
             var el = $(this).parent().parent().parent().parent().find('.comment-text');
             console.log(el);

            e.stopPropagation();
            $(this).parent().dropdown('toggle');
             el.editable('show');
         });
</script>
@endif
@endsection