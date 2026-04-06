<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    mysqli_query($conn, "INSERT INTO staf (nama, username, password)
    VALUES ('$nama','$username','$password')");

    echo "<script>alert('Data berhasil ditambah');location='?menu=staf';</script>";
}
?>

<div class="container mt-4">
    <h3>➕ Tambah Staf</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="?menu=staf" class="btn btn-secondary">Kembali</a>
    </form>
</div>