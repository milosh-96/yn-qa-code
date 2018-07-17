<div class="modal" id="registerModal" tabindex="-1" role="dialog">
    <form action="{{route('auth.register')}}" method="POST">
        {{csrf_field()}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <div class="form-group">
                   <label class="sr-only" for="userNameRegister">User Name*</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">User Name*</div>
                            </div>
                            <input type="text" name="user_name" class="form-control" id="userNameRegister" placeholder="Your User Name">
                        </div>
                   </div>
                   <div class="form-group">
                   <label class="sr-only" for="firstNameRegister">First Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">First Name</div>
                            </div>
                            <input type="text" name="first_name" class="form-control" id="firstNameRegister" placeholder="Your First Name">
                        </div>
                   </div>
                   <div class="form-group">
                   <label class="sr-only" for="lastNameRegister">Last Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Last Name</div>
                            </div>
                            <input type="text" name="last_name" class="form-control" id="lastNameRegister" placeholder="Your Last Name">
                        </div>
                   </div>
                   <div class="form-group">
                   <label class="sr-only" for="emailRegister">Email*</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email*</div>
                            </div>
                            <input type="email" name="email" class="form-control" id="emailRegister" placeholder="Your Email">
                        </div>
                   </div>
                   <div class="form-group">
                   <label class="sr-only" for="passwordRegister">Password*</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Password*</div>
                            </div>
                            <input type="password" name="password" class="form-control" id="passwordRegister" placeholder="<Min: 6 characters>">
                        </div>
                   </div>
                   <div class="form-group">
                    <label>* - required field</label>
                   </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Already have an Account?</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </div>
    </div>
</form>

</div>