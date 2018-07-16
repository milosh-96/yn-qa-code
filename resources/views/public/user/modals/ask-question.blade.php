<div class="modal" id="postNewQuestionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ask a Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Your question">
                    </div>
                    <div class="form-group">
                        <label for="question_text"><small><strong>Describe your question</strong></small></label>
                        <textarea id="question_text" name="question_text" class="form-control"></textarea>
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
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="col">
                                <label class="sr-only" for="inlineFormInputGroup">Answer 2</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Answer 2</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Here">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="d-inline-block pr-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Uncheck this field if you don't want discussion on your question.">
                            <input class="form-check-input" type="checkbox" checked value="1" id="enable_discussion">
                            <label class="form-check-label" for="enable_discussion">
                                Enable Discussion
                            </label>
                        </div>
                        <div class="helper d-md-none"> <small>Uncheck this field if you don't want discussion on your question.</small> </div>
                    </div>
                </form>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                <button type="button" class="btn btn-primary">Ask</button>
            </div>
        </div>
    </div>
</div>