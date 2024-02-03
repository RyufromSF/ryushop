<!DOCTYPE html>
<html lang="en">
<head>
    <title>Read Pelanggan</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM pelanggan WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $pelanggan = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-pelanggan.php" method="POST">
        <h1>Lihat Pelanggan</h1>
        <input type="hidden" name="id" value="<?= $id ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $pelanggan["nama"] ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"value="<?= $pelanggan["alamat"] ?>"></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td><input type="text" name="no_telepon" value="<?= $pelanggan["no_telepon"] ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">SIMPAN</button>
                    <button type="reset">RESET</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>