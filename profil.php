<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil</title>
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

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $user = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-profil.php" method="POST">
            <h1>Profil</h1>
            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Username</td>
                    <td>:<input readonly type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password Baru</td>
                    <td>:<input required type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Ulangi Password Baru</td>
                    <td>:<input required type="password" name="confirm_password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<br>
<br>
    <?php include "footer.php" ; ?>
</body>
</html>