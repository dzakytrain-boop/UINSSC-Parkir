<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$menu = isset($_GET['menu']) ? $_GET['menu'] : "dashboard";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4f7a5f, #fff8e7, #FFB6C1);
        }

        h1, h2, h3, h4 {
            font-weight: 600;
        }

        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            background: #3f5f4b;
            padding-top: 20px;
            color: white;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #4f7a5f;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .card {
            border-radius: 12px;
            background: rgba(255,255,255,0.9);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #3f5f4b;
            color: white;
            margin-top: auto;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>UINSSC Parkir</h4>
    <hr style="border:none; height:2px; background:#4f7a5f;">
    <a href="../index.php">🏠 Home</a>
    <a href="index.php?menu=dashboard">📊 Dashboard</a>
    <a href="index.php?menu=laporan">📋 Data Laporan</a>
    <a href="index.php?menu=staf">👨‍💼 Staf</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<?php
// ROUTING
if ($menu == "dashboard") {
    include "dashboard.php";
} 
else if ($menu == "laporan") {
    include "data_laporan.php";
} 
else if ($menu == "edit_laporan") {
    include "edit_laporan.php";
}
else if($menu == "staf"){
    include "staf.php";
}
else if($menu == "tambah_staf"){
    include "tambah_staf.php";
}
else if($menu == "edit_staf"){
    include "edit_staf.php";
}
else {
    include "dashboard.php";
}
?>

<!-- FOOTER -->
<footer>
    © 2026 UIN Parkir | Sistem Pengaduan
</footer>

</div>

</body>
</html>