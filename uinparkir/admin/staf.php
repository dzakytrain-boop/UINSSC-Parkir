<?php
include '../config/koneksi.php';
?>

<h3 class="mb-4">👨‍💼 Data Staf</h3>

<!-- 🔍 SEARCH -->
<form method="GET" class="my-3">
    <input type="hidden" name="menu" value="staf">

    <div class="d-flex">
        <input type="text" name="cari" class="form-control me-2"
            placeholder="Cari nama / username..."
            value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">

        <button type="submit" class="btn btn-success">Cari</button>
        <a href="?menu=staf" class="btn btn-secondary ms-2">Reset</a>
    </div>
</form>

<!-- ➕ TAMBAH -->
<div class="d-flex justify-content-end mb-3">
    <a href="?menu=tambah_staf" class="btn btn-primary">
        + Tambah Staf
    </a>
</div>

<!-- 📋 TABLE -->
<table class="table table-bordered table-hover bg-white shadow">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $no = 1;

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $query = mysqli_query($conn, "SELECT * FROM staf 
            WHERE nama LIKE '%$cari%' 
            OR username LIKE '%$cari%' 
            ORDER BY id DESC");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM staf ORDER BY id DESC");
    }

    if(mysqli_num_rows($query) > 0){
        while($data = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['username'] ?></td>
            <td>
                <div class="d-flex flex-column gap-2">
                    <a href="?menu=edit_staf&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_staf.php?id=<?= $data['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </div>
            </td>
        </tr>
    <?php 
        }
    } else {
    ?>
        <tr>
            <td colspan="4" class="text-center text-muted">Data tidak ditemukan</td>
        </tr>
    <?php } ?>
    </tbody>
</table>