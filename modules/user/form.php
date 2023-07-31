<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=user">User</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:7px" class="ace-icon fa fa-edit"></i>
				Input User
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/user/proses.php?act=insert" method="POST">

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Username</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="username" autocomplete="off" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Password</label>

						<div class="col-sm-9">
							<input type="password" class="col-xs-12 col-sm-6" name="password" autocomplete="off" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Departemen</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="Departemen" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama User</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="nama_user" autocomplete="off" required></textarea>
						</div>
					</div>
					<div class="form-group">
                <label class="col-sm-2 control-label">Hak Akses</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="hak_akses" data-placeholder="-- Pilih Tipe --" autocomplete="off" required></textarea>
                    <option value=""></option>
                   		<option value="Super Admin">Admin</option>
                   		<option value="STAFF">User</option>
                      	<option value="HELPDESK">Teknisi</option>
                  </select>
                </div>
              </div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=user" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel user
	    $query = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$_GET[id]'") 
	    	or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=user">User</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:7px" class="ace-icon fa fa-edit"></i>
				Ubah User
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/user/proses.php?act=update" method="POST" />

					<input type="hidden" name="id" value="<?php echo $data['id_user']; ?>" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Username</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="username" autocomplete="off" value="<?php echo $data['username']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Password</label>

						<div class="col-sm-9">
							<input type="password" class="col-xs-12 col-sm-6" name="password" placeholder="Kosongkan password jika tidak diubah" autocomplete="off" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Departemen</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="Departemen" autocomplete="off" value="<?php echo $data['Departemen']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama User</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-6" name="nama_user" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required />
						</div>
					</div>

					<div class="form-group">
                <label class="col-sm-2 control-label">Hak Akses</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="hak_akses" data-placeholder="-- Pilih Tipe --" autocomplete="off" required>
                    <option value="<?php echo $data['hak_akses']; ?>"><?php echo $data['hak_akses']; ?></option>
					<option value="Super Admin">Admin</option>
                   	<option value="STAFF">User</option>
                    <option value="Teknisi">Teknisi</option>
                  </select>
                </div>
              </div>

								
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=user" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>