<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";

    $sql = "SELECT * FROM pelanggan";
    $query = mysqli_query($koneksi, $sql);
    ?>
    
    <div>
        <h1>Data pelanggan</h1>
        <form action="new-pelanggan.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No. Telepon</td>
                <td>Dibuat pada</td>
                <td>Diubah pada</td>
                <th colspan="2">Aksi</th>
            </tr>
            
            <?php $p = 1; ?>
            <?php while ($pelanggan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $p ?></td>
                    <td><?= $pelanggan["nama"] ?></td>
                    <td><?= $pelanggan["alamat"] ?></td>
                    <td><?= $pelanggan["no_telepon"] ?></td>
                    <td><?= $pelanggan["created_at"] ?></td>
                    <td><?= $pelanggan["updated_at"] ?></td>
                    <td>
                        <form action="read-pelanggan.php" method="GET">
                            <input type="hidden" name="id" value="<?= $pelanggan["id"] ?>">
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-pelanggan.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value="<?= $pelanggan["id"] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $p++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
            function konfirmasi(form) {
                FormData = new FormData(form);
                id = FormData.get("id");
                return confirm(`Hapus pelanggan '${id}'?`)
            }
    </script>
</body>
</html>