<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pembelian</title>
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

    $sql = "SELECT pembelian.id, barang.nama as nama_barang, pembelian.jumlah, pembelian.total_harga, user.username, pembelian.created_at FROM barang JOIN pembelian on barang.id = pembelian.id_barang JOIN user ON user.id = pembelian.id_staff ORDER BY pembelian.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Pembelian</h1>
        <form action="new-pembelian.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Diinput oleh</th>
                <th>Waktu</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php while ($pembelian = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $pembelian["nama_barang"] ?></td>
                    <td><?= $pembelian["jumlah"] ?></td>
                    <td><?= $pembelian["total_harga"] ?></td>
                    <td><?= $pembelian["username"] ?></td>
                    <td><?= $pembelian["created_at"] ?></td>
                    <td>
                        <form action="read-pembelian.php" method="GET">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-pembelian.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile ?>
        </table>
    </div>
<br>
<br>
    <?php include "footer.php" ; ?>
    <script>
        function konfirmasi(from) {
            FormData = new FormData(from);
            id = FormData.get("id");
            return confirm(`hapus pembelian '${id}'?`)
        }
    </script>
</body>
</html>