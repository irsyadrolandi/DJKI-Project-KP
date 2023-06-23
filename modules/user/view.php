<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=beranda">Beranda</a>
		</li>

		<li href="?module=user" class="active">User</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-user"></i> User
			<a href="?module=form_user&form=add">
                <button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah User
				</button>
            </a>
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "user baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		user baru berhasil disimpan.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "data user berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data user berhasil diubah.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "user berhasil diaktifkan"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		user berhasil diaktifkan.
		<br>
	</div>
<?php
} 
// jika alert = 4
// tampilkan pesan Sukses "user berhasil diblokir"
elseif ($_GET['alert'] == 4) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		user berhasil diblokir.
		<br>
	</div>
<?php
} 
?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data User
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Username</th>
									<th>Nama User</th>
									<th>Hak Akses</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel user
							$query = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user!='0' ORDER BY id_user DESC")
															or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
                            ?>
                            	<tr>
									<td width="40" class="center"><?php echo $no; ?></td>
									<td width="180" ><?php echo $data['username']; ?></td>
									<td width="180" ><?php echo $data['nama_user']; ?></td>
									<td width="100" ><?php echo $data['hak_akses']; ?></td>
									<td width="100" ><?php echo $data['status']; ?></td>

									<td width="70" class="center">
										<div class="action-buttons">
										<?php  
										if ($data['status']=='aktif') { ?>
											<a data-rel="tooltip" data-placement="top" title="Blokir" style="margin-right:5px" class="red tooltip-error" href="modules/user/proses.php?act=off&id=<?php echo $data['id_user'];?>">
												<i class="ace-icon fa fa-power-off bigger-130"></i>
											</a>
										<?php
										} else { ?>
											<a data-rel="tooltip" data-placement="top" title="Aktif" style="margin-right:5px" class="green tooltip-success" href="modules/user/proses.php?act=on&id=<?php echo $data['id_user'];?>">
												<i class="ace-icon fa fa-check-square-o bigger-130"></i>
											</a>
										<?php
										}
										?>
											<a data-rel="tooltip" data-placement="top" title="Ubah" class="blue tooltip-info" href="?module=form_user&form=edit&id=<?php echo $data['id_user']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/user/proses.php?act=delete&id=<?php echo $data['id_user'];?>" onclick="return confirm('Anda yakin ingin menghapus data user <?php echo $data['username']; ?> ?');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php
                            	$no++;
                            } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->