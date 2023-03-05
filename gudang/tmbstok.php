<?php
include '../koneksi.php';
$t = mysqli_query($conn,"select jml_brg from barang where id_brg='$_GET[id_brg]'");
$v = mysqli_fetch_array($t);

$q = mysqli_query($conn,"select jml_brgmsk from brgmsk where id_brg='$_GET[id_brg]'");
$p = mysqli_fetch_array($q);

$tmbbrg = $v['jml_brg'] + $p['jml_brgmsk'];

mysqli_query($conn,"UPDATE brgmsk SET status='Tambah' WHERE id_brg='$_GET[id_brg]'");
mysqli_query($conn,"UPDATE barang SET jml_brg='$tmbbrg' WHERE id_brg='$_GET[id_brg]'");

echo "<script>alert ('Stok Ditambahkan') </script>";
echo"<meta http-equiv='refresh' content=0;URL=?view=brgmsk>";
?>