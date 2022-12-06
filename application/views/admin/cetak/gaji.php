<?php 
if((isset($_GET['bulan']) && $_GET['bulan'] != null) && (isset($_GET['tahun']) && $_GET['tahun'] != null)) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
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
							<div class="header">
								<h5>Rincian Gaji </h5>
							</div>
							<div class="table-responsive">
							  <table class="table table-bordered table-striped">
							    <tr>
							      <th>Tanggal</th>
							      <th>NIK</th>
							      <th>Nama Pegawai</th>
							      <th>Jenis Kelamin</th>
							      <th>Gaji Pokok / hari</th>
							    </tr>
							  <?php
							 	if(isset($cetakGaji) && !empty($cetakGaji)){
									$totalgaji = 0;
									foreach($cetakGaji as $row){
										$totalgaji += $row['gaji_pokok'];
								?>
									<tr>
										<td><?= date('d F Y',strtotime($row['tangal'])) ?></td>
										<td><?= $row['nik'] ?></td>
										<td><?= $row['nama_pegawai'] ?></td>
										<td><?= $row['jk_pegawai'] ?></td>
										<td><?= rupiah($row['gaji_pokok']); ?></td>
									</tr>
								<?php
									}
								?>
									<tr>
										<td colspan=4><b>TOTAL : </b></td>
										<td><b><?= rupiah($totalgaji); ?></b></td>
									</tr>
								<?php
								}else{
								?>
									<tr>
										<td colspan=5>Tidak ada data gaji untuk pegawai ini</td>
									</tr>
								<?php
								} 
							  ?>
							  </table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<div class="header">
								<h5>Rincian Lemburan </h5>
							</div>
							<div class="table-responsive">
							  <table class="table table-bordered table-striped">
							    <tr>
							      <th>Tanggal</th>
							      <th>NIK</th>
							      <th>Nama Pegawai</th>
							      <th>Jenis Kelamin</th>
							      <th>Upah/jam</th>
							      <th>Jumlah Jam Lembur</th>
							      <th>Total Upah</th>
							    </tr>
							  <?php
							 	if(isset($lemburan) && !empty($lemburan)){
									$totallemburan = 0;
									foreach($lemburan as $row){
									$totallemburan += $row['total_lembur']*$row['upah_perjam'];
								?>
									<tr>
										<td><?= date('d F Y',strtotime($row['tanggal'])) ?></td>
										<td><?= $row['nik'] ?></td>
										<td><?= $row['nama_pegawai'] ?></td>
										<td><?= $row['jk_pegawai'] ?></td>
										<td><?= $row['upah_perjam'] ?></td>
										<td><?= $row['total_lembur'] ?></td>
										<td><?= rupiah($row['total_lembur']*$row['upah_perjam']) ?></td>
									</tr>
								<?php
									}
								?>
									<tr>
										<td colspan=6><b>TOTAL : </b></td>
										<td><b><?= rupiah($totallemburan) ?></b></td>
									</tr>
								<?php
								}else{
								?>
									<tr>
										<td colspan=7 style="align:center">Tidak ada data lemburan untuk pegawai ini</td>
									</tr>
								<?php
								}
							  ?>
							  
							  </table>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md">
							<b>Total Upah yang diterima pegawai adalah sejumlah <?= rupiah($totalgaji+$totallemburan)?></b>
						</div>
					</div>
					<div class="row pt-2">
						<div class="col-md-4 offset-md-9">
							<table>
								<tr>
									<td></td>
									<td>
										<p>Jakarta, <?= date('d M Y'); ?>
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