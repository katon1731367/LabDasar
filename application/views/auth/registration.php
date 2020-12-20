<img src="<?= base_url('assets/') ?>/img/wave.svg" class="wave">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user center" method="POST" action="<?= base_url('auth/registration') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="name" placeholder="Name" name="name" id="name" value="<?= set_value('name') ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nim" placeholder="NIM" name="nim" id="nim" value="<?= set_value('nim') ?>">
                    <?= form_error('nim','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="phone" placeholder="Phone Number" name="phone" value="<?= set_value('phone') ?>">
                    <?= form_error('phone','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email') ?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                  </div>
                </div>
                <input type="submit"  class="btn btn-primary btn-user btn-block" value="Register Account">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?=base_url()?>Auth/forgotpass">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url()?>Auth">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>