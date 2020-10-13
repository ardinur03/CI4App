<section>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="register-box">
          <div class="register-logo">
            <a style="text-decoration: none;">Register<b> Poliklinik Account</b></a>
          </div>

          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg">Register a new account</p>

              <?php if (!empty(session()->getFlashdata('validate'))) {
              ?>
                <div class="alert alert-danger" role="alert">
                  <?= $validate->listErrors(); ?>
                </div>
              <?php } ?>

              <?php if (!empty(session()->getFlashdata('success'))) { ?>

                <div class="alert alert-success">
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
              <?php } ?>
              <?php if (!empty(session()->getFlashdata('info'))) { ?>

                <div class="alert alert-primary">
                  <?php echo session()->getFlashdata('info'); ?>
                </div>
              <?php } ?>
              <?php if (!empty(session()->getFlashdata('warning'))) { ?>

                <div class="alert alert-danger">
                  <?php echo session()->getFlashdata('warning'); ?>
                </div>
              <?php } ?>

              <form action="/Auth/register" method="post">

                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="name" placeholder="Full name" value="<?= old('name'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?= old('email'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" value="<?= old('password'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div class="input-group mb-3">
                      <select class="form-control" name="level">
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <!-- <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                      <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                      </label>
                    </div>
                  </div> -->
                  <!-- /.col -->
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <!-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i>
                  Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i>
                  Sign up using Google+
                </a>
              </div> -->

              <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
            </div>
            <!-- /.form-box -->
          </div><!-- /.card -->
        </div>
        <!-- /.register-box -->
      </div>
    </div>
  </div>
</section>