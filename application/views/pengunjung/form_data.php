<section id="contact" class="contact" style="padding-top:100px">
      <div class="container">

        <div class="section-title">
          <h2><?= $title; ?></h2>
          <p>Silahkan melakukan pengisian data pemesanan.</p>
        </div>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
          <h4 class="title"><a href="">Data Pemesan</a></h4>
            <div class="row">
              <div class="col-lg-5">
                <b>Nama Lengkap</b>
              </div>
              <div class="col-lg-7">
                <p><?= $pengunjung->name; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <b>Jenis Kelamin</b>
              </div>
              <div class="col-lg-7">
                <p><?= $pengunjung->jenis_kelamin; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <b>No Telp</b>
              </div>
              <div class="col-lg-7">
                <p><?= $pengunjung->no_telp; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <b>Email</b>
              </div>
              <div class="col-lg-7">
                <p><?= $pengunjung->email; ?></p>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-5">
                <b>Alamat</b>
              </div>
              <div class="col-lg-7">
                <p><?= $pengunjung->alamat; ?></p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
        
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <h4 class="title"><a href="">Data Perjalanan</a></h4>
                  <div class="icon-box">
                    <b>Keberangkatan</b>
                    <p class="description"><?= $schedule['from']; ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Tujuan</b>
                    <p class="description"><?= $schedule['to']; ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Bus</b>
                    <p class="description"><?= $schedule['bus_number']."|".$schedule['name']; ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Waktu Keberangkatan</b>
                    <p class="description"><?= date('d F Y H:i:s', strtotime($schedule['departure_time'])); ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Perkiraan Tiba</b>
                    <p class="description"><?= date('d F Y H:i:s', strtotime($schedule['eta'])); ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Kapasitas Penumpang</b>
                    <p class="description"><?= $schedule['availability']; ?></p>
                  </div>
                  <div class="icon-box">
                    <b>Harga Tiket</b>
                    <p class="description"><?= "Rp. ". number_format($schedule['price']); ?></p>
                  </div>
                </div>
                <?php if($schedule['sifat'] == 1){
                ?>
                <div class="col-md-6 form-group pl-4">
                  <b>Silahkan Pilih Kursi</b>
                  <div class="form-row pt-2">
                    <div class="col-md-10 section-bg mt-2 mr-2" style="text-align:center;">
                        <b>DRIVER</b>
                    </div>
                    <?php
                        foreach($kursi as $row){
                    ?>
                    <div class="col-md-2 section-bg mt-2 mr-2">
                        <div class="form-row">
                            <div class="col-md-6">
                              <input class="form-control" style="width:20px;" name="kursi" id="kursi" value="<?= $row['number']; ?>" type="checkbox" <?= ($row['status'] == 1) ? 'checked disabled' : ''; ?>> 
                            </div>
                            <div class="col-md-6 pt-2">
                                <b><?= $row['number']; ?></b>
                            </div>
                        </div>
                    </div>
                    <?php
                    if($row['number'] % 2 == 0){
                    ?>
                    
                    <div class="col-md-1">
                    </div>
                    <?php
                    }
                        }
                    ?>
                  </div>
                </div>
                <?php
                } ?>
              </div>
              <button type="submit" class="btn btn-primary btn-sm">Pesan</button>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->