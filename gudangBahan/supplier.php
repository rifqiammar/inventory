<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Supplier</h4>
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
								<a href="#">Supplier</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Supplier</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#AddSupplier">
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
													<th>Nama Supplier</th>
													<th>Cabang</th>
													<th>Alamat</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=1;
													include"../koneksi.php";
													$c = mysqli_query($conn,"select * from supplier");
													while($row = mysqli_fetch_array($c)){
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['nmsupplier'] ?></td>
													<td><?php echo $row['cabang'] ?></td>
													<td><?php echo $row['alamat'] ?></td>
													<td><a href="#EditSupplier<?php echo $row['id_supplier'] ?>" class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-edit"></i></a>
														<a href="?view=hapussupplier&id_supplier=<?php echo $row['id_supplier'] ?>"class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
  $carikode = mysqli_query($conn,"SELECT id_supplier from supplier") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 3);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $id_supplier = "S-".str_pad($kode, 3, "0", STR_PAD_LEFT);
?>

				<!-- Modal Create Barang -->
				<div class="modal fade" id="AddSupplier" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Supplier
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<div class="form-group">
														<label>ID Supplier</label>
														<input type="text" class="form-control" value="<?php echo $id_supplier ?>" name="id_supplier" readonly="" required>
													</div>

													<div class="form-group">
														<label>Nama Supplier</label>
														<input type="text" name="nmsupplier" class="form-control" maxlength="25" placeholder="Nama Supplier" required>
													</div>

													<div class="form-group">
														<label>Cabang</label>
														<input name="cabang" type="text" class="form-control" maxlength="11" placeholder="Cabang" required>
													</div>

													<div class="form-group">
														<label>Alamat</label>
														<textarea class="form-control" rows="5" name="alamat" maxlength="25" placeholder="Alamat" required></textarea>
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
					
					$query = mysqli_query($conn,"select * from supplier");
					while($d = mysqli_fetch_array($query)){
				?>
				<div class="modal fade" id="EditSupplier<?php echo $d['id_supplier'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Supplier
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<div class="form-group">
														<label>ID Supplier</label>
														<input type="text" class="form-control" value="<?php echo $d['id_supplier'] ?>" name="id_supplier" readonly="" required>
													</div>

													<div class="form-group">
														<label>Nama Supplier</label>
														<input type="text" value="<?php echo $d['nmsupplier'] ?>" name="nmsupplier" class="form-control" maxlength="25" placeholder="Nama Supplier" required>
													</div>

													<div class="form-group">
														<label>Cabang</label>
														<input name="cabang" value="<?php echo $d['cabang'] ?>" type="text" class="form-control" maxlength="11" placeholder="Cabang" required>
													</div>

													<div class="form-group">
														<label>Alamat</label>
														<textarea class="form-control" rows="5" name="alamat" maxlength="25" placeholder="Alamat" required><?php echo $d['alamat'] ?></textarea>
													</div>

												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-undo"></i> &nbsp;Ubah</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> &nbsp;Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>

<?php

if(isset($_POST['simpan'])){
$id_supplier = $_POST['id_supplier'];
$nmsupplier = $_POST['nmsupplier'];
$cabang = $_POST['cabang'];
$alamat = $_POST['alamat'];

      mysqli_query($conn,"insert into supplier values ('$id_supplier','$nmsupplier','$cabang','$alamat')");
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=supplier>";
 
}
?>

<?php

if(isset($_POST['ubah'])){
$id_supplier = $_POST['id_supplier'];
$nmsupplier = $_POST['nmsupplier'];
$cabang = $_POST['cabang'];
$alamat = $_POST['alamat'];

      mysqli_query($conn,"update supplier set id_supplier='$id_supplier', nmsupplier='$nmsupplier', cabang='$cabang', alamat='$alamat' where id_supplier='$id_supplier'");
      echo "<script>alert ('Data Berhasil Diubah') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=supplier>";
 
}
?>