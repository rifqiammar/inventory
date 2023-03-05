<?php error_reporting(0); ?>
<?php
include '../koneksi.php';
	$today = date('Ym');
  $carikode = mysqli_query($conn,"SELECT no_do from brgmsk") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 3);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $no_do = $today.str_pad($kode, 3, "0", STR_PAD_LEFT);
?>

<?php
	$today = date('Ym');
  $carikode = mysqli_query($conn,"SELECT no_sj from brgmsk") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 3);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $no_sj = $today.str_pad($kode, 3, "0", STR_PAD_LEFT);
?>

<?php
  $carikode = mysqli_query($conn,"SELECT id_brgmsk from brgmsk") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 3);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $id_brgmsk = "BRGMSK-".str_pad($kode, 3, "0", STR_PAD_LEFT);
?>

<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Add</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="fas fa-th-list"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Barang</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Masuk</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Add Barang Masuk</div>
								</div>
								<div class="card-body">
									<form method="POST">
                                    <label>Ketikan Jumlah Form</label>
                                    <input type="text" size="8" name="jumlah">
                                    <input type="submit" name="btnJumlah" value="OK" class="btn btn-primary">
                                </form>
                                
                                    <?php
                                        if($_POST['jumlah']){
                                            ?>
                                        <form method="POST" action="" enctype="multipart/form-data">
                                        <?php
                                $jumlah=$_POST['jumlah'];

                                for($x=1;$x<=$jumlah;$x++){
                                ?>
                                <br/><br/>
											
											<div class="form-group">
												<label>ID Barang Masuk</label>
												<input type="text" value="<?php echo $id_brgmsk; ?>" name="id_brgmsk[]" class="form-control" required="" readonly="" <?php echo $jumlah; ?>>
											</div>

											<div class="form-group">
												<label>NO DO</label>
												<input type="text" value="<?php echo $no_do; ?>" name="no_do[]" class="form-control" required="" readonly="" <?php echo $jumlah; ?>>
											</div>

											<div class="form-group">
												<label>No Surat Jalan</label>
												<input type="text" value="<?php echo $no_sj; ?>" name="no_sj[]" class="form-control" required="" readonly="" <?php echo $jumlah; ?>>
											</div>

											<div class="form-group">
												<label>Nama Barang</label>
												<select class="form-control" name="id_brg[]" required="" <?php echo $jumlah; ?>>
													<option>-- Pilih Barang --</option>
													<?php
													$t = mysqli_query($conn,"SELECT * FROM barang");
													while($z = mysqli_fetch_array($t)) { 
													 ?>
													 <option value="<?php echo $z['id_brg'] ?>"><?php echo $z['nmbrg'] ?></option>
													<?php } ?>
												</select>
											</div>

											<div class="form-group">
												<label>Jumlah Barang Masuk</label>
												<input placeholder="Jumlah Barang Masuk" type="number" name="jml_brgmsk[]" class="form-control" required="" <?php echo $jumlah; ?>>
											</div>

											<div class="form-group">
												<label>Tanggal Masuk Barang</label>
												<input type="date" name="tglmsk[]" class="form-control" required="" <?php echo $jumlah; ?>>
											</div>
											<input type="hidden" name="id_user[]" value="<?php echo $_SESSION['id_user'] ?>" <?php echo $jumlah; ?>>
											<input type="hidden" name="status[]" value="Belum" <?php echo $jumlah; ?>>

											<?php } ?>
									
								</div>
								<div class="card-action">
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
									<a href="?view=brgmsk" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
								</div>
								</form>
								<?php
} 
?>
							</div>
						</div>
					</div>
				</div>

				<script src="assets/js/jquery-3.3.1.js" type="text/javascript"></script>

<?php

if(isset($_POST['simpan'])){
$id_brgmsk = $_POST['id_brgmsk'];
$no_do = $_POST['no_do'];
$no_sj = $_POST['no_sj'];
$id_brg = $_POST['id_brg'];
$jml_brgmsk = $_POST['jml_brgmsk'];
$tglmsk = $_POST['tglmsk'];
$id_user = $_POST['id_user'];
$status = $_POST['status'];

$jumlah_dipilih=count($id_brgmsk);
for($x=0;$x<$jumlah_dipilih;$x++){

      mysqli_query($conn,"insert into brgmsk (id,id_brgmsk,no_do,no_sj,id_brg,jml_brgmsk,tglmsk,id_user) values ('','$id_brgmsk[$x]','$no_do[$x]','$no_sj[$x]','$id_brg[$x]','$jml_brgmsk[$x]','$tglmsk[$x]','$id_user[$x]','$status[$x]')");
    }
      
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<script>window.location.replace('?view=brgmsk');</script>";
 
}
?>