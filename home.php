<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <style>
        body {
            background: url('https://img.freepik.com/premium-photo/paper-shopping-bag-blue-background_113876-2899.jpg');
            background-size: 100%;
        }
.wrapper {
   max-width: 1170px;
   padding-left: 15px;
   padding-right: 15px;
   margin: 0 auto;
}
.card {
   display: flex;
   text-align: center;
   justify-content: space-between;
}
.card-item {
   flex-basis: 32%;
   position: relative;
}

.card-circle {
   width: 146px;
   height: 146px;
   border-radius: 100%;
   box-shadow: 0 1px 6px rgba(0,0,0,0.1);
   margin: 0 auto;
}

.card-text {
   background: #fff;
   border-radius: 20px;
   box-shadow: 0 1px 6px rgba(0,0,0,0.1);
   padding: 80px 20px 20px;
   margin-top: -73px;
}

.card img {
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   margin: 0 auto;
   width: 146px;
   height: 146px;
}
button {
    padding: 6px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    text-decoration: none;
}
button:hover {
    background-color: #0056b3;
}
        /* Gaya CSS untuk footer */
        footer {
            background-color: blue;
            text-align: center;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .twitter :hover {
            background-image: url(https://seeklogo.com/images/T/twitter-logo-C591CF37A1-seeklogo.com.png);
        }
h1 {
   text-align: center;
}

    </style>
</head>
<header>
<?php include "menu.php" ; ?>
<br>
<br>
<h1>Selamat Datang, <?= $_SESSION["username"] ?>!</h1>
<br>
<br>
<div class="wrapper">
   <div class="card">
   <?php if ($_SESSION["level"] == "admin") : ?>
      <div class="card-item">
         <div class="card-circle"></div>
         <img src="https://icon-library.com/images/web-user-icon/web-user-icon-12.jpg" alt="Icon">
         <div class="card-text">
            <h3>USER</h3>
            <p>Cek akun karyawan </p>
            <button><a href="user.php" style="text-decoration: none;">GO</a></button>
         </div>
      </div>
      <?php endif; ?>
      <div class="card-item">
         <div class="card-circle"></div>
         <img src="https://aset.stikeshamzar.ac.id/images/icon-barang.png" alt="Icon">
         <div class="card-text">
            <h3>BARANG</h3>
            <p>Cek barang dari toko</p>
            <button><a href="barang.php" style="text-decoration: none;">GO</a></button>
         </div>
      </div>
      <div class="card-item">
      <?php if ($_SESSION["level"] == "admin" || $_SESSION["level"] == "keuangan") : ?>
         <div class="card-circle"></div>
         <img src="https://cdn-icons-png.flaticon.com/512/3126/3126647.png" alt="Icon">
         <div class="card-text">
            <h3>PELANGGAN</h3>
            <p>Cek pelanggan toko</p>
            <button><a href="pelanggan.php" style="text-decoration: none;">GO</a></button>
         </div>
        <?php endif ?>
      </div>
   </div>
</div>
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
   <br>
        <p>&copy; 2024 Toko Ryu. All rights reserved.</p>
        <!-- Tautan Sosial Media dengan ikon Font Awesome -->
        <a href="https://www.facebook.com/" target="_blank"><img src="https://freepngimg.com/thumb/facebook/65539-logo-facebook-icon-free-clipart-hd-thumb.png" width="50"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="https://seeklogo.com/images/I/instagram-logo-A807AD378B-seeklogo.com.png" width="50"></a>
        <a href="https://twitter.com/" class="twitter"><img src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3205021/logo-twitter-icon-md.png" width="50"></a>
    </footer>
<body>
</body>
</html>