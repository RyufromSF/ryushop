<?php

require "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$no_telepon = $_POST["no_telepon"];

$sql = "UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pelanggan.php");
}