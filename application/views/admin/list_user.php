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
          Filter Data User
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <input class="form-control" type="text" name="key" id="key" placeholder="Cari Nama User..." value="<?= $key ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mb-2 ml-2 btn-block" data-toggle="modal" data-target="#formaddmanager"><i class="fa fa-plus"></i> Tambah User</button>
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
            <th style="text-align: center;">NAMA</th>
            <th style="text-align: center;">TANGGAL LAHIR</th>
            <th style="text-align: center;">JENIS KELAMIN</th>
            <th style="text-align: center;">ALAMAT</th>
            <th style="text-align: center;">EMAIL</th>
            <th style="text-align: center;">NO TELP</th>
            <th style="text-align: center;">STATUS</th>
            <th style="text-align: center;">AKSI</th>
          </tr>
          <?php $no = 1; foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= $a['name']; ?></td>
              <td style="text-align: center;"><?= $a['born'] ? date('d F Y', strtotime($a['born'])) : ""; ?></td>
              <td style="text-align: center;"><?= $a['jenis_kelamin']; ?></td>
              <td style="text-align: center;"><?= $a['alamat']; ?></td>
              <td style="text-align: center;"><?= $a['email']; ?></td>
              <td style="text-align: center;"><?= $a['no_telp']; ?></td>
              <td style="text-align: center;"><?= $a['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
              <td style="text-align: center;">
                <button class="btn btn-warning btn-sm btn_ubahmanager" data-id="<?= $a['id'] ?>" data-alamat="<?= $a['alamat'] ?>" data-username="<?= $a['username'] ?>" data-telp="<?= $a['no_telp'] ?>" data-email="<?= $a['email']; ?>" data-status="<?= $a['status']; ?>" data-name="<?= $a['name'] ?>" data-jk="<?= $a['jenis_kelamin'] ?>"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-sm btn_deletemanager" data-id="<?= $a['id'] ?>"><i class="fa fa-trash"></i> Delete</button>
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

<div class="modal fade" id="formaddmanager" tabindex="-1" aria-labelledby="formModalLabelManager">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelManager">Add Data Manager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="addname">Nama Lengkap</label>
            <input class="form-control" type="text" name="addname" id="addname" placeholder="Nama Lengkap" required>
            <small class="muted text-danger"><?= form_error('addname'); ?></small>
          </div>
          <div class="form-group">
            <label for="addborn">Tanggal Lahir</label>
            <input class="form-control" type="date" name="addborn" id="addborn" placeholder="Tanggal Lahir" required >
            <small class="muted text-danger"><?= form_error('addborn'); ?></small>
          </div>
          <div class="form-group">
            <label for="addjk">Jenis Kelamin</label>
            <select class="form-control" name="addjk" id="addjk" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <small class="muted text-danger"><?= form_error('addjk'); ?></small>
          </div>
          <div class="form-group">
            <label for="addalamat">Alamat</label>
            <input class="form-control" type="text" name="addalamat" id="addalamat" placeholder="Alamat" required >
            <small class="muted text-danger"><?= form_error('addalamat'); ?></small>
          </div>
          <div class="form-group">
            <label for="addemail">Email</label>
            <input class="form-control" type="email" name="addemail" id="addemail" placeholder="Email@gmail.com" required>
            <small class="muted text-danger"><?= form_error('addemail'); ?></small>
          </div>
          <div class="form-group">
            <label for="addnotelp">No Telepon</label>
            <input class="form-control" type="text" name="addnotelp" id="addnotelp" placeholder="No Telepon" required>
            <small class="muted text-danger"><?= form_error('addnotelp'); ?></small>
          </div>
          <div class="form-group">
            <label for="addusername">Username</label>
            <input class="form-control" type="text" name="addusername" id="addusername" placeholder="Username" required >
            <small class="muted text-danger"><?= form_error('addusername'); ?></small>
          </div>
          <div class="form-group">
            <label for="addpassword">Password</label>
            <input class="form-control" type="password" name="addpassword" id="addpassword" placeholder="Password" required >
            <small class="muted text-danger"><?= form_error('addpassword'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addmanager" value="addmanager" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formeditmanager" tabindex="-1" aria-labelledby="formModalLabelManager">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelManager">Edit Data Manager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" id="editid" name="editid">
            <label for="editname">Nama Lengkap</label>
            <input class="form-control" type="text" name="editname" id="editname" placeholder="Nama Lengkap" required>
            <small class="muted text-danger"><?= form_error('editname'); ?></small>
          </div>
          <div class="form-group">
            <label for="editborn">Tanggal Lahir</label>
            <input class="form-control" type="date" name="editborn" id="editborn" placeholder="Tanggal Lahir" required >
            <small class="muted text-danger"><?= form_error('editborn'); ?></small>
          </div>
          <div class="form-group">
            <label for="editjk">Jenis Kelamin</label>
            <select class="form-control" name="editjk" id="editjk" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <small class="muted text-danger"><?= form_error('editjk'); ?></small>
          </div>
          <div class="form-group">
            <label for="editalamat">Alamat</label>
            <input class="form-control" type="text" name="editalamat" id="editalamat" placeholder="Alamat" required >
            <small class="muted text-danger"><?= form_error('editalamat'); ?></small>
          </div>
          <div class="form-group">
            <label for="editemail">Email</label>
            <input class="form-control" type="email" name="editemail" id="editemail" placeholder="Email@gmail.com" required>
            <small class="muted text-danger"><?= form_error('editemail'); ?></small>
          </div>
          <div class="form-group">
            <label for="editnotelp">No Telepon</label>
            <input class="form-control" type="text" name="editnotelp" id="editnotelp" placeholder="No Telepon" required>
            <small class="muted text-danger"><?= form_error('editnotelp'); ?></small>
          </div>
          <div class="form-group">
            <label for="editusername">Username</label>
            <input class="form-control" type="text" name="editusername" id="editusername" placeholder="Username" required >
            <small class="muted text-danger"><?= form_error('editusername'); ?></small>
          </div>
          <div class="form-group">
            <label for="editpassword">Password</label>
            <input class="form-control" type="password" name="editpassword" id="editpassword" placeholder="Password" required >
            <small class="muted text-danger"><?= form_error('editpassword'); ?></small>
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
            <button type="submit" name="updatemanager" value="updatemanager" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formdeletemanager" tabindex="-1" aria-labelledby="formModalLabeManager">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabeManager">Anda ingin menghapus data user ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      
      <div class="modal-footer">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="delidmanager" name="delidmanager">
          </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            <button type="submit" name="deletemanager" value="deletemanager" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
          </div>
        </form>
    </div>
  </div>
</div>




      
