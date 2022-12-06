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
          Filter Data Terminal
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="key" id="key" placeholder="Cari Nama Terminal..." value="<?= $key ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mb-2 ml-2 btn-block" data-toggle="modal" data-target="#formaddloc"><i class="fa fa-plus"></i> Tambah Location</button>
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
            <th style="text-align: center;">NAMA TERMINAL</th>
            <th style="text-align: center;">KOTA</th>
            <th style="text-align: center;">PROVINSI</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: center;">AKSI</th>
          </tr>
          <?php $no = 1; foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= $a['terminal_name']; ?></td>
              <td style="text-align: center;"><?= $a['city']; ?></td>
              <td style="text-align: center;"><?= $a['state']; ?></td>
              <td style="text-align: center;"><?= $a['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
              <td style="text-align: center;">
                <div class="btn-group">
                <button title="Edit Data" class="btn btn-warning btn-sm btn_ubahloc" data-id="<?= $a['id'] ?>" data-status="<?= $a['status']; ?>" data-name="<?= $a['terminal_name'] ?>" data-city="<?= $a['city'] ?>" data-state="<?= $a['state'] ?>"><i class="fa fa-edit"></i></button>
                <button title="Hapus Data" class="btn btn-danger btn-sm btn_deleteloc" data-id="<?= $a['id'] ?>"><i class="fa fa-trash"></i> </button>
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

<div class="modal fade" id="formaddloc" tabindex="-1" aria-labelledby="formModalLabelLoc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelloc">Add Data Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" id="addid" name="addid">
            <label for="addterminal_name">Nama Terminal</label>
            <input class="form-control" type="text" name="addterminal_name" id="addterminal_name" placeholder="Nama Terminal">
            <small class="muted text-danger"><?= form_error('addterminal_name'); ?></small>
          </div>
          <div class="form-group">
            <label for="addcity">Kota</label>
            <input class="form-control" type="text" name="addcity" id="addcity" placeholder="Kota" required>
            <small class="muted text-danger"><?= form_error('addcity'); ?></small>
          </div>
          <div class="form-group">
            <label for="addstate">Provinsi</label>
            <input class="form-control" type="text" name="addstate" id="addstate" placeholder="Provinsi" required>
            <small class="muted text-danger"><?= form_error('addstate'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addloc" value="addloc" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formeditloc" tabindex="-1" aria-labelledby="formModalLabelLoc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelloc">Edit Data Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" id="editid" name="editid">
            <label for="editterminal_name">Nama Terminal</label>
            <input class="form-control" type="text" name="editterminal_name" id="editterminal_name" placeholder="Nama Terminal">
            <small class="muted text-danger"><?= form_error('editterminal_name'); ?></small>
          </div>
          <div class="form-group">
            <label for="editcity">Kota</label>
            <input class="form-control" type="text" name="editcity" id="editcity" placeholder="Kota" required>
            <small class="muted text-danger"><?= form_error('editcity'); ?></small>
          </div>
          <div class="form-group">
            <label for="editstate">Provinsi</label>
            <input class="form-control" type="text" name="editstate" id="editstate" placeholder="Provinsi" required>
            <small class="muted text-danger"><?= form_error('editstate'); ?></small>
          </div>
          <div class="form-group">
            <label for="editstatus">Status</label>
            <select class="form-control" name="editstatus" id="editstatus">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="updateloc" value="updateloc" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formdeleteloc" tabindex="-1" aria-labelledby="formModalLabeloc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabeloc">Anda ingin menghapus data location ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      
      <div class="modal-footer">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="delidloc" name="delidloc">
          </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            <button type="submit" name="deleteloc" value="deleteloc" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
          </div>
        </form>
    </div>
  </div>
</div>




      
