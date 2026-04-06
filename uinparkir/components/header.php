<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>UIN Parkir</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
html {
    overflow-y: scroll;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #c7e9c0, #fff5e6);
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* tinggi minimum 100% viewport */
    margin: 0;
}

/* NAVBAR */
.navbar {
    background: #4f7a5f;
}

.navbar-brand {
    font-weight: 600;
}

/* HERO */
.hero {
    padding: 80px 20px;
    text-align: center;
}

.hero p {
    color: #555;
}

/* CARD */
.card {
    border-radius: 12px;
    background: rgba(255,255,255,0.95);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* BUTTON */
.btn-success {
    background: #4f7a5f;
    border: none;
}

.btn-success:hover {
    background: #3f5f4b;
}

/* FOOTER */
footer {
    background: #4f7a5f;
    color: white;
    text-align: center;
    padding: 12px;
    margin-top: 50px;
}

/* 🔥 timeline */
.timeline {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.step {
    text-align: center;
    width: 33%;
}

.circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: auto;
    background: #ccc;
}

.active {
    background: #4f7a5f;
}

.line {
    height: 4px;
    background: #ccc;
    position: relative;
    top: -17px;
    z-index: -1;
}

.line.active {
    background: #4f7a5f;
}

img {
    border-radius: 8px;
}
</style>
</head>
<body class="d-flex flex-column min-vh-100">