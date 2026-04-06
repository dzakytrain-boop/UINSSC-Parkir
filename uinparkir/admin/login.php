<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4f7a5f, #fff8e7, #FFB6C1);
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            backdrop-filter: blur(6px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);    
}
        .btn-green {
            background-color:  #4f7a5f;
            color: white;
        }
        .btn-green:hover {
            background-color: #f5f5dc;
        }
    </style>
</head>
<body>

<div class="card p-4 shadow" style="width: 350px;">
    <h4 class="text-center mb-3">Login Admin</h4>

    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">Login gagal!</div>
    <?php endif; ?>

    <form method="POST" action="proses_login.php">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 text-center">
            <img src="captcha.php" alt="captcha"><br>
            <small>Ketik sesuai gambar</small>
        </div>

        <div class="mb-3">
            <input type="text" name="captcha" class="form-control" placeholder="Masukkan captcha" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-green w-100">Login</button>
            <a href="../index.php" class="btn btn-outline-secondary w-100">
            ⬅ Kembali ke Beranda
            </a>
        </div>
    </form>
</div>

</body>
</html>
