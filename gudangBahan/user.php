
<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data User</h4>
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
								<a href="#">Data</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">User</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data User</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#AddUser">
											<i class="fa fa-plus"></i>
											Add
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Username</th>
													<th>Bagian</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=1;
													include"../koneksi.php";
													$c = mysqli_query($conn,"select * from login");
													while($row = mysqli_fetch_array($c)){
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['username'] ?></td>
													<td>
														<?php if($row['level']==1) { ?>
															Gudang
														<?php }elseif($row['level']==2) { ?>
															Gudang Bahan
														<?php }else { ?>
															Logistik
														<?php } ?>
													</td>
													<td><a href="#EditUser<?php echo $row['id_user'] ?>" class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-edit"></i></a>
														<a href="?view=hapususer&id_user=<?php echo $row['id_user'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php
include '../koneksi.php';
  $carikode = mysqli_query($conn,"SELECT id_user from login") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 1);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $id_user = str_pad($kode, 1, "0", STR_PAD_LEFT);
?>

				<!-- Modal Create User -->
				<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															User
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<input type="hidden" value="<?php echo $id_user; ?>" name="id_user" readonly required>
				                                    <div class="form-group">
				                                        <input type="text" class="form-control" required="" placeholder="Username" name="username">
				                                    </div>
				                                    <div class="form-group">
				                                        <input type="password" required="" class="form-control" placeholder="Password" name="password">
				                                    </div>
				                                    <div class="form-group">
				                                        <select class="form-control" name="level" required="">
				                                            <option>-- Pilih Level --</option>
				                                            <option value="1">Gudang</option>
				                                            <option value="2">Gudang Bahan</option>
				                                            <option value="3">Logistik</option>
				                                        </select>
				                                    </div>

												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;Simpan</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> &nbsp;Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

				<!-- Modal Edit Barang -->
				<?php
					
					$query = mysqli_query($conn,"select * from login");
					while($d = mysqli_fetch_array($query)){
				?>
				<div class="modal fade" id="EditUser<?php echo $d['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															User
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<input type="hidden" value="<?php echo $d['id_user']; ?>" name="id_user" readonly required>
				                                    <div class="form-group">
				                                        <input type="text" class="form-control" required="" value="<?php echo $d['username'] ?>" placeholder="Username" name="username">
				                                    </div>
				                                    <div class="form-group">
				                                        <input type="password" required="" class="form-control" placeholder="Password" name="password">
				                                    </div>
				                                    <div class="form-group">
				                                        <select class="form-control" name="level" required="">
				                                            <option>-- Pilih Level --</option>
				                                            <option value="1">Gudang</option>
				                                            <option value="2">Gudang Bahan</option>
				                                            <option value="3">Logistik</option>
				                                        </select>
				                                    </div>

												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;Ubah</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> &nbsp;Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>


<?php

if(isset($_POST['simpan'])){
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

      mysqli_query($conn,"insert into login values ('$id_user','$username','$password','$level')");
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=user>";
 
}
?>

<?php

if(isset($_POST['ubah'])){
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

      mysqli_query($conn,"update login set id_user='$id_user', username='$username', password='$password', level='$level' where id_user='$id_user'");
      echo "<script>alert ('Data Berhasil Diubah') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=user>";
 
}
?>