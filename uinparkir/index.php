<?php include 'components/header.php'; ?>
<?php include 'components/navbar.php'; ?>

<style>
/* 🌈 HERO */
.hero {
    background: linear-gradient(135deg, #198754, #0d6efd);
    color: white;
    padding: 80px 20px;
    text-align: center;
}

.hero h1 {
    font-weight: 700;
}

.hero p {
    opacity: 0.9;
}

/* ✨ GLASS CARD */
.glass {
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(10px);
    border-radius: 15px;
}

/* 🎯 CAROUSEL */
.carousel {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.carousel img {
    height: 380px;
    object-fit: cover;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45);
    border-radius: 20px;
}

.carousel-caption {
    color: white;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
    bottom: 30px;
}

/* 📘 STEP */
.step-box {
    border-left: 4px solid #198754;
    padding-left: 10px;
    margin-bottom: 15px;
}

/* 🔥 HOVER EFFECT */
.card-hover:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}
</style>

<!-- ✅ ALERT -->
<main class="flex-fill">
    <?php if(isset($_GET['pesan']) && isset($_GET['kode'])){ ?>
    <div class="container mt-3">
        <div class="alert alert-success text-center shadow glass">
            <h5>✅ Laporan berhasil dikirim!</h5>
            <p>Kode kamu:</p>
            <h4 class="fw-bold"><?= $_GET['kode'] ?></h4>

            <a href="user/cek_status.php?kode=<?= $_GET['kode'] ?>" 
            class="btn btn-success mt-2">
                🔍 Cek Status
            </a>
        </div>
    </div>
    <?php } ?>

    <!-- CAROUSEL -->
    <div class="container mt-5">
        <div id="carouselExample" class="carousel slide shadow overflow-hidden rounded-4" data-bs-ride="carousel">
            <div class="carousel-inner">

            <!-- ITEM 1 -->
            <div class="carousel-item active position-relative">
                <img src="assets/img/sepeda.jpeg" class="d-block w-100">

                <!-- overlay -->
                <div class="overlay"></div>

                <div class="carousel-caption">
                    <h4>Parkir Semrawut</h4>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="carousel-item position-relative">
                <img src="assets/img/mahat.jpeg" class="d-block w-100">

                <div class="overlay"></div>

                <div class="carousel-caption">
                    <h4>Laporkan Sekarang</h4>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="carousel-item position-relative">
                <img src="assets/img/fitk.jpeg" class="d-block w-100">

                <div class="overlay"></div>

                <div class="carousel-caption">
                    <h4>Bukti = Tindakan</h4>
                </div>
            </div>

        </div>

        <!-- tombol -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        </div>
    </div>

    <!-- FITUR -->
    <div class="container mt-5">
        <div class="row text-center">

            <div class="col-md-4">
                <div class="card p-4 shadow card-hover">
                    <h3>⚡ Cepat</h3>
                    <p>Laporan dikirim dalam hitungan detik</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow card-hover">
                    <h3>📍 Akurat</h3>
                    <p>Lokasi jelas + bukti foto</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow card-hover">
                    <h3>🔍 Transparan</h3>
                    <p>Cek status laporan kapan saja</p>
                </div>
            </div>

        </div>
    </div>

    <!-- PANDUAN -->
    <div class="container mt-5 mb-5">
        <div class="card glass shadow p-4">
            <h4 class="mb-3">📘 Cara Mengisi Laporan</h4>

            <div class="row">

                <div class="col-md-6">
                    <div class="step-box">
                        <b>1. Nama</b>
                        <p class="text-muted">Isi nama (boleh anonim)</p>
                    </div>

                    <div class="step-box">
                        <b>2. Laporan</b>
                        <p class="text-muted">Jelaskan masalah parkir</p>
                    </div>

                    <div class="step-box">
                        <b>3. Lokasi</b>
                        <p class="text-muted">Contoh: Depan Gedung A</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="step-box">
                        <b>4. Detail</b>
                        <p class="text-muted">Tambahan info penting</p>
                    </div>

                    <div class="step-box">
                        <b>5. Upload Foto</b>
                        <p class="text-muted">Format jpg/png</p>
                    </div>

                    <div class="step-box">
                        <b>6. Submit</b>
                        <p class="text-muted">Simpan kode laporan 🔑</p>
                    </div>
                </div>

            </div>

            <div class="text-center mt-3">
                <a href="user/form_pengaduan.php" class="btn btn-success px-4">
                    🚀 Mulai Laporan
                </a>
            </div>
        </div>
    </div>
</main>

<?php include 'components/footer.php'; ?>