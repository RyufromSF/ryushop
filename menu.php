<?php
    session_start();

    if (!array_key_exists("username", $_SESSION)) {
        header("location:logout.php");
    }
?>

<nav>
    <link rel="stylesheet" href="menu.css">
    <ul>
        <li><a href="home.php">HOME</a></li>
        <li>MASTER
            <ul>
                <?php if ($_SESSION["level"] == "admin") : ?>
                    <li><a href="user.php">USER</a></li>
                <?php endif ?>
                <li><a href="barang.php">BARANG</a></li>
                <?php if ($_SESSION["level"] == "admin" || $_SESSION["level"] == "keuangan") : ?>
                    <li><a href="pelanggan.php">PELANGGAN</a></li>
                <?php endif ?>
            </ul>
        </li>
        <li>TRANSAKSI
            <ul>
                <li><a href="penjualan.php">Penjualan</a></li>
                <li><a href="pembelian.php">Pembelian</a></li>
            </ul>
        </li>
        <li>Selamat Datang, <?= $_SESSION["username"] ?>!
            <ul>
                <li><a href="profil.php">Profil</a></li>
                 <li><a href="logout.php">Log out</a></li>
            </ul>
        </li>
    </ul>
</nav>