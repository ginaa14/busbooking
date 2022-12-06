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
          Filter Data Area
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="key" id="key" placeholder="Cari Nama Area..." value="<?= $key ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mb-2 ml-2 btn-block" data-toggle="modal" data-target="#formaddbus"><i class="fa fa-plus"></i> Tambah Area</button>
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
            <th style="text-align: center;">AREA</th>
            <th style="text-align: center;">AKSI</th>
          </tr>
          <?php $no = 1; foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= $a['area']; ?></td>
              <td style="text-align: center;">
                <button class="btn btn-warning btn-sm btn_ubahbus" data-id="<?= $a['id'] ?>"  data-name="<?= $a['area'] ?>"><i class="fa fa-edit"></i> Edit</button>
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
        <h5 class="modal-title" id="formModalLabelBus">Add Data Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="addname">Nama Area</label>
            <input class="form-control" type="text" name="addname" id="addname" placeholder="Nama Area">
            <small class="muted text-danger"><?= form_error('addname'); ?></small>
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
            <label for="editname">Nama Area</label>
            <input class="form-control" type="text" name="editname" id="editname" placeholder="Nama Area">
            <small class="muted text-danger"><?= form_error('editname'); ?></small>
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
        <h5 class="modal-title" id="formModalLabebus">Anda ingin menghapus data area ini?</h5>
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




      
