<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'"));
$from = isset($_GET['from']) ? $_GET['from'] : 'data_laporan';
?>

<h3>Edit Laporan</h3>

<form method="POST" action="proses_edit_laporan.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="hidden" name="from" value="<?= $from ?>">

    <!-- 📌 Status -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending" <?= $data['status']=='pending'?'selected':'' ?>>Pending</option>
            <option value="diproses" <?= $data['status']=='diproses'?'selected':'' ?>>Diproses</option>
            <option value="selesai" <?= $data['status']=='selesai'?'selected':'' ?>>Selesai</option>
        </select>
    </div>

    <!-- 📸 Upload Bukti -->
    <div class="mb-3">
        <label>Bukti Tindakan (wajib jika selesai)</label>
        <input type="file" name="bukti_tindakan" class="form-control">
    </div>

    <!-- 📝 Keterangan -->
    <div class="mb-3">
        <label>Keterangan Tindakan</label>
        <textarea name="keterangan_tindakan" class="form-control" rows="3"><?= $data['keterangan_tindakan'] ?? '' ?></textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="index.php?menu=<?= $from ?>" class="btn btn-secondary">← Kembali</a>
</form>