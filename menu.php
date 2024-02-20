<!DOCTYPE html>
<html lang="en">
<head>
    <style>/* Reset some default styles */
body, ul, li {
    margin: 0;
    padding: 0;
    list-style: none;
}

nav {
    background-color: blue; /* Set background color */
}

nav ul {
    display: flex;
}

nav ul li {
    position: relative;
    padding: 10px 20px;
    color: #fff; /* Set text color */
}

nav ul li:hover {
    background-color: #0056b3; /* Set background color on hover */
}

nav ul ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #0056b3;; /* Set background color for submenus */
}

nav ul li:hover > ul {
    display: inherit;
}

nav a {
    text-decoration: none;
    color: inherit;
    display: block;
}

nav ul ul li {
    padding: 10px;   /* Add border between submenu items */
}

nav ul ul li:hover {
    background-color: #1D1B86; /* Set background color on submenu item hover */
}
    </style>
</head>
<body>
<?php
    session_start();

    if (!array_key_exists("username", $_SESSION)) {
        header("location:logout.php");
    }
?>
<header>
<nav>
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
        <li style="margin-left: auto;">
                <img src="https://iconape.com/wp-content/png_logo_vector/settings.png" alt="Settings Logo" height="30" width="30">
                <ul>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Log out</a></li>
    </ul>
        </li>
    </ul>
</nav>

</header>
</body>
</html>