<?php
include '../config/koneksi.php';
?>

<h3 class="mb-4">📋 Data Laporan</h3>

<table class="table table-bordered table-hover bg-white shadow">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Laporan</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC");

    while($data = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['isi_laporan'] ?></td>
            <td><?= $data['lokasi'] ?></td>
            <td><?= $data['keterangan_user'] ?></td>

            <td>
                <?php if($data['bukti']){ ?>
                    <img src="../assets/img/<?= $data['bukti'] ?>" width="80">
                <?php } ?>
            </td>

            <td>
                <span class="badge bg-<?=
                    $data['status']=='pending' ? 'secondary' :
                    ($data['status']=='diproses' ? 'warning' : 'success')
                ?>">
                    <?= $data['status'] ?>
                </span>
            </td>

            <td>
                <div class="d-flex flex-column gap-2">
                    <a href="index.php?menu=edit_laporan&id=<?= $data['id'] ?>&from=data_laporan" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_laporan.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </div>    
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>