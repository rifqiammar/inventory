<?php
include"../koneksi.php";
mysqli_query($conn,"delete from supplier where id_supplier='$_GET[id_supplier]'");
echo "<script>alert ('Data Berhasil Dihapus') </script>";
echo"<meta http-equiv='refresh' content=0;URL=?view=supplier>";
?>