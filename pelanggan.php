<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: url('https://img.freepik.com/premium-photo/paper-shopping-bag-blue-background_113876-2899.jpg');
    background-size: 100%;
}

div {
    max-width: 800px;
    margin: 20px auto;
}

h1 {
    text-align: center;
}

button {
    padding: 8px 16px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

form {
    display: inline-block;
    margin: 0;
}

    </style>
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
<br>
<br>
    <?php include "footer.php" ; ?>
    <script>
            function konfirmasi(form) {
                FormData = new FormData(form);
                id = FormData.get("id");
                return confirm(`Hapus pelanggan '${id}'?`)
            }
    </script>
</body>
</html>