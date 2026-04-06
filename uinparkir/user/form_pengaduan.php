<?php include '../components/header.php'; ?>
<?php include '../components/navbar.php'; ?>

<!-- FORM -->
<main class="flex-fill"> 
    <div class="container mt-5">
        <h3  class="mb-3 text-center">📝 Form Pengaduan</h3>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card p-4">

                    <form action="proses_pengaduan.php" method="POST" enctype="multipart/form-data">

                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control mb-3" required>

                        <label>Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control mb-3" rows="4" required></textarea>

                        <label>Lokasi Kejadian</label>
                        <input type="text" name="lokasi" class="form-control mb-3" required>
                        
                        <label>Deskripsi Tambahan</label>
                        <textarea name="keterangan_user" class="form-control mb-3" rows="3"></textarea>
                        
                        <label>Upload Bukti</label>
                        <input type="file" name="bukti" class="form-control mb-3" required>

                        <button type="submit" class="btn btn-success w-100">
                            🚀 Kirim Laporan
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
<br>
<br>

<?php include '../components/footer.php'; ?>