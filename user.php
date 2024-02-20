<!DOCTYPE html>
<html>
<head>
    <title>User</title>
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
        if ($_SESSION["level"] != "admin") {
            echo "Anda tidak dapat mengakses halaman ini";
        exit;
            }
        require "koneksi.php";

        $sql = "SELECT * FROM user";
        $query = mysqli_query($koneksi, $sql);
        ?>

        <div>
            <h1>Data User</h1>
            <form action="new-user.php" method="GET">
                <button type="submit">Tambah</button>
            </form>
            <table border="1">
                <tr>
                    <td>No.</td>
                    <td>Username</td>
                    <td>Level</td>
                    <td>Dibuat pada</td>
                    <td>Diubah pada</td>
                    <th colspan="2">Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php while ($user = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $user["username"] ?></td>
                        <td><?= $user["level"] ?></td>
                        <td><?= $user["created_at"] ?></td>
                        <td><?= $user["updated_at"] ?></td>
                        <td>
                            <form action="read-user.php" method="GET">
                                <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                <button type="submit">Lihat</button>
                            </form>
                        </td>
                        <td>
                            <form action="delete-user.php" method="POST" onsubmit="return konfirmasi(this)">
                                <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile ?>
            </table>
        </div>
        <script>
            function konfirmasi(form) {
                FormData = new FormData(form);
                id = FormData.get("id");
                return confirm(`Hapus user '${id}'?`)
            }
        </script>
<br>
<br>
    <?php include "footer.php" ; ?>
    </body>

</html>