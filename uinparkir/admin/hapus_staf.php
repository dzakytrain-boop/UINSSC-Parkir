<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM staf WHERE id='$id'");

echo "<script>alert('Data berhasil dihapus');location='index.php?menu=staf';</script>";