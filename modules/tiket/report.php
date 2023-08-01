
<?php
 

?>
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
            <i class="ace-icon fa fa-list"></i> Report
           
        </h1>
        <br>
        <br>
         <section class="content">
    <div class="row">
      <div class="col-xs-5">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tiket/cetak.php" method="GET" enctype="multipart/form-data">
          
            <div class="box-body">
              
               <div class="form-group">
                <label>Dari</label>
                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="dari" autocomplete="off" required>
                    </div>
                        <div class="form-group">
                        <label>Sampai</label>
                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="sampai" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class='btn btn-primary btn-sm' name="simpan" value="Cetak">
                                         <i style='color:#fff' class='glyphicon glyphicon-list'></i>
                                       
                                    </div>

             
          </div>
      </form>
  </div>
</div>
</div>
</section>
       

       
    
        



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
                                    <th class='center'>Tanggal Dibuat</th>
                                </tr>
                            </thead>

                            <?php
                            error_reporting(0);
                         
                            $no = 1;
                          
                          
                            $query = mysqli_query($mysqli, "SELECT * FROM tiket GROUP BY idtiket DESC")
                                        or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

                                               
                            while ($data = mysqli_fetch_assoc($query)) { 
                               
                            ?>
                          <td width="10" class="center"><?php echo $no; ?></td>
                                    
                                    <td width="100"><?php echo $data['idtiket']; ?></td>
                                    <td width="100"><?php echo $data['nama']; ?></td>
                                    <td width="100"><?php echo $data['departemen']; ?></td>
                                    <td width="100"><?php echo $data['email']; ?></td>
                                    <td width="100"><?php echo $data['prioritas']; ?></td>
                                    <td width="100"><?php echo $data['problem']; ?></td>
                                    <td width="100" style="background:<?php echo $warna; ?>">
                                    <?php echo $data['status']; ?></td>
                                     
                                    <td width="100"><?php echo $data['createdate']; ?></td>
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
               