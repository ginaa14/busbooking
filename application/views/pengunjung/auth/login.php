<!-- ======= Contact Section ======= -->
<section id="contact" class="contact" style="padding-top:100px">
      <div class="container">
        <div class="section-title">
          <h2>Login</h2>
          <?= $msg; ?>
        </div>
      </div>
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-3">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0">
            <form action="" method="post" role="form">
              <div class="form-group">
                <input required type="email" class="form-control" value="<?= $email ? $email : ''; ?>" name="email" id="subject" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="password" class="form-control" value="<?= $password ? $password : ''; ?>" name="password" id="subject" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group justify-content-between row mr-1">
                <a style="margin-left: 20px;" href="<?= base_url().'Pengunjung/auth/register'; ?>">Belum punya akun?</a>
                <button class="btn btn-primary" id="btn_login" name="login" value="login" type="submit"><i class="bx bx-lock"></i> Login</button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->