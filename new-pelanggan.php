<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Pelanggan</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "keuangan") {    
        echo "Anda tidak dapat menghapus data ini";
        exit;
    }
    ?>
    <div>
        <form action="create-pelanggan.php" method="POST">
            <h1>Tambah Pelanggan</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><input type="text" name="no_telepon"></td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">TAMBAH</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>