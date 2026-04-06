<?php
include '../config/koneksi.php';

// ambil data
$nama = $_POST['nama'];
$isi  = $_POST['isi_laporan'];
$lokasi = $_POST['lokasi'];
$keterangan = $_POST['keterangan_user'];

// 🔥 generate kode laporan
$kode = "LAP" . date("YmdHis") . rand(100,999);

// upload gambar
$namaFile = $_FILES['bukti']['name'];
$tmp      = $_FILES['bukti']['tmp_name'];
$error    = $_FILES['bukti']['error'];

// folder tujuan
$folder = "../assets/img/";

// validasi upload
if($error === 4){
    die("Gambar belum diupload!");
}

// ambil ekstensi
$ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

// format yang diizinkan
$allowed = ['jpg','jpeg','png'];

if(!in_array($ext, $allowed)){
    die("Format file tidak didukung!");
}

// rename file
$namaBaru = time() . '_' . rand(100,999) . '.' . $ext;

// upload file
move_uploaded_file($tmp, $folder . $namaBaru);

// 🔥 simpan ke database
$stmt = $conn->prepare("INSERT INTO laporan 
(nama, isi_laporan, lokasi, keterangan_user, bukti, status, kode_laporan) 
VALUES (?, ?, ?, ?, ?, 'pending', ?)");

$stmt->bind_param("ssssss", $nama, $isi, $lokasi, $keterangan, $namaBaru, $kode);

// 🔥 WAJIB ADA INI
$stmt->execute();

// redirect
header("Location: ../index.php?pesan=berhasil&kode=$kode");
exit;
?>