<section id="appointment" class="appointment section-bg" style="padding-top:100px">
    <div class="containers" style="margin-left:40px; margin-right:40px;">

    <div class="section-title">
        <h2>Booking Tiket Bus</h2>
    </div>

    <table class="table table-striped table-bordered" id="schedule-field">
        <thead>
            <th style="text-align:center; ">No.</th>
            <th style="text-align:center; ">Tanggal</th>
            <th style="text-align:center; ">Bus</th>
            <th style="text-align:center; ">Keberangkatan</th>
            <th style="text-align:center; ">Tujuan</th>
            <th style="text-align:center; ">Waktu Berangkat</th>
            <th style="text-align:center; ">Perkiraan Sampai</th>
            <th style="text-align:center; ">Kapasitas Penumpang</th>
            <th style="text-align:center; ">Harga</th>
            <th style="text-align:center; ">Aksi</th>
        </thead>
        <tr>
            <?php
                if(isset($data_schedule) && !empty($data_schedule)){
                    $no = 1;
                    foreach($data_schedule as $r){
            ?>
            <tr>
                <td style="text-align:center; "><?= $no++ ?></td>
                <td style="text-align:center; "><?= date('d F Y', strtotime($r['departure_time'])); ?></td>
                <td style="text-align:center; "><?= $r['bus_number']."|".$r['name']; ?></td>
                <td style="text-align:center; "><?= $r['from']; ?></td>
                <td style="text-align:center; "><?= $r['to']; ?></td>
                <td style="text-align:center; "><?= date('d F Y H:i:s', strtotime($r['departure_time'])); ?></td>
                <td style="text-align:center; "><?= date('d F Y H:i:s', strtotime($r['eta'])); ?></td>
                <td style="text-align:center; "><?= $r['availability'] ?></td>
                <td style="text-align:center; "><?= "Rp. ".number_format($r['price']); ?></td>
                <td style="text-align:center; ">
                    <a href="<?= base_url().'Pengunjung/Booking/form_data?id='.$r['id']; ?>" class="btn btn-primary btn-sm">Pesan</a>
                </td>
            </tr>
            <?php
                    }
                }else{
            ?>
            <tr>
                <td colspan="10" style="text-align:center">Data Perjalanan tidak tersedia.</td>
            </tr>
            <?php
                }
            ?>
        </tr>
    </table>

    </div>
</section><!-- End Appointment Section -->