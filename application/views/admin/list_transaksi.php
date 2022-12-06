<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Filter Data Transaksi
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="key" id="key" placeholder="Cari No Ref" value="<?= $key ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                        </div>
                    </div>
                </div>
            </div> </form>
        </div>
      </div>

      <!-- Info Tanggal & Tahun -->
      <?= $msg ?>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;">NO REF</th>
            <th style="text-align: center;">NAMA PEMESAN</th>
            <th style="text-align: center;">JURUSAN</th>
            <th style="text-align: center;">SIFAT</th>
            <th style="text-align: center;">AREA</th>
            <th style="text-align: center;">JUMLAH PENUMPANG</th>
            <th style="text-align: center;">TOTAL BAYAR</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: center;">AKSI</th>
          </tr>
          <?php $no = 1; foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= $a['ref_no']; ?></td>
              <td style="text-align: center;"><?= $a['name']; ?></td>
              <td style="text-align: center;"><?= $a['from']." - ".$a['to']; ?></td>
              <td style="text-align: center;"><?= $a['sifat_desc']; ?></td>
              <td style="text-align: center;"><?= $a['area_desc']; ?></td>
              <td style="text-align: center;"><?= $a['qty']; ?></td>
              <td style="text-align: center;"><?= "Rp. ". number_format($a['total']); ?></td>
              <td style="text-align: center;">
              <?php
                if($a['status'] == 0){
                    echo "Belum Bayar";
                }else if($a['status'] == 1){
                    echo "Menunggu Konfirmasi";
                }else{
                    echo "Sudah Bayar";
                }
              ?>
              </td>
              <td style="text-align: center;">
                <div class="btn-group">
                <button title="Tolak Konfirmasi Pembayaran" class="btn btn-warning btn-sm btn_ubahbus" data-id="<?= $a['id'] ?>"><i class="fa fa-times"></i>Reject</button>
                <button title="Konfirmasi Pembayaran" class="btn btn-success btn-sm btn_deletebus" data-id="<?= $a['id'] ?>"><i class="fa fa-check"></i>Approve</button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
          <?php if(empty($list)) : ?>
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

<div class="modal fade" id="formaddbus" tabindex="-1" aria-labelledby="formModalLabelBus">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelBus">Add Data Bus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="addname">Jenis Bus</label>
            <input class="form-control" type="text" name="addname" id="addname" placeholder="Jenis Bus">
            <small class="muted text-danger"><?= form_error('addname'); ?></small>
          </div>
          <div class="form-group">
            <label for="addbusnumber">Kode Bus</label>
            <input class="form-control" type="number" name="addbusnumber" id="addbusnumber" placeholder="Kode Bus" required>
            <small class="muted text-danger"><?= form_error('addbusnumber'); ?></small>
          </div>
          <div class="form-group">
            <label for="addpabrikan">Pabrikan</label>
            <input class="form-control" type="text" name="addpabrikan" id="addpabrikan" placeholder="Pabrikan">
            <small class="muted text-danger"><?= form_error('addpabrikan'); ?></small>
          </div>
          <div class="form-group">
            <label for="addnomesin">Nomor Mesin</label>
            <input class="form-control" type="text" name="addnomesin" id="addnomesin" placeholder="Nomor Mesin">
            <small class="muted text-danger"><?= form_error('addnomesin'); ?></small>
          </div>
          <div class="form-group">
            <label for="addplatnomor">Plat Nomor</label>
            <input class="form-control" type="text" name="addplatnomor" id="addplatnomor" placeholder="Plat Nomor">
            <small class="muted text-danger"><?= form_error('addplatnomor'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addbus" value="addbus" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formeditbus" tabindex="-1" aria-labelledby="formModalLabelBus">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelBus">Edit Data Bus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" id="editid" name="editid">
            <label for="editname">Nama Bus</label>
            <input class="form-control" type="text" name="editname" id="editname" placeholder="Nama Bus">
            <small class="muted text-danger"><?= form_error('editname'); ?></small>
          </div>
          <div class="form-group">
            <label for="editbusnumber">Bus Number</label>
            <input class="form-control" type="number" name="editbusnumber" id="editbusnumber" placeholder="Nomor Bus" required>
            <small class="muted text-danger"><?= form_error('editbusnumber'); ?></small>
          </div>
          <div class="form-group">
            <label for="editpabrikan">Pabrikan</label>
            <input class="form-control" type="text" name="editpabrikan" id="editpabrikan" placeholder="Pabrikan">
            <small class="muted text-danger"><?= form_error('editpabrikan'); ?></small>
          </div>
          <div class="form-group">
            <label for="editnomesin">Nomor Mesin</label>
            <input class="form-control" type="text" name="editnomesin" id="editnomesin" placeholder="Nomor Mesin">
            <small class="muted text-danger"><?= form_error('editnomesin'); ?></small>
          </div>
          <div class="form-group">
            <label for="editplatnomor">Plat Nomor</label>
            <input class="form-control" type="text" name="editplatnomor" id="editplatnomor" placeholder="Plat Nomor">
            <small class="muted text-danger"><?= form_error('editplatnomor'); ?></small>
          </div>
          <div class="form-group">
            <label for="editstatus">Status</label>
            <select class="form-control" name="editstatus" id="editstatus">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <small class="muted text-danger"><?= form_error('editbusnumber'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="updatebus" value="updatebus" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formdeletebus" tabindex="-1" aria-labelledby="formModalLabebus">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabebus">Anda ingin menghapus data bus ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      
      <div class="modal-footer">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="delidbus" name="delidbus">
          </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            <button type="submit" name="deletebus" value="deletebus" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
          </div>
        </form>
    </div>
  </div>
</div>




      
