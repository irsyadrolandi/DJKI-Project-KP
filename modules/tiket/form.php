<?php
if ($_GET['form'] == 'add') {
?>

<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<div class="page-content">
  <div class="page-header">
    <h1 style="color:#585858">
      <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
      Input Tiket Support
    </h1>
  </div>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/tiket/proses.php?act=insert" method="POST" enctype="multipart/form-data" />
        <div class="box-body">
          <?php
          $id_user = $_SESSION['id_user'];

          $query = mysqli_query($mysqli, "SELECT * FROM user a where a.id_user='$id_user'")
            or die('Ada kesalahan pada query tampil : ' . mysqli_error($mysqli));
          $data = mysqli_fetch_assoc($query);

          $query_id = mysqli_query($mysqli, "SELECT RIGHT(idtiket,6) as kode FROM tiket
                ORDER BY idtiket DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_barang : ' . mysqli_error($mysqli));
          $curr_year = date("Y");

          $count = mysqli_num_rows($query_id);

          if ($count <> 0) {
            $data_id = mysqli_fetch_assoc($query_id);
            $kode    = $data_id['kode'] + 1;
          } else {
            $kode = 1;
          }

          $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
          $idtiket = "TKT-$curr_year-$buat_id";
          ?>

          <div class="form-group">
            <label class="col-sm-2 control-label">ID-Tiket</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="notiket" value="<?php echo $idtiket; ?>" readonly required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal</label>
            <div class="col-sm-5">
              <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="tanggal" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Bagian/Unit Kerja</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="departemen" autocomplete="off" value="<?php echo $data['departemen']; ?>" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-5">
              <input type="textclass="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">NIP</label>
            <div class="col-sm-5">
              <input type="text" pattern="[-0-9]*" class="form-control" name="email" autocomplete="off" value="<?php echo $data['email']; ?>" required></textarea>
            </div>
          </div>

          <div class="form-group">
  <label class="col-sm-2 control-label">Jenis Kendala</label>
  <div class="col-sm-5">
    <select class="select1" name="prio" id="jenis_kendala" data-placeholder="-- Pilih --" autocomplete="On" required>
      <option value=""></option>
      <option value="HARDWARE">HARDWARE</option>
      <option value="SOFTWARE">SOFTWARE</option>
      <option value="JARINGAN">JARINGAN</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label"></label>
  <div class="col-sm-5">
    <select class="chosen-select" name="prio" id="kendala" data-placeholder="-- Pilih --" autocomplete="On" required>
      <option value=""></option>
    </select>
  </div>
</div>

<script>
  // Ambil elemen select untuk "Jenis Kendala" dan "Kendala"
  const jenisKendalaSelect = document.getElementById('jenis_kendala');
  const kendalaSelect = document.getElementById('kendala');

  // Fungsi untuk mengatur opsi di form "Kendala" berdasarkan pilihan di form "Jenis Kendala"
  function updateKendalaOptions() {
    // Hapus semua opsi pada form "Kendala" kecuali opsi default
    kendalaSelect.innerHTML = '<option value=""></option>';

    // Ambil nilai yang dipilih pada form "Jenis Kendala"
    const jenisKendalaValue = jenisKendalaSelect.value;

    // Tambahkan opsi baru di form "Kendala" sesuai dengan pilihan pada form "Jenis Kendala"
    if (jenisKendalaValue === 'HARDWARE') {
      kendalaSelect.add(new Option('PC', 'PC'));
      kendalaSelect.add(new Option('Laptop', 'Laptop'));
      kendalaSelect.add(new Option('Printer', 'Printer'));
    } else if (jenisKendalaValue === 'SOFTWARE') {
      kendalaSelect.add(new Option('Office', 'Office'));
      kendalaSelect.add(new Option('Wifi', 'Wifi'));
    } else if (jenisKendalaValue === 'JARINGAN') {
      kendalaSelect.add(new Option('Kabel LAN', 'Kabel'));
    }

    // Refresh tampilan select dengan library Chosen
    // Jika Anda tidak menggunakan library Chosen, baris berikut dapat dihapus
    $(kendalaSelect).trigger('chosen:updated');
  }

  // Tambahkan event listener untuk memanggil fungsi saat pilihan pada form "Jenis Kendala" berubah
  jenisKendalaSelect.addEventListener('change', updateKendalaOptions);

  // Panggil fungsi saat halaman pertama kali dimuat untuk mengatur opsi berdasarkan nilai default
  updateKendalaOptions();
</script>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kendala</label>
            <div class="col-sm-5">
              <textarea row="2" class="form-control" name="problem" autocomplete="off" value="<?php echo $data['email']; ?>" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Foto</label>
            <div class="col-sm-5">
              <input type="file" name="foto" class="form-control" required></textarea>
            </div>
          </div>

          <!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                <a href="?module=tiket_list" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div> <!-- /.row -->
</section>
</div><!-- /.content -->
<?php
error_reporting(0);
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form'] == 'edit') {
  if (isset($_GET['id'])) {

    // fungsi query untuk menampilkan data dari tabel barang
    $query = mysqli_query($mysqli, "SELECT * from tiket where idtiket='$_GET[id]'")
      or die('Ada kesalahan pada query tampil Data Vendor: ' . mysqli_error($mysqli));
    $data  = mysqli_fetch_assoc($query);

    $user = $_SESSION['nama_user'];
  }

  ?>
<!-- tampilan form edit data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
        Progres Tiket
      </h1>
    </div>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/tiket/proses.php?act=update" method="POST" enctype="multipart/form-data" />

        <div class="box-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">ID-Tiket</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="idtiket" autocomplete="off" value="<?php echo $data['idtiket']; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Departemen</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="departemen" autocomplete="off" value="<?php echo $data['departemen']; ?>"readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
  <label class="col-sm-2 control-label">Jenis Kendala</label>
  <div class="col-sm-5">
    <select class="select1" name="prio" id="jenis_kendala" data-placeholder="-- Pilih --" autocomplete="On" disabled>
      <option value=""></option>
      <option value="HARDWARE">HARDWARE</option>
      <option value="SOFTWARE">SOFTWARE</option>
      <option value="JARINGAN">JARINGAN</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label"></label>
  <div class="col-sm-5">
    <select class="chosen-select" name="prio" id="kendala" data-placeholder="-- Pilih --" autocomplete="On" disabled>
      <option value="<?php echo $data['priority']; ?>"><?php echo $data['priority']; ?></option>
    </select>
  </div>
</div>



               <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="status_tiket" data-placeholder="-- Pilih --" autocomplete="On">
                   <option value="Open">OPEN</option>
                   <option value="Pending">PENDING</option>
                    <option value="closed">CLOSED</option>  
                  </select>
                </div>
              </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Problem</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="problem" autocomplete="off" value="<?php echo $data['problem']; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
    <label class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-5">
        <input type="file" class="form-control" name="foto" id="foto" <?php echo !empty($data['foto']) ? : 'required'; ?>>
        <?php if (!empty($data['foto'])) { ?>
            <p class="help-block">File foto saat ini: <?php echo $data['foto']; ?></p>
        <?php } ?>
    </div>
</div>


          <!-- /.box body -->
<div class="box-footer" style="margin-top: 20px;">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
            <a href="?module=tiket_list" class="btn btn-default btn-reset">Batal</a>
        </div>
    </div>
</div><!-- /.box footer -->

<?php
error_reporting(0);
}
?>