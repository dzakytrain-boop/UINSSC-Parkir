<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM staf WHERE id='$id'"));

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];

    if($_POST['password'] != ''){
        $password = md5($_POST['password']);
        mysqli_query($conn, "UPDATE staf SET 
            nama='$nama',
            username='$username',
            password='$password'
            WHERE id='$id'");
    } else {
        mysqli_query($conn, "UPDATE staf SET 
            nama='$nama',
            username='$username'
            WHERE id='$id'");
    }

    echo "<script>alert('Data berhasil diupdate');location='?menu=staf';</script>";
}
?>

<div class="container mt-4">
    <h3>✏️ Edit Staf</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="?menu=staf" class="btn btn-secondary">Kembali</a>
    </form>
</div>