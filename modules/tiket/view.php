
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
            <i class="ace-icon fa fa-list"></i> <b>List Tiket Helpdesk</b>
        </h1>
        <br>
        <br>
    
        

<?php

if (empty($_GET['alert'])) {
}

elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket baru berhasil disimpan.
        <br>
    </div>
<?php
} 

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


elseif ($_GET['alert'] == 6) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
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
                                <th class='center'>Departemen</th>
                                <th class='center'>Email</th>
                                <th class='center'>Prioritas</th>
                                <th class="center" >Kendala</th>
                                <th class="center" >Status</th>    
                                <th class='center'>Tanggal Dibuat</th>
                                <th class='center'>Action</th>
                            </tr>
                            </thead>

                            <?php
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT
  *
FROM
  tiket 
GROUP BY idtiket DESC
")
                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) {  
                            ?>

                          <td width="10" class="center"><?php echo $no; ?></td>    
                            <td width="100"><?php echo $data['idtiket']; ?></td>
                            <td width="100"><?php echo $data['nama']; ?></td>
                            <td width="100"><?php echo $data['departemen']; ?></td>
                            <td width="100"><?php echo $data['email']; ?></td>
                            <td width="100"><?php echo $data['priority']; ?></td>
                            <td width="100"><?php echo $data['problem']; ?></td>
                            <td width="100" style="background:<?php echo $warna; ?>">
                            
                            <?php echo $data['status']; ?></td> 
                                <td width="100"><?php echo $data['createdate']; ?></td>
                                <td class='center' width='30'>
                        <div>
                          
                            <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href="?module=form_tiket&form=edit&id=<?php echo $data['idtiket']; ?>">
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>     
                        </div>
                          </td>          
                                        </div>
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
        </div>
</div>
</div>

<div id="myModal" class="modal">

  <span class="CLOSED">&times;</span>


  <img class="modal-content" id="img01">


  <div id="caption"></div>
</div>
               