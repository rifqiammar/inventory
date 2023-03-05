<?php
session_start();
include"koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];

  $filter=mysqli_query($conn,"select * from login where username='$username' and password='$password' ");
  $cek = mysqli_num_rows($filter);
  $data = mysqli_fetch_array($filter);

  if($cek>0){

    if($data['level']=='1'){

    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = '1';
    $_SESSION['id_user'] = $data['id_user'];
    
    header("location:gudang/");

  
  }else if($data['level']=='2'){
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = '2';

    header("location:gudangBahan/");


}else if($data['level']=='3'){
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = '3';

    header("location:logistik/");

}
}else{
  header("location:index.php?alert=gagal");
}
?>