<?php
include '../koneksi.php';
$t = mysqli_query($conn,"select jml_brg from barang where id_brg='$_GET[id_brg]'");
$v = mysqli_fetch_array($t);

$q = mysqli_query($conn,"select jml_brgklr from brgklr where id_brg='$_GET[id_brg]'");
$p = mysqli_fetch_array($q);

$klrbrg = $v['jml_brg'] - $p['jml_brgklr'];

if($v['jml_brg'] > $p['jml_brgklr']){
	echo "Stok Barang Hanya '".$v['jml_brg']."' ";
}else{

mysqli_query($conn,"UPDATE brgklr SET status='Tambah' WHERE id_brg='$_GET[id_brg]'");
mysqli_query($conn,"UPDATE barang SET jml_brg='$klrbrg' WHERE id_brg='$_GET[id_brg]'");

echo "<script>alert ('Stok Dikurangi') </script>";
echo"<meta http-equiv='refresh' content=0;URL=?view=brgklr>";
}
?>