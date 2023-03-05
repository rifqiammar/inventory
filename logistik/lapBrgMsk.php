<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Laporan Barang Masuk</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="fas fa-layer-group"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Laporan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Barang Masuk</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Laporan Barang Masuk</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#LapBrgMsk">
											<i class="fa fa-print"></i>
											Cetak Data
										</button>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>NO DO</th>
													<th>No SJ</th>
													<th>Serial Number</th>
													<th>No Batch</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>JML Masuk</th>
													<th>Tgl Masuk</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=1;
													include"../koneksi.php";
													$c = mysqli_query($conn,"select * from brgmsk inner join barang on brgmsk.id_brg=barang.id_brg");
													while($row = mysqli_fetch_array($c)){
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['no_do'] ?></td>
													<td><?php echo $row['no_sj'] ?></td>
													<td><?php echo $row['sn'] ?></td>
													<td><?php echo $row['no_batch'] ?></td>
													<td><?php echo $row['nmbrg'] ?></td>
													<td><?php echo $row['jenis_barang'] ?></td>
													<td><?php echo $row['jml_brgmsk'] ?></td>
													<td><?php echo $row['tglmsk'] ?></td>
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

				<div class="modal fade" id="LapBrgMsk" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Laporan</span> 
														<span class="fw-light">
															Barang Masuk
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<form target="_blank" method="POST" action="cetakBrgMsk.php">
													<div class="form-group">
														<label>Tanggal Awal</label>
														<input type="date" class="form-control" name="tgl_awal">
													</div>
													<div class="form-group">
														<label>Tanggal Selesai</label>
														<input type="date" class="form-control" name="tgl_selesai">
													</div>

												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="cetak" class="btn btn-primary"><i class="fa fa-print"></i> &nbsp;Cetak</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> &nbsp;Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>