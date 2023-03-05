<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Barang Masuk</h4>
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
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Barang Masuk</h4>
										<a href="?view=addbrgmsk" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>JML Barang Masuk</th>
													<th>Tgl Masuk</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=1;
													include"../koneksi.php";
													$c = mysqli_query($conn,"select * from brgmsk inner join barang on brgmsk.id_brg=barang.id_brg order by id desc");
													while($row = mysqli_fetch_array($c)){
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row['nmbrg'] ?></td>
													<td><?php echo $row['jenis_barang'] ?></td>
													<td><?php echo $row['jml_brgmsk'] ?></td>
													<td><?php echo $row['tglmsk'] ?></td>
													<td>
														<?php if($row['status']=='Belum') { ?>
														<a href="?view=tmbstok&id_brg=<?php echo $row['id_brg'] ?>" class="btn btn-xs btn-primary" title="Tambah Stok"><i class="fa fa-plus"></i></a>
													<?php }else { ?>
														<button class="btn btn-xs btn-success">Selesai</button>
													<?php } ?>
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