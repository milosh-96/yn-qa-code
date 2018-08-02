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
                        <form action="#" id="commentForm-{{$item->hash}}" class="collapse form mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <textarea name="comment" class="form-control form-control-sm" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="comments">
                        <p>
                            <a href="#">weber43</a>: I suppose you can use X for this.
                            <small class="text-right text-secondary">
                                <i class="fa fa-thumbs-up"></i>
                                <i class="fa fa-thumbs-down"></i>
                            </small>
                        </p>
                        <p>
                            <a href="#">stx3</a>: Only Y!!!.
                        </p>
                        <p>
                            <a href="#">mivax</a>: You should try both and decide what you like more, there is no correct answer.
                        </p>
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
                    <a href="#" data-toggle="modal" data-target="#question-{{$item->slug}}Modal">17 Comments</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(request()->route()->getName() == "question.show")
    <div class="card mt-3">
        <div class="card-body">
           <div class="row">
            <div class="col">
                @include('questions.partials.comment')
            </div>
           </div>
            <div class="row">
                <div class="col">
                  <comment-feed></comment-feed>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

