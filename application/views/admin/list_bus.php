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
          Filter Data Bus
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="key" id="key" placeholder="Cari Nama Bus..." value="<?= $key ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mb-2 ml-2 btn-block" data-toggle="modal" data-target="#formaddbus"><i class="fa fa-plus"></i> Tambah Bus</button>
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
            <th style="text-align: center;">JENIS BUS</th>
            <th style="text-align: center;">TYPE</th>
            <th style="text-align: center;">KODE BUS</th>
            <th style="text-align: center;">PABRIKAN</th>
            <th style="text-align: center;">NO MESIN</th>
            <th style="text-align: center;">PLAT NOMOR</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: center;">AKSI</th>
          </tr>
          <?php $no = 1; foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= $a['name']; ?></td>
              <td style="text-align: center;"><?= $a['sifat'] == 2 ? 'Institusi' : 'Pribadi'; ?></td>
              <td style="text-align: center;"><?= $a['bus_number']; ?></td>
              <td style="text-align: center;"><?= $a['pabrikan']; ?></td>
              <td style="text-align: center;"><?= $a['nomesin']; ?></td>
              <td style="text-align: center;"><?= $a['platnomor']; ?></td>
              <td style="text-align: center;"><?= $a['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
              <td style="text-align: center;">
                <button class="btn btn-warning btn-sm btn_ubahbus" data-id="<?= $a['id'] ?>" data-pabrikan="<?= $a['pabrikan'] ?>" data-nomesin="<?= $a['nomesin'] ?>" data-plat="<?= $a['platnomor'] ?>" data-status="<?= $a['status']; ?>" data-name="<?= $a['name'] ?>" data-sifat="<?= $a['sifat'] ?>" data-busnumber="<?= $a['bus_number'] ?>"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-sm btn_deletebus" data-id="<?= $a['id'] ?>"><i class="fa fa-trash"></i> Delete</button>
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
            <input class="form-control" type="text" name="addname" id="addname" placeholder="Jenis Bus" required>
            <small class="muted text-danger"><?= form_error('addname'); ?></small>
          </div>
          <div class="form-group">
            <label for="addbusnumber">Kode Bus</label>
            <input class="form-control" type="number" name="addbusnumber" id="addbusnumber" placeholder="Kode Bus" required>
            <small class="muted text-danger"><?= form_error('addbusnumber'); ?></small>
          </div>
          <div class="form-group">
            <label for="addpabrikan">Pabrikan</label>
            <input class="form-control" type="text" name="addpabrikan" id="addpabrikan" placeholder="Pabrikan" required>
            <small class="muted text-danger"><?= form_error('addpabrikan'); ?></small>
          </div>
          <div class="form-group">
            <label for="addnomesin">Nomor Mesin</label>
            <input class="form-control" type="text" name="addnomesin" id="addnomesin" placeholder="Nomor Mesin" required>
            <small class="muted text-danger"><?= form_error('addnomesin'); ?></small>
          </div>
          <div class="form-group">
            <label for="addsifat">TYPE</label>
            <select name="addsifat" id="addsifat" class="form-control" required>
              <option value="">-- Pilih Type --</option>
              <option value="1">Pribadi</option>
              <option value="2">Institusi</option>
            </select>
            <small class="muted text-danger"><?= form_error('addsifat'); ?></small>
          </div>
          <div class="form-group">
            <label for="addplatnomor">Plat Nomor</label>
            <input class="form-control" type="text" name="addplatnomor" id="addplatnomor" placeholder="Plat Nomor" required>
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
            <label for="editsifat">TYPE</label>
            <select name="editsifat" id="editsifat" class="form-control" required>
              <option value="">-- Pilih Type --</option>
              <option value="1">Pribadi</option>
              <option value="2">Institusi</option>
            </select>
            <small class="muted text-danger"><?= form_error('editsifat'); ?></small>
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




      
