<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin Simoju</title>

    <link rel="stylesheet" href="/simoju/public/assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container">

    <div class="welcome-box">

        <h1>Dashboard Admin</h1>

<h3>
Selamat Datang,
<?= $_SESSION['nama']; ?>
</h3>

<p>
    Sistem Monitoring Kualitas Suhu Udara
</p>
</div>

<div class="menu-box">

<h2>Menu Admin</h2>
<div class="button-group">

    <a href="#" class="menu-btn">
        Kelola User
    </a>

    <a href="#" class="menu-btn">
        Monitoring AQI
    </a>

    <a href="#" class="menu-btn">
        Kelola Edukasi
    </a>

    <a href="#" class="menu-btn">
        Lihat Notifikasi
    </a>

</div>
</div>
</div>
</div>
</body>
</html>
