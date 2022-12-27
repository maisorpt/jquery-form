<?php
// insert data baru
 include 'koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenkel = $_POST['jenkel'];
$nohp = $_POST['noHp'];

$sql = "INSERT INTO `test1` (`no`, `nama`, `jenis`, `alamat`, `nohp`) VALUES (NULL, '$nama', '$jenkel', '$alamat', '$nohp');";

$conn->query($sql);
