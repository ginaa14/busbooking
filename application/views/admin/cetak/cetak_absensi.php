<?php 
if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $bulanTahun = $bulan.$tahun;
  } else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan.$tahun;
  }
?>
	<div class="row">
		<div class="col-md">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">PT.Pegawai Indonesia</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="table-responsive">
								<table class="table">
									<tr>
										<th>Bulan</th>
										<td><?= $bulan; ?></td>
									</tr>
									<tr>
										<th>Tahun</th>
										<td><?= $tahun; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<div class="table-responsive">
						        <table class="table table-bordered table-striped">
						          <tr>
						            <th>No</th>
						            <th>NIK</th>
						            <th>Nama Pegawai</th>
									<th>Jenis Kelamin</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
						          </tr>
						          <?php $no = 1; foreach($absensi as $a) : ?>
						            <tr>
						              <td><?= $no++; ?></td>
						              <td><?= $a['nik']; ?></td>
						              <td><?= $a['nama_pegawai']; ?></td>
									  <td><?= jenis_kelamin($a['jk_pegawai'])?></td>
									  <td><?= date('d F Y',strtotime($a['tangal'])); ?></td>
									  <td><?= keterangan_absensi($a['keterangan'])?></td>
						            </tr>
						          <?php endforeach; ?>
						        </table>
						          <?php if(empty($absensi)) : ?>
						            <div class="alert alert-danger text-center" role="alert">Data tidak ditemukan.</div>
						          <?php endif; ?>
						      </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 offset-md-9">
							<table>
								<tr>
									<td></td>
									<td>
										<p>Jakarta, <?= date('d F Y'); ?><br>
                                        <br><br>
                                        <p>_______________________</p>
										</p>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
	window.print();
</script>