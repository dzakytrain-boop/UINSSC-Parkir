<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM laporan WHERE id='$id'");

header("Location: index.php?menu=laporan");