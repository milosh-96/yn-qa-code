<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
<form action="{{route('question.update',$item->id)}}" method="POST">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit This Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control form-control-lg" value="{{$item->title}}" placeholder="Your question">
                    </div>
                    <div class="form-group">
                        <label for="question_text"><small><strong>Describe your question</strong></small></label>
                        <textarea id="question_text" name="question_text" class="form-control" value="">{{$item->question_text}}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="sr-only" for="inlineFormInputGroup">Answer 1</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Answer 1</div>
                                    </div>
                                    <input type="text" name="answer1" class="form-control" id="inlineFormInputGroup" placeholder="Enter Here" value="{{$item->answer1}}">
                                </div>
                            </div>
                            <div class="col">
                                <label class="sr-only" for="inlineFormInputGroup">Answer 2</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Answer 2</div>
                                    </div>
                                    <input type="text" name="answer2" class="form-control" id="inlineFormInputGroup" placeholder="Enter Here" value="{{$item->answer2}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="d-inline-block pr-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Uncheck this field if you don't want discussion on your question.">
                            <input type="hidden" value="0" name="discussion_enabled">
                            <input class="form-check-input" name="discussion_enabled" type="checkbox" checked value="1" id="discussion_enabled">
                            <label class="form-check-label" for="discussion_enabled">
                                Enable Discussion
                            </label>
                        </div>
                        <div class="helper d-md-none"> <small>Uncheck this field if you don't want discussion on your question.</small> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-primary">Ask</button>
                </div>
            </div>
        </div>
    </form>
</div>
