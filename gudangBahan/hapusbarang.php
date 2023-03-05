<?php
include"../koneksi.php";
mysqli_query($conn,"delete from barang where id_brg='$_GET[id_brg]'");
echo "<script>alert ('Data Berhasil Dihapus') </script>";
echo"<meta http-equiv='refresh' content=0;URL=?view=barang>";
?>