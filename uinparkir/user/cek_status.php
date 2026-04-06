<?php
include '../config/koneksi.php';
include '../components/header.php';
include '../components/navbar.php';
?>

<style>
.main-content {
    flex: 1;
    padding: 20px;
}

/* TIMELINE */
.timeline {
    position: relative;
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
}

.timeline::before {
    content: '';
    position: absolute;
    top: 15px;
    left: 0;
    width: 100%;
    height: 4px;
    background: #ccc;
    z-index: 1;
}

.timeline::after {
    content: '';
    position: absolute;
    top: 15px;
    left: 0;
    width: var(--progress);
    height: 4px;
    background: #4f7a5f;
    z-index: 2;
    transition: width 0.6s ease;
}

.step {
    text-align: center;
    width: 33%;
    position: relative;
    z-index: 3;
}

.circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: auto;
    background: #ccc;
    transition: 0.4s;
}

.circle.active {
    background: #4f7a5f;
    transform: scale(1.2);
    box-shadow: 0 0 10px rgba(79,122,95,0.5);
}

/* CARD */
.card {
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    animation: fadeIn 0.5s ease;
}

/* STATUS CARD */
.card-status {
    border-left: 5px solid;
}

.status-pending { border-color: #6c757d; }
.status-proses  { border-color: #0d6efd; }
.status-selesai { border-color: #198754; }

/* NOT FOUND */
.not-found {
    animation: fadeIn 0.5s ease;
}

.not-found:hover {
    transform: scale(1.02);
    transition: 0.3s;
}

/* ANIMASI */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(10px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

<main class="flex-fill">
    <div class="container mt-5">

        <h3>🔍 Cek Status Laporan</h3>

        <!-- SEARCH -->
        <form method="GET" class="my-3">
            <div class="d-flex">
                <input type="text" name="kode" class="form-control me-2"
                    placeholder="Masukkan Kode Laporan..."
                    value="<?= isset($_GET['kode']) ? $_GET['kode'] : '' ?>">

                <button class="btn btn-success">Cari</button>
            </div>
        </form>

    <?php
    if(!isset($_GET['kode']) || $_GET['kode'] == ''){
    ?>
        <div class="text-center text-muted mt-4">
            🔍 Masukkan kode laporan untuk melihat status
        </div>

    <?php
    } else {

        $kode = $_GET['kode'];

        $stmt = $conn->prepare("SELECT * FROM laporan WHERE kode_laporan = ?");
        $stmt->bind_param("s", $kode);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();

            $status = $data['status'];

            $pending = '';
            $proses  = '';
            $selesai = '';

            if($status == 'pending'){
                $pending = 'active';
                $progress = 33;
            } elseif($status == 'diproses'){
                $pending = 'active';
                $proses  = 'active';
                $progress = 66;
            } else {
                $pending = 'active';
                $proses  = 'active';
                $selesai = 'active';
                $progress = 100;
            }
    ?>

        <!-- 📦 DATA LAPORAN -->
        <div class="card p-4">

            <h5><b>Kode:</b> <?= $data['kode_laporan'] ?></h5>
            <hr style="border:none; height:2px; background:#4f7a5f;">
            <p><b>Nama:</b> <?= $data['nama'] ?></p>
            <p><b>Laporan:</b> <?= $data['isi_laporan'] ?></p>
            <p><b>Lokasi:</b> <?= $data['lokasi'] ?></p>

            <?php if($data['keterangan_user']){ ?>
                <p><b>Detail:</b> <?= $data['keterangan_user'] ?></p>
            <?php } ?>

            <?php if($data['bukti']){ ?>
                <img src="../assets/img/<?= $data['bukti'] ?>" width="200" class="mb-3">
            <?php } ?>

            <!-- TIMELINE -->
            <div class="timeline" style="--progress: <?= $progress ?>%">
                <div class="step">
                    <div class="circle <?= $pending ?>"></div>
                    <small>Pending</small>
                </div>

                <div class="step">
                    <div class="circle <?= $proses ?>"></div>
                    <small>Diproses</small>
                </div>

                <div class="step">
                    <div class="circle <?= $selesai ?>"></div>
                    <small>Selesai</small>
                </div>
            </div>
        </div>

        <!-- 📢 STATUS MESSAGE -->
        <div class="card mt-3 p-3 card-status 
        <?php 
            if($status=='pending') echo 'status-pending';
            elseif($status=='diproses') echo 'status-proses';
            else echo 'status-selesai';
        ?>">

            <h6>📢 Status Informasi</h6>

            <?php if($status == 'pending'){ ?>
                <p class="text-muted mb-0">
                    ⏳ Laporan kamu sudah diterima dan menunggu proses.
                </p>

            <?php } elseif($status == 'diproses'){ ?>
                <p class="text-primary mb-0">
                    🔧 Laporan sedang diproses oleh atmin.
                </p>

            <?php } else { ?>
                <p class="text-success mb-1">
                    ✅ Laporan sudah selesai ditangani.
                </p>
            <?php } ?>

        </div>

        <!-- 📸 BUKTI TINDAKAN -->
        <?php if($data['status'] == 'selesai' && $data['bukti_tindakan']){ ?>
            <div class="card mt-4 shadow-sm" style="border-radius:15px;">
                <div class="row g-0">

                    <div class="col-md-4 p-3">
                        <img src="../assets/img/<?= $data['bukti_tindakan'] ?>" 
                            class="img-fluid h-100"
                            style="object-fit: cover; border-radius:10px;">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><b>Bukti Tindakan</b></h5>
                            <hr style="border:none; height:2px; background:#4f7a5f;">
                            <p class="card-text">
                            <p><b>Atmin bersabda:</b> <?= $data['keterangan_tindakan'] ?? 'Tidak ada keterangan dari admin.' ?></p>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    🕒 Update terakhir: 
                                    <?= date('d M Y H:i', strtotime($data['updated_at'] ?? $data['created_at'])) ?>
                                </small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>

    <?php
        } else {
    ?>

        <!-- ❌ NOT FOUND -->
        <div class="d-flex justify-content-center mt-4 not-found">
            <div class="card text-center p-4" style="max-width: 400px; width:100%;">
                <div style="font-size:60px;">❌</div>
                <h5 class="mt-2">Kode Tidak Ditemukan</h5>
                <p class="text-muted">
                    Pastikan kode laporan yang kamu masukkan benar ya
                </p>
                <a href="cek_status.php" class="btn btn-success mt-2">
                    🔄 Coba Lagi
                </a>
            </div>
        </div>

    <?php
        }
    }
    ?>

    </div>
</main>

<br><br>

<?php include '../components/footer.php'; ?>