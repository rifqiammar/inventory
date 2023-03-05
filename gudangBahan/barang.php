<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Barang</h4>
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
								<a href="#">Barang</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Barang</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#AddBarang">
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
													<th>Serial Number</th>
													<th>No Batch</th>
													<th>Nama Barang</th>
													<th>Nama Supplier</th>
													<th>Jenis Barang</th>
													<th>Jlm Barang</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=1;
													include"../koneksi.php";
													$c = mysqli_query($conn,"select * from supplier inner join barang on supplier.id_supplier=barang.id_supplier");
													while($row = mysqli_fetch_array($c)){
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['sn'] ?></td>
													<td><?php echo $row['no_batch'] ?></td>
													<td><?php echo $row['nmbrg'] ?></td>
													<td><?php echo $row['nmsupplier'] ?></td>
													<td><?php echo $row['jenis_barang'] ?></td>
													<td><?php echo $row['jml_brg'] ?></td>
													<td><a href="#EditBarang<?php echo $row['id_brg'] ?>" class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-edit"></i></a>
														<a href="?view=hapusbarang&id_brg=<?php echo $row['id_brg'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
  $carikode = mysqli_query($conn,"SELECT id_brg from barang") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);

   $nilaikode = substr($jumlah_data[0], 3);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $id_brg = "BRG-".str_pad($kode, 3, "0", STR_PAD_LEFT);
?>

				<!-- Modal Create Barang -->
				<div class="modal fade" id="AddBarang" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<div class="form-group">
														<label>ID Barang</label>
														<input type="text" class="form-control" value="<?php echo $id_brg ?>" name="id_brg" readonly="" required>
													</div>

													<div class="form-group">
														<label>Nama Barang</label>
														<input type="text" name="nmbrg" class="form-control" maxlength="25" placeholder="Nama Barang" required>
													</div>

													<div class="form-group">
														<label>Nama Supplier</label>
														<select name="id_supplier" class="form-control" id="id_supplier" onchange="changeValue(this.value)" required>
															<option value="" hidden="">-- Pilih Supplier --</option>
															<?php 
																$g = mysqli_query($conn,"select * from supplier");
																$cabang = "var cabang = new Array();\n";
																while($q = mysqli_fetch_array($g)){
																echo '<option value="'.$q['id_supplier'].'">'.$q['nmsupplier'].'</option>';
																$cabang .= "cabang['" . $q['id_supplier'] . "'] = {cabang:'" . addslashes($q['cabang']) . "'};\n";
															 } 
															 ?>
														</select>
													</div>

													<div class="form-group">
														<label>Cabang</label>
														<input type="text" id="cabang" name="cabang" readonly="" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Jenis Barang</label>
														<select class="form-control" name="jenis_barang" required>
															<option value="" hidden="">-- Pilih Jenis Barang --</option>
															<option>Botol</option>
															<option>Cup</option>
															<option>Pump</option>
														</select>
													</div>

													<div class="form-group">
														<label>Serial Number</label>
														<input type="text" name="sn" maxlength="10" placeholder="Serial Number" class="form-control" required>
													</div>

													<div class="form-group">
														<label>No Batch</label>
														<input type="text" maxlength="7" name="no_batch" placeholder="No Batch" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Jumlah Barang</label>
														<input type="number" name="jml_brg" placeholder="Jumlah Barang" class="form-control" required>
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

									<div class="modal fade" id="AddBarang" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<div class="form-group">
														<label>ID Barang</label>
														<input type="text" class="form-control" value="<?php echo $id_brg ?>" name="id_brg" readonly="" required>
													</div>

													<div class="form-group">
														<label>Nama Barang</label>
														<input type="text" name="nmbrg" class="form-control" maxlength="25" placeholder="Nama Barang" required>
													</div>

													<div class="form-group">
														<label>Nama Supplier</label>
														<select name="id_supplier" class="form-control" id="id_supplier" onchange="changeValue(this.value)" required>
															<option value="" hidden="">-- Pilih Supplier --</option>
															<?php 
																$g = mysqli_query($conn,"select * from supplier");
																$cabang = "var cabang = new Array();\n";
																while($q = mysqli_fetch_array($g)){
																echo '<option value="'.$q['id_supplier'].'">'.$q['nmsupplier'].'</option>';
																$cabang .= "cabang['" . $q['id_supplier'] . "'] = {cabang:'" . addslashes($q['cabang']) . "'};\n";
															 } 
															 ?>
														</select>
													</div>

													<div class="form-group">
														<label>Cabang</label>
														<input type="text" id="cabang" name="cabang" readonly="" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Jenis Barang</label>
														<select class="form-control" name="jenis_barang" required>
															<option value="" hidden="">-- Pilih Jenis Barang --</option>
															<option>Botol</option>
															<option>Cup</option>
															<option>Pump</option>
														</select>
													</div>

													<div class="form-group">
														<label>Serial Number</label>
														<input type="text" name="sn" maxlength="10" placeholder="Serial Number" class="form-control" required>
													</div>

													<div class="form-group">
														<label>No Batch</label>
														<input type="text" maxlength="7" name="no_batch" placeholder="No Batch" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Jumlah Barang</label>
														<input type="number" name="jml_brg" placeholder="Jumlah Barang" class="form-control" required>
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
					
					$query = mysqli_query($conn,"select * from supplier inner join barang on supplier.id_supplier=barang.id_supplier");
					while($d = mysqli_fetch_array($query)){
				?>
				<div class="modal fade" id="EditBarang<?php echo $d['id_brg'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form method="POST" action="" enctype="multipart/form-data">
													<div class="form-group">
														<label>ID Barang</label>
														<input type="text" class="form-control" value="<?php echo $d['id_brg'] ?>" name="id_brg" readonly="" required>
													</div>

													<div class="form-group">
														<label>Nama Barang</label>
														<input type="text" name="nmbrg" value="<?php echo $d['nmbrg'] ?>" class="form-control" maxlength="25" placeholder="Nama Barang" required>
													</div>

													<div class="form-group">
														<label>Nama Supplier</label>
														<select name="id_supplier" class="form-control" id="id_supplier" onchange="change(this.value)" required>
															<option value="<?php echo $d['id_supplier'] ?>"><?php echo $d['nmsupplier'] ?></option>
															<?php 
																$g = mysqli_query($conn,"select * from supplier");
																$cabangg = "var cabangg = new Array();\n";
																while($q = mysqli_fetch_array($g)){
																echo '<option value="'.$q['id_supplier'].'">'.$q['nmsupplier'].'</option>';
																$cabang .= "cabangg['" . $q['id_supplier'] . "'] = {cabangg:'" . addslashes($q['cabang']) . "'};\n";
															 } 
															 ?>
														</select>
													</div>

													<div class="form-group">
														<label>Cabang</label>
														<input type="text" value="<?php echo $d['cabang'] ?>" id="cabangg" name="cabang" readonly="" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Jenis Barang</label>
														<select class="form-control" name="jenis_barang" required>
															<option value="<?php echo $d['jenis_barang'] ?>"><?php echo $d['jenis_barang'] ?></option>
															<option value="Botol">Botol</option>
															<option value="Cup">Cup</option>
															<option value="Pump">Pump</option>
														</select>
													</div>

													<div class="form-group">
														<label>Serial Number</label>
														<input type="text" value="<?php echo $d['sn'] ?>" name="sn" maxlength="10" placeholder="Serial Number" class="form-control" required>
													</div>

													<div class="form-group">
														<label>No Batch</label>
														<input type="text" maxlength="7" value="<?php echo $d['no_batch'] ?>" name="no_batch" required placeholder="No Batch" class="form-control">
													</div>

													<div class="form-group">
														<label>Jumlah Barang</label>
														<input type="number" name="jml_brg" value="<?php echo $d['jml_brg'] ?>" placeholder="Jumlah Barang" required class="form-control">
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

<script src="assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script>
	<?php echo $cabang; ?>
	function changeValue(x) {
		document.getElementById('cabang').value = cabang[x].cabang;
	};
</script>

<script>
	<?php echo $cabangg; ?>
	function change(id) {
		document.getElementById('cabangg').value = cabang[id].cabang;
	};
</script>

<?php

if(isset($_POST['simpan'])){
$id_brg = $_POST['id_brg'];
$id_supplier = $_POST['id_supplier'];
$nmbrg = $_POST['nmbrg'];
$jenis_barang = $_POST['jenis_barang'];
$sn = $_POST['sn'];
$no_batch = $_POST['no_batch'];
$cabang = $_POST['cabang'];
$jml_brg = $_POST['jml_brg'];

      mysqli_query($conn,"insert into barang values ('$id_brg','$id_supplier','$nmbrg','$jenis_barang','$sn','$no_batch','$cabang','$jml_brg')");
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=barang>";
 
}
?>

<?php

if(isset($_POST['ubah'])){
$id_brg = $_POST['id_brg'];
$id_supplier = $_POST['id_supplier'];
$nmbrg = $_POST['nmbrg'];
$jenis_barang = $_POST['jenis_barang'];
$sn = $_POST['sn'];
$no_batch = $_POST['no_batch'];
$cabang = $_POST['cabang'];
$jml_brg = $_POST['jml_brg'];

      mysqli_query($conn,"update barang set id_brg='$id_brg', id_supplier='$id_supplier', nmbrg='$nmbrg', jenis_barang='$jenis_barang', sn='$sn', no_batch='$no_batch', cabang='$cabang', jml_brg='$jml_brg' where id_brg='$id_brg'");
      echo "<script>alert ('Data Berhasil Diubah') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=?view=barang>";
 
}
?>