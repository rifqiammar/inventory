<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Barang Keluar</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body onload="window.print()">


<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
										<center><h4 class="card-title">Laporan Barang Keluar</h4></center>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="display table table-bordered">
											<thead>
												<tr>
													<th>No</th>
													<th>NO DO</th>
													<th>No PCK</th>
													<th>Serial Number</th>
													<th>No Batch</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>JML Keluar</th>
													<th>Tgl Keluar</th>
												</tr>
											</thead>
											<tbody>

												<?php
													$no=1;
													include"../koneksi.php";
													if(isset($_POST['cetak'])){
														$tgl_awal = $_POST['tgl_awal'];
														$tgl_selesai = $_POST['tgl_selesai'];
													$c = mysqli_query($conn,"select * from brgklr inner join barang on brgklr.id_brg=barang.id_brg and tglklr between '$tgl_awal' and '$tgl_selesai'");
												}else{
													$c = mysqli_query($conn,"select * from brgklr");
												}
													while($row = mysqli_fetch_array($c)){
												
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['no_do'] ?></td>
													<td><?php echo $row['no_pck'] ?></td>
													<td><?php echo $row['sn'] ?></td>
													<td><?php echo $row['no_batch'] ?></td>
													<td><?php echo $row['nmbrg'] ?></td>
													<td><?php echo $row['jenis_barang'] ?></td>
													<td><?php echo $row['jml_brgklr'] ?></td>
													<td><?php echo $row['tglklr'] ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<h5 style="margin-left: 880px;">Logistik</h5><br/><br/><br/><br/><br/><br/>
        <hr size="4px" align="right" width="20%">
						</div>
					</div>
				</div>


<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo2.js"></script>
</body>
</html>