
<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="?module=beranda">Beranda</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-list"></i> <b>List Tiket</b>
            <a href="?module=form_tiket&form=add">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Tambah
                </button>
            </a>
        </h1>
        <br>
        <br>
    
        

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "List Tiket baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket baru berhasil disimpan.
        <br>
    </div>
    <audio autoplay>
        <source src="modules/tiket/alert_bell.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "List Tiket berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket berhasil diubah.
        <br>
    </div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "List Tiket berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket berhasil dihapus.
        <br>
    </div>
<?php
} 

?>

<br>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <div class="row">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class='center'>No</th>
                                      <th class='center'>ID-Tiket</th>
                                        <th class='center'>Nama</th>
                                          <th class='center'>Bidang/Unit Kerja</th>
                                               <th class='center'>NIP</th>
                                                  <th class='center'>Jenis Kendala</th>
                                                      <th class="center" >Kendala</th>
                                                          <th class="center" >Status Tiket</th>
                                                               <th class="center" >Foto</th>
                                                                <th class='center'>Tanggal Dibuat</th>
                                                      
                                </tr>
                            </thead>

 <?php
    $no = 1;
    $created_user = $_SESSION['id_user'];
    $query = mysqli_query($mysqli, "SELECT * FROM tiket where id_user='$created_user' GROUP BY idtiket DESC")
        or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));
        while ($data = mysqli_fetch_assoc($query)) { 
?>
        <tr>
            <td width="10" class="center"><?php echo $no; ?></td>
            <td width="100"><?php echo $data['idtiket']; ?></td>
            <td width="100"><?php echo $data['nama']; ?></td>
            <td width="100"><?php echo $data['departemen']; ?></td>
            <td width="100"><?php echo $data['email']; ?></td>
            <td width="100"><?php echo $data['priority']; ?></td>
            <td width="100"><?php echo $data['problem']; ?></td>
            <td width="100"><?php echo $data['status']; ?></td>
            <td class='center' width='100'>
                <div>
                    <!-- Tambahkan kode untuk menampilkan gambar -->
                    <?php
                        $direktorifoto = "modules/tiket/" . $data['foto'];
                            if (empty($data['foto']) || !file_exists($direktorifoto)) {
                                echo '<span>Image not found</span>';
                            } else {
                                echo '<a data-toggle="tooltip" data-placement="top" title="Lihat Foto" style="margin-right:5px" class="btn btn-primary btn-sm" href="' . $direktorifoto . '" id="">Lihat Foto</a>';
                            }
                    ?>
                </div>
                                                </td>
                                     <td width="100"><?php echo $data['createdate']; ?></td>
                 </tr>
                                        <?php
            $no++;
        }
        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>