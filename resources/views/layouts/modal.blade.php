<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <img src="{{asset("storage/avatars/".auth()->user()->avatar)}}" alt="avatar" class="img-circle" width="100" />
            </div>
            <form action="{{route('profile')}}" method="post">
      		    {{csrf_field()}}
                <div class="modal-body">
                <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="form-group">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form34">Fullname</label>
                        <input type="text"name="name"  id="name" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form29">Your email</label>
                        <input type="email" name="email" id="email" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fa fa-tag prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form32">Username</label>
                        <input type="text" name="username" id="username" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form32">New Password</label>
                        <input type="password" name="password" id="password" class="form-control validate">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-lock prefix gray-text"></i>
                        <label data-error="wrong" data-success="right" for="form32">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                            <i class="fa fa-phone prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="form32">Phone</label>
                            <input type="text" name="contact" id="contact" class="form-control validate">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>