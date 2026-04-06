<?php
include '../config/koneksi.php';

// 🔥 ambil data statistik
$total      = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM laporan"))['jml'];
$pending    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM laporan WHERE status='pending'"))['jml'];
$diproses   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM laporan WHERE status='diproses'"))['jml'];
$selesai    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM laporan WHERE status='selesai'"))['jml'];
?>

<h3 class="mb-4">📊 Dashboard Admin</h3>

<!-- 🔥 CARD STATS -->
<div class="row mb-4">

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Total Laporan</h6>
            <h3><?= $total ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Pending</h6>
            <h3 class="text-secondary"><?= $pending ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Diproses</h6>
            <h3 class="text-warning"><?= $diproses ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Selesai</h6>
            <h3 class="text-success"><?= $selesai ?></h3>
        </div>
    </div>

</div>

<!-- 🔥 TABEL LAPORAN TERBARU -->
<div class="card p-3 shadow-sm">
    <h5 class="mb-3">📋 Laporan Terbaru</h5>

    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC LIMIT 5");

        while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= substr($data['isi_laporan'], 0, 50) ?>...</td>

                <td>
                    <span class="badge bg-<?=
                        $data['status']=='pending' ? 'secondary' :
                        ($data['status']=='diproses' ? 'warning' : 'success')
                    ?>">
                        <?= $data['status'] ?>
                    </span>
                </td>

                <td>
                    <a href="index.php?menu=edit_laporan&id=<?= $data['id'] ?>&from=dashboard" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>