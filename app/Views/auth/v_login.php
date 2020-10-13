<section id="login-section">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-7">
        <!-- sweetAlert -->
        <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
        <div class="ggl" data-swal="<?= session()->get('message_error'); ?>"></div>
        <div class="login-logo">
          <h2>Poliklinik Login</h2>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="/auth/login" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block" id="tombol">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <!-- <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div> -->
            <!-- /.social-auth-links -->

            <!-- <p class="mb-1">
              <a href="forgot-password.html" style="text-decoration: none;">I forgot my password</a>
            </p> -->
            <!-- <p class="mb-0">
              <a href="register.html" class="text-center">Register Akun</a>
            </p> -->
          </div>
          <!-- /.login-card-body -->
        </div>
        <!-- /.login-box -->
      </div>
    </div>
  </div>
</section>