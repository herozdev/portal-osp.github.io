<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h5 text-gray-900">Create an Account!</h1>
              <small class="mb-4">Input Your Biodata</small>
            </div>
            <form class="user" method="POST" action="<?=base_url('auth/registration');?>">
              <div class="form-group">
                <input type="text" name="user_pn" class="form-control form-control-user" id="user_pn" placeholder="Personal Number" value="<?=set_value('user_pn');?>">
                <?=form_error('user_pn', '<small class="text-danger pl-3">', '</small>');?>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Email Address" value="<?=set_value('email');?>">
                <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" name="firstname" class="form-control form-control-user" id="firstname" placeholder="First Name" value="<?=set_value('firstname');?>">
                  <?=form_error('firstname', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="col-sm-6">
                  <input type="text" name="lastname" class="form-control form-control-user" id="lastname" placeholder="Last Name" value="<?=set_value('lastname');?>">
                  <?=form_error('lastname', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                  <?=form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Repeat Password">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?=base_url('auth/forgot_password');?>">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?=base_url('auth');?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
