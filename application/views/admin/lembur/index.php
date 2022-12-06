<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?= $msg ?>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Filter Data Lembur Pegawai
          <?=  date('d F Y') ?>
        </div>
        <div class="card-body">
          <form class="form-inline" method="post" action="">
            <div class="form-group mb-2">
              <label for="bulan">Bulan</label>
              <select name="bulan" id="bulan" class="form-control ml-2">
                <option value="">-- Pilih Bulan --</option>
                <?php
                    foreach($optbulan as $key => $val){
                ?>
                    <option value="<?= $key ?>" <?= ($key == $bulan) ? 'selected' : '' ?>><?= $val ?></option>
                <?php
                    }
                ?>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="tahun">Tahun</label>
              <select name="tahun" id="tahun" class="form-control ml-2">
                <option value="">-- Pilih Tahun --</option>
                <?php $thn = date('Y'); 
                  for($i = 2020; $i < $thn + 5; $i++) { ?>
                  <option value="<?= $i; ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
            <button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#formaddlembur"><i class="fa fa-plus"></i> Input Lembur</button>
          </form>
        </div>
      </div>

      <?php 
      if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan.$tahun;
      } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulanTahun = $bulan.$tahun;
      }

      ?>

      <!-- Info Tanggal & Tahun -->
      <div class="alert alert-info mt-4" role="alert">Menampilkan Data Lembur Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Lembur</th>
            <th>Jumlah Lembur</th>
            <th>Upah</th>
          </tr>
          <?php $ttllmbur = 0; $ttlupah = 0; $no = 1; foreach($lembur as $a) : 
            $ttllmbur += $a['total_lembur'];
            $ttlupah += $a['total_lembur']*$a['upah_perjam'];
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $a['nik']; ?></td>
              <td><?= $a['nama_pegawai']; ?></td>
              <td><?= date('d F Y',strtotime($a['tanggal'])); ?></td>
              <td><?= $a['total_lembur']; ?></td>
              <td><?= $a['total_lembur']*$a['upah_perjam']; ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan=4><b>Total</b></td>
            <td><?= $ttllmbur; ?></td>
            <td><?= $ttlupah ?></td>
          </tr>
        </table>
          <?php if(empty($lembur)) : ?>
            <div class="alert alert-danger text-center" role="alert">Data tidak ditemukan.</div>
          <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="formaddlembur" tabindex="-1" aria-labelledby="formModalLabelPegawai">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelPegawai">Tambah Data Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input required type="date" name="tanggal" id="tanggal" class="form-control">
            <small class="muted text-danger"><?= form_error('tanggal'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_pegawai">Pegawai</label>
            <select class="form-control" name="id_pegawai" id="id_pegawai" required>
            <option value="">-- Pilih Pegawai --</option>
            <?php foreach($pegawai as $k => $v){
                
            ?>
                <option value="<?= $k ?>"><?= $v ?></option>
            <?php
            } ?>
            </select>
            <small class="muted text-danger"><?= form_error('id_pegawai'); ?></small>
          </div>
          <div class="form-group">
            <label for="jumlah_lembur">Jumlah Lembur</label>
            <input type="number" required name="jumlah_lembur" id="jumlah_lembur" class="form-control" value="<?= set_value('gaji_pokok'); ?>">
            <small class="muted text-danger"><?= form_error('jumlah_lembur'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addlembur" value="add" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





      
