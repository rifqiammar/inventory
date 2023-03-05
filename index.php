
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>INVENTORY BARANG</title>
    <!-- Favicon icon -->
    <link rel="icon" href="assets/img/images.jpg" type="image/x-icon"/>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="assets/assets/style.css" rel="stylesheet">
    
</head>

<body class="h-100">

<?php
if(isset($_GET['alert'])){
    if($_GET['alert'] == "gagal"){
    echo"<div class='alert alert-danger alert-dismissible fade show'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span></button> <center><strong>Username atau Password Anda Ada Yang Salah.</strong></center></div>";
  }
}
 ?>

<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <img src="assets/img/a.jpg"><br/>
                                <a class="text-center" href="#"> <h4><b>Rancang Bangun Sistem Informasi<br/>
                                Inventory Barang</b></h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="cek_login.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100"><b>L O G I N</b></button>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/assets/common.min.js"></script>
    <script src="assets/assets/custom.min.js"></script>
    <script src="assets/assets/settings.js"></script>
    <script src="assets/assets/gleek.js"></script>
    <script src="assets/assets/styleSwitcher.js"></script>
</body>
</html>

