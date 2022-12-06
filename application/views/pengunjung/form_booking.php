<section id="appointment" class="appointment section-bg" style="padding-top:100px">
      <div class="container">

        <div class="section-title">
          <h2>Booking Tiket Bus</h2>
          

        </div>

        <form action="<?= base_url()."pengunjung/booking/list_schedule"?>" method="get" role="form">
          <div class="form-row justify-content-center">
            <div class="col-md-6 form-group">
              <select name="from" id="from" class="form-control" required>
                <option value="">-- Pilih Keberangkatan --</option>
                <?php 
                  if(isset($terminal) && isset($terminal)){
                    foreach($terminal as $ter){
                  ?>
                  <option value="<?= $ter['id'] ?>"><?= $ter['terminal_name'] ?></option>
                  <?php
                    }
                  }
                ?>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="col-md-6 form-group">
              <select name="to" id="to" class="form-control" required>
                <option value="">-- Pilih Tujuan --</option>
                <?php 
                  if(isset($terminal) && isset($terminal)){
                    foreach($terminal as $ter){
                  ?>
                  <option value="<?= $ter['id'] ?>"><?= $ter['terminal_name'] ?></option>
                  <?php
                    }
                  }
                ?>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="col-md-6 form-group">
              <select name="type" id="type" class="form-control" required>
                <option value="">Tipe</option>
                <option value="1">Pribadi</option>
                <option value="2">Institusi</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="text-center"><button class="btn btn-primary" type="submit" name="caritiket" value="caritiket">Cari Tiket</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->