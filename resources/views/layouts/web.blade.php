<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{mix('css/style.css')}}">
    <title>Document</title>
</head>
<body class="bg-dark">
    @include('layouts.partials.header')
    <div id="wrapper" class="container bg-white rounded-top">
        <div class="page px-2 py-4">
            <div class="row mb-4">
                <div class="col-12 col-md-9">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" placeholder="Search Any Questions">
                    </div>
                </div>
                <div class="col-12 col-md-1 text-center align-middle" style="height: 38px">
                    <span style="line-height: 38px">OR</span>
                </div>
                <div class="col-12 col-md-2">
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
                    <button class="btn btn-primary w-100" data-toggle="modal" data-target="#postNewQuestionModal">Post a New One</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <h2>
                        @yield('title')
                    </h2>
                    <hr>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script>
        detectmob();
        function detectmob() {
            if(window.innerWidth <= 800 && window.innerHeight <= 600) {
                $('[data-toggle="popover"]').popover("hide");
            } else {
                $('[data-toggle="popover"]').popover()
            }
        }
        
    </script>
</body>
</html>