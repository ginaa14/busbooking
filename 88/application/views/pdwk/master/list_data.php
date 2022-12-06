<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<noscript><meta http-equiv="refresh" content="0; URL=<?=site_url('error/noScript')?>"/></noscript>
<h3 class="maintitle"><i class="fa fa-address-book"></i> Data Penerima PDWK</h3>
<?=$msg?>
<div class="row mt-2 mb-2">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="card border-primary">
			<div class="card-header text-white bg-primary"><b><i class="fa fa-search"></i> Filter Pencarian</b></div>
			<div class="card-body">
				<?=form_open('pdwk/PengajuanController', array('method'=>'GET','class'=>'form-horizontal','id'=>'search_filter'));?>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><b>Personal Number</b></div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<input type="text" name="keyword" id="keyword" class="form-control">
					</div>
                </div>
				<div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="btn-group">
							<button type="button" class="btn btn-primary" name="search" id="btn_cari" value="Cari" title="Klik di sini untuk mencari data."><i class="fa fa-search fa-fw"></i> Cari</button>
							<button type="button" class="btn btn-success" name="show_all" id="show_all" value="Semua" title="Klik di sini untuk menampilkan semua data."><i class="fa fa-file-alt"></i> Semua</button>
							<button type="button" class="btn btn-warning" name="add_data" id="add_data" style="color:white;" title="Tambah data SLA"><i class="fa fa-plus"></i> Tambah</button>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#importpenerimamodal" name="import_penerima" id="import_penerima" title="Klik di sini untuk "><i class="fa fa-file"></i> Import Excel</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importjabatanmodal" name="import_jabatan" id="import_jabatan" title="Klik di sini untuk "><i class="fa fa-file"></i> Import Riwayat Jabatan</button>
						</div>
					</div>
				</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>
<div class="row mt-2 mb-2">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="card border-primary">
			<div class="card-header">
				<b><i class="fa fa-list"></i> Data Penerima PDWK</b>
			</div>
				<div class="card-body">	
					<div class="table-responsive">
					<table class="table table_list table_condensed table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th style="text-align:center;width:5%;">NO. </th>
								<th style="text-align:center;width:15%;">NAMA PENERIMA</th>
								<th style="text-align:center;width:15%;">PN PENERIMA </th>
								<th style="text-align:center;width:20%;">JABATAN</th>
								<th style="text-align:center;width:15%;">UKER</th>
								<th style="text-align:center;width:15%;">JG/PG</th>
								<th style="text-align:center;width:15%;">AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($list) && !empty($list)){
									$no = $rowpos + 1;
									foreach($list as $row){
							?>
								<tr>
									<td style="text-align: center;"><?= $no++; ?></td>
									<td style="text-align: left;"><?= $row['nama'] ?></td>
									<td style="text-align: center;"><?= $row['pernr']?></td>
									<td style="text-align: left;"><?= $row['jabatan'] ?></td>
									<td style="text-align: left;"><?= $row['uker'] ?></td>
									<td style="text-align: center;"><?= $row['jg']."/".$row['pg']; ?></td>
									<td style="text-align: center;"><button rel="<?= $row['pernr']; ?>" tpye="button" name="detail_data" id="detail_data" class="btn btn-primary detail_data" title="Klik untuk melihat detail data penerima pdwk"><i class="fa fa-eye"></i></button></td>
								</tr>
							<?php
									}
								}else{
							?>
							<tr>
								<td style="text-align: center;" colspan=7>
									Data tidak ditemukan
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
					</div>
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-center">	
						<?=$pagging;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="importpenerimamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Import Penerima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= site_url('pdwk/MasterController/import_penerima') ?>" method="POST"  enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-md-12">
					<div class="input-group">
						<input required type="file" class="form-control"  name="filepenerima" id="filepenerima" rel="File Riwayat Jabatan">
						<div class="input-group-append">
							<button type="submit" value="import" id="import" name="import" class="btn btn-primary"> Import</button>
						</div>
					</div>
				</div>
			</div>       
		</form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="importjabatanmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Import Riwayat Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?= site_url('pdwk/MasterController/import_jabatan') ?>" method="POST"  enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-md-12">
					<div class="input-group">
						<input required type="file" class="form-control"  name="filejabatan" id="filejabatan" rel="File Jabatan">
						<div class="input-group-append">
							<button type="submit" value="import" id="import" name="import" class="btn btn-primary"> Import</button>
						</div>
					</div>
				</div>
			</div>       
		</form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".detail_data").off().click(function(){
			$.ajax({
				type	: "POST",
				url		: '<?=site_url('pdwk/MasterController/detail_data/'.$pagepos.(count($_GET)>0?'?'.http_build_query($_GET):''))?>',
				data: 'mt=1&pernr='+$(this).attr('rel'),
				beforeSend:function(){
					$('#ajax-loader').show();
				},
				error:function(){
					$('#ajax-loader').hide();
					alert('Gagal membuka halaman.');
				},
				success:function(response){
					$('#ajax-loader').hide();
					$('.main-content').html(response);
				}
			});
		})
	});
</script>