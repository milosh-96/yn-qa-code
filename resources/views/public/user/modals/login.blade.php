<div class="modal" id="loginModal" tabindex="-1" role="dialog">
    <form action="{{route('auth.login')}}" method="POST">
        {{csrf_field()}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only" for="emailLogin">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email</div>
                            </div>
                            <input type="email" name="email" class="form-control" id="emailLogin" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="passwordLogin">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Password</div>
                            </div>
                            <input type="password" name="password" class="form-control" id="passwordLogin" placeholder="Your Password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Forgot Email/Password?</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </div>
    </div>
</form>

</div>