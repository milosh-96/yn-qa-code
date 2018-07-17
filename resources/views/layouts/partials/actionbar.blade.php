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
                    @if(auth()->user())
                    @include('public.user.modals.ask-question')
                    <button class="btn btn-primary w-100" data-toggle="modal" data-target="#postNewQuestionModal">Ask a New One</button>
                    @else
                    <button class="btn btn-primary w-100" data-toggle="modal" data-target="#loginModal">Login to Ask</button>
                    @endif
                </div>
            </div>