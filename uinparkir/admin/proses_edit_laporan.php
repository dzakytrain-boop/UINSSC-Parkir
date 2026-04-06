<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan_tindakan'];
$from = $_POST['from'] ?? 'data_laporan';
$namaBukti = null;

// 📸 cek upload file
if(isset($_FILES['bukti_tindakan']) && $_FILES['bukti_tindakan']['error'] == 0){

    $file = $_FILES['bukti_tindakan']['name'];
    $tmp  = $_FILES['bukti_tindakan']['tmp_name'];

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png'];

    if(in_array($ext, $allowed)){
        $namaBukti = time() . '_staff.' . $ext;
        move_uploaded_file($tmp, "../assets/img/" . $namaBukti);
    } else {
        echo "<script>alert('Format file harus JPG/JPEG/PNG!');history.back();</script>";
        exit;
    }
}

// 🚨 VALIDASI WAJIB kalau selesai
if($status == 'selesai' && !$namaBukti){
    echo "<script>alert('Harus upload bukti jika status selesai!');history.back();</script>";
    exit;
}

// 🔥 update database
if($namaBukti){
    mysqli_query($conn, "UPDATE laporan 
        SET status='$status', 
            bukti_tindakan='$namaBukti',
            keterangan_tindakan='$keterangan'
        WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE laporan 
        SET status='$status',
            keterangan_tindakan='$keterangan'
        WHERE id='$id'");
}

// redirect
header("Location: index.php?menu=" . $from);
exit;
?>