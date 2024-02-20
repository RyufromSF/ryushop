<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('https://img.freepik.com/free-photo/lilac-paper-bag-blue-background-top-view_169016-43520.jpg');
            background-size: cover; /* Add this line to cover the entire background */
            background-position: center; /* Add this line to center the background */
            opacity: var(.5);
        }

form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 9); /* Add this line for drop shadow */
            text-align: center; /* Center text inside the form */
}

h1 {
    margin-bottom: 20px; /* Memberikan jarak bawah pada judul */
}

table {
    width: 100%;
}

td {
    padding: 8px;
}

button {
    padding: 8px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>
    <form action="validasi.php" method="POST">
        <h1>Selamat Datang!</h1>
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">LOGIN</button>
                    <button type="reset">CLEAR</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>