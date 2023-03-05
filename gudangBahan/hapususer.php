<?php
include"../koneksi.php";
mysqli_query($conn,"delete from login where id_user='$_GET[id_user]'");
echo "<script>alert ('Data Berhasil Dihapus') </script>";
echo"<meta http-equiv='refresh' content=0;URL=?view=user>";
?>