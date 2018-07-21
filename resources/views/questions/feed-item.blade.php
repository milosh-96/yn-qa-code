<div class="question mb-2">
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
                        <a href="#commentForm" data-toggle="collapse">What do you think?</a>
                        <form action="#" id="commentForm" class="collapse form mt-3">
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                   <a href="{{route('question.show',['slug'=>$item->slug,'hash'=>$item->hash])}}">
                   <h5 class="card-title">{{$item->title}}</h5>
                   </a>
                </div>
                @if(auth()->user())
                    @if(auth()->user()->id == $item->user_id)
                    <div class="col-12 col-md-2 text-right">
                        <div class="icons">
                            <a href="#editQuestion" onclick="getEditModal({{$item->hash}})"><small><i class="fa fa-pencil-alt"></i></small></a>
                        </div>
                    </div>
                    @endif
                @endif
                
            </div>
            <p>{{$item->question_text}}</p>
            <div class="row">
                @if($item->answers_enabled)
                <div class="col-12 col-3 buttons">
                    <button class="btn btn-xs btn-dark">{{$item->answer1}}</button>
                    <button class="btn btn-xs btn-light">{{$item->answer2}}</button>
                </div>
                @endif
                <div class="col-12 col-9 meta text-right">
                    <a href="#">View Voting Results</a>,
                    @if($item->discussion_enabled) 
                    <a href="#" data-toggle="modal" data-target="#question-{{$item->slug}}Modal">17 Comments</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>

