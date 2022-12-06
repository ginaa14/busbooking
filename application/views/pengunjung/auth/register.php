<!-- ======= Contact Section ======= -->
<section id="contact" class="contact" style="padding-top:100px">
      <div class="container">
        <div class="section-title">
          <h2>Register</h2>
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
                <input required type="text" class="form-control" value="<?= $nama_lengkap ? $nama_lengkap : ''; ?>" name="nama_lengkap" id="subject" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="date" class="form-control" value="<?= $born_date ? $born_date : ''; ?>" name="born_date" id="subject" placeholder="Tanggal Lahir" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <?php 
                        foreach($opt_jk as $k => $v){
                    ?>
                        <option value="<?= $k ?>" <?= ($k == $jenis_kelamin) ? 'selected' : ''; ?>><?= $v ?></option>
                    <?php
                        }
                    ?>
                </select>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea required class="form-control" name="alamat" rows="3" placeholder="Alamat"><?= $alamat ? $alamat : ''; ?></textarea>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="text" class="form-control" value="<?= $notelp ? $notelp : ''; ?>" name="notelp" id="subject" placeholder="Nomor Telepon" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="email" class="form-control" value="<?= $email ? $email : ''; ?>" name="email" id="subject" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="text" class="form-control" value="<?= $username ? $username : ''; ?>" name="username" id="subject" placeholder="Username" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input required type="password" class="form-control" value="<?= $password ? $password : ''; ?>" name="password" id="subject" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group justify-content-between row mr-1">
                <a style="margin-left: 20px;" href="<?= base_url().'Pengunjung/auth/index'; ?>">Sudah punya akun?</a>
                <button class="btn btn-primary" id="btn_login" name="register" value="register" type="submit"><i class="bx bx-user"></i> Register</button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->