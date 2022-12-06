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
          Filter Data Schedule
        </div>
        <div class="card-body">
          <form class="form=" method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                            <select class="form-control" required name="filterfrom" id="filterfrom">
                                <option value="">-- Keberangkatan --</option>
                                <?php
                                    if(isset($optloc) && !empty($optloc)){
                                        foreach($optloc as $r){
                                ?>
                                <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                            <select class="form-control" required name="filterto" id="filterto">
                                <option value="">-- Tujuan --</option>
                                <?php
                                    if(isset($optloc) && !empty($optloc)){
                                        foreach($optloc as $r){
                                ?>
                                <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <input class="form-control" type="date" name="key" id="key" placeholder="Tanggal" value="<?= isset($dates) ? $dates : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2 ml-auto btn-block"><i class="fas fa-eye"></i> Tampilkan Data</button>
                            </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mb-2 ml-2 btn-block" data-toggle="modal" data-target="#formaddschedule"><i class="fa fa-plus"></i> Tambah Schedule</button>
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
            <th style="text-align: center;">Tanggal</th>
            <th style="text-align: center;">BUS</th>
            <th style="text-align: center;">Keberangkatan - Tujuan</th>
            <th style="text-align: center;">Waktu Keberangkatan</th>
            <th style="text-align: center;">Perkiraan Waktu</th>
            <th style="text-align: center;">Availability</th>
            <th style="text-align: center;">Harga</th>
            <th style="text-align: center;">ACTION</th>
          </tr>
          <?php $no = 1; 
            if(isset($list) && !empty($list)) :
            foreach($list as $a) : 
          ?>
            <tr>
              <td style="text-align: center;"><?= $no++; ?></td>
              <td style="text-align: center;"><?= date('d F Y', strtotime($a['departure_time'])); ?></td>
              <td style="text-align: center;"><?= $a['bus_number']." | ".$a['name']; ?></td>
              <td style="text-align: center;"><?= $a['from']." - ".$a['to']; ?></td>
              <td style="text-align: center;"><?= date('d F Y H:i', strtotime($a['departure_time'])); ?></td>
              <td style="text-align: center;"><?= date('d F Y H:i', strtotime($a['eta'])); ?></td>
              <td style="text-align: center;"><?= $a['availability']; ?></td>
              <td style="text-align: center;"><?= "Rp. ". number_format($a['price']); ?></td>
              <td style="text-align: center;">
                <div class="btn-group">
                <button title="Edit Data" class="btn btn-warning btn-sm btn_ubahschedule" data-id="<?= $a['id'] ?>" data-busid="<?= $a['bus_id'] ?>" data-fromid="<?= $a['from_id'] ?>" data-toid="<?= $a['to_id'] ?>" data-price="<?= $a['price'] ?>" data-status="<?= $a['status']; ?>" data-eta="<?= date('Y-m-d H:i', strtotime($a['eta'])) ?>" data-tanggal="<?= date('Y-m-d H:i', strtotime($a['departure_time'])) ?>" data-avail="<?= $a['availability'] ?>"><i class="fa fa-edit"></i> </button>
                <button title="Hapus Data" class="btn btn-danger btn-sm btn_deleteschedule" data-id="<?= $a['id'] ?>"><i class="fa fa-trash"></i> </button>
                </div>
              </td>
            </tr>
          <?php endforeach; endif; ?>
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

<div class="modal fade" id="formaddschedule" tabindex="-1" aria-labelledby="formModalLabelBus">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelBus">Add Data Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="addjenisbus">Jenis Bus</label>
            <select class="form-control" required name="addjenisbus" id="addjenisbus">
                <option value="">-- Pilih Bus --</option>
                <?php
                    if(isset($optbus) && !empty($optbus)){
                        foreach($optbus as $r){
                ?>
                <option value="<?= $r['id'] ?>"><?= $r['bus_number']." | ".$r['name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <small class="muted text-danger"><?= form_error('addjenisbus'); ?></small>
          </div>
          <div class="form-group">
            <label for="addfrom">Keberangkatan</label>
            <select class="form-control" required name="addfrom" id="addfrom">
                <option value="">-- Keberangkatan --</option>
                <?php
                    if(isset($optloc) && !empty($optloc)){
                        foreach($optloc as $r){
                ?>
                <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <small class="muted text-danger"><?= form_error('addfrom'); ?></small>
          </div>
          <div class="form-group">
            <label for="addto">Tujuan</label>
            <select class="form-control" required name="addto" id="addto">
                <option value="">-- Tujuan --</option>
                <?php
                    if(isset($optloc) && !empty($optloc)){
                        foreach($optloc as $r){
                ?>
                <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <small class="muted text-danger"><?= form_error('addto'); ?></small>
          </div>
          <div class="form-group">
            <label for="addtdeptime">Tanggal Keberangkatan</label>
            <input class="form-control" type="datetime-local" name="addtdeptime" id="addtdeptime" placeholder="Tanggal Keberangkatan">
            <small class="muted text-danger"><?= form_error('addtdeptime'); ?></small>
          </div>
          <div class="form-group">
            <label for="addeta">Waktu Tiba</label>
            <input class="form-control" type="datetime-local" name="addeta" id="addeta" placeholder="Waktu Tiba">
            <small class="muted text-danger"><?= form_error('addeta'); ?></small>
          </div>
          <div class="form-group">
            <label for="addavail">Kapasitas Penumpang</label>
            <input class="form-control" type="nunber" min="1" name="addavail" id="addavail" placeholder="Kapasitas Penumpang">
            <small class="muted text-danger"><?= form_error('addavail'); ?></small>
          </div>
          <div class="form-group">
            <label for="addprice">Harga Tiket</label>
            <input class="form-control" type="text" name="addprice" id="addprice" placeholder="Harga Tiket">
            <small class="muted text-danger"><?= form_error('addprice'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="addschedule" value="addschedule" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formeditschedule" tabindex="-1" aria-labelledby="formModalLabelBus">
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
                <label for="editjenisbus">Jenis Bus</label>
                <input type="hidden" id="editid" name="editid">
                <select class="form-control" required name="editjenisbus" id="editjenisbus">
                    <option value="">-- Pilih Bus --</option>
                    <?php
                        if(isset($optbus) && !empty($optbus)){
                            foreach($optbus as $r){
                    ?>
                    <option value="<?= $r['id'] ?>"><?= $r['bus_number']." | ".$r['name']; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <small class="muted text-danger"><?= form_error('editjenisbus'); ?></small>
            </div>
            <div class="form-group">
                <label for="editfrom">Keberangkatan</label>
                <select class="form-control" required name="editfrom" id="editfrom">
                    <option value="">-- Keberangkatan --</option>
                    <?php
                        if(isset($optloc) && !empty($optloc)){
                            foreach($optloc as $r){
                    ?>
                    <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <small class="muted text-danger"><?= form_error('editfrom'); ?></small>
            </div>
            <div class="form-group">
                <label for="editto">Tujuan</label>
                <select class="form-control" required name="editto" id="editto">
                    <option value="">-- Tujuan --</option>
                    <?php
                        if(isset($optloc) && !empty($optloc)){
                            foreach($optloc as $r){
                    ?>
                    <option value="<?= $r['id'] ?>"><?= $r['terminal_name']; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <small class="muted text-danger"><?= form_error('editto'); ?></small>
            </div>
            <div class="form-group">
                <label for="edittdeptime">Tanggal Keberangkatan</label>
                <input class="form-control" type="datetime-local" name="edittdeptime" id="edittdeptime" placeholder="Tanggal Keberangkatan">
                <small class="muted text-danger"><?= form_error('edittdeptime'); ?></small>
            </div>
            <div class="form-group">
                <label for="editeta">Waktu Tiba</label>
                <input class="form-control" type="datetime-local" name="editeta" id="editeta" placeholder="Waktu Tiba">
                <small class="muted text-danger"><?= form_error('editeta'); ?></small>
            </div>
            <div class="form-group">
                <label for="editavail">Kapasitas Penumpang</label>
                <input class="form-control" type="nunber" min="1" name="editavail" id="editavail" placeholder="Kapasitas Penumpang">
                <small class="muted text-danger"><?= form_error('editavail'); ?></small>
            </div>
            <div class="form-group">
                <label for="editprice">Harga Tiket</label>
                <input class="form-control" type="text" name="editprice" id="editprice" placeholder="Harga Tiket">
                <small class="muted text-danger"><?= form_error('editprice'); ?></small>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="updateschedule" value="updateschedule" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formdeleteschedule" tabindex="-1" aria-labelledby="formModalLabeschedule">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabeschedule">Anda ingin menghapus data schedule ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      
      <div class="modal-footer">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="delidschedule" name="delidschedule">
          </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            <button type="submit" name="deleteschedule" value="deleteschedule" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
          </div>
        </form>
    </div>
  </div>
</div>




      
