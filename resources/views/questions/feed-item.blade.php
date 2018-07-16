<div class="question mb-2">
    <div class="modal" id="question{{$i}}Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discussion about Is X better than Y {{$i}}?</h5>
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
            <h5 class="card-title">Is X better than Y?</h5>
            <p>I'm  wondering is X better than Y? I would really appreciate if you could elaborate why in comments. Thanks.</p>
            <div class="row">
                <div class="col-12 col-3 buttons">
                    <button class="btn btn-xs btn-dark">X</button>
                    <button class="btn btn-xs btn-light">Y</button>
                </div>
                <div class="col-12 col-9 meta text-right">
                    <a href="#">View Voting Results</a>, 
                    <a href="#" data-toggle="modal" data-target="#question{{$i}}Modal">17 Comments</a>
                </div>
            </div>
        </div>
    </div>
    
</div>