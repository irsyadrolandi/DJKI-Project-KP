
<?php
error_reporting(0);
?>
<div class="page-content">
    <div class="page-header">
        <h2>
            Helpdesk Infrastruktur
        </h2>
    </div><!-- /.page-header -->
    <div class="row">
    <?php
if ($_SESSION['hak_akses']=='Super Admin') { ?>
<div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <!--<button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-user"></i> 
                </button>-->
                <i class="ace-icon fa fa-user green"></i>
                Selamat Datang
                <strong class="green"><?php echo $_SESSION['nama_user']; ?></strong> di Helpdesk Infrastruktur!
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- small box TERBUKA -->
     <div class="row">
        <div class="col-lg-3 col-xs-6">
             <div style="background-color:#313e5d;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
    COUNT(DISTINCT (`idtiket`)) AS tiket
    FROM
        tiket WHERE status='Open'")
            or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">

                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Terbuka</p>
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></a>
            </div>
        </div>

        <!-- small box BERJALAN-->
        <div class="col-lg-3 col-xs-6">
             <div style="background-color:#313e5d;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
            count(*) AS tiket
            FROM
            tiket WHERE status='Pending'")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));
                $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Berjalan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></a>
            </div>
        </div>
        
        <!-- small box SELESAI-->
            <div class="col-lg-3 col-xs-6">
                <div style="background-color:#313e5d;color:#fff" class="small-box">
            <?php  
            //$user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
            COUNT(DISTINCT (`idtiket`)) AS tiket
            FROM tiket WHERE status='Closed'")
            or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));
                $data = mysqli_fetch_assoc($query);
                ?>
                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Selesai</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></a>
            </div>
        </div>
        
        
        <!-- small box TOTAL-->
        <div class="col-lg-3 col-xs-6">
             <div style="background-color:#313e5d;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
            COUNT(DISTINCT (`idtiket`)) AS tiket
            FROM tiket")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);             
                ?>
                <div class="inner">
                     <h3><?php echo $data['tiket']; ?></h3>
                    <p>Total Tiket</p>
                </div>
                <div class="icon">
                    <div style="color:#ffcd02">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></a>
                </div>
            </div>
        </div>

    <!--<div class="container" style="margin-top:20px">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Car Wash Clean Graph</div>
                <div class="panel-body">
                    <div id ="mygraph"></div>
                </div>
        </div>
    </div>
</div>-->

<!-- Grafik TIKET TERBUKA-->
  <script src="assets/js/jquery-1.10.1.min.js"></script>
    <script src="assets/js/highcharts.js"></script>
     <script src="assets/js/exporting.js"></script>
<script type="text/javascript">
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    width:550,
                    renderTo: 'mygraph2',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Tiket Terbuka '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',

                    name: 'Browser share',
                    data: [
                    <?php
                        //include "connection.php";
                        $query = mysqli_query($mysqli,"SELECT priority
                        FROM `grap` GROUP BY 1");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $browsername = $row['priority'];
                         
                            $data = mysqli_fetch_array(mysqli_query($mysqli,"SELECT total from grap where priority='$browsername'"));
                            $jumlah = $data['total'];
                            ?>
                            [ 
                                '<?php echo $browsername ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
             
                    ]
                }]
              });
        }); 
    </script>

<!-- Grafik TIKET PENDING
    <script type="text/javascript">
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    width:550,
                    renderTo: 'mygraph3',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Tiket Pending '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        //include "connection.php";
                        $query = mysqli_query($mysqli,"SELECT departemen
                        FROM `grap2` GROUP BY 1");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $browsername = $row['departemen'];
                
                            $data = mysqli_fetch_array(mysqli_query($mysqli,"SELECT total from grap2 where departemen='$browsername'"));
                            $jumlah = $data['total'];
                            ?>
                            [ 
                                '<?php echo $browsername ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
                    ]
                }]
              });
        }); 
    </script> -->

<!-- Grafik TIKET SELESAI-->
<script type="text/javascript">
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    width:550,
                    renderTo: 'mygraph3',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Tiket Selesai '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        //include "connection.php";
                        $query = mysqli_query($mysqli,"SELECT departemen
                        FROM `grap2` GROUP BY 1");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $browsername = $row['departemen'];
                
                            $data = mysqli_fetch_array(mysqli_query($mysqli,"SELECT total from grap2 where departemen='$browsername'"));
                            $jumlah = $data['total'];
                            ?>
                            [ 
                                '<?php echo $browsername ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
                    ]
                }]
              });
        }); 
    </script>


    <div class="col-xs-12">
      <div class="alert alert-block alert-success">
                <!--<button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-user"></i>
                </button>-->
                <i class="ace-icon fa fa-user green"></i>
                Grafik
               
            </div>
        </div>
   
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-xs-12">

     <div id="mygraph2"></div>
      </div>

      <div class="col-xl-6 col-lg-6 col-xs-12">

     <div id="mygraph3"></div>
      </div>
    </div>
   


    <?php
}

elseif ($_SESSION['hak_akses']=='STAFF') { ?>
<div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <!--<button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-user"></i>
                </button>-->
                <i class="ace-icon fa fa-user green"></i>
                Selamat Datang
                <strong class="green"><?php echo $_SESSION['nama_user']; ?></strong> di Helpdesk Infrastruktur, Laporkan Kendala Anda Pada Kami!
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

     <div class="row">
    
     <div class="col-lg-3 col-xs-6"> 
    <!-- small box TERBUKA-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
        <?php  
            $user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 

            COUNT(DISTINCT (`idtiket`)) AS tiket 
            FROM tiket WHERE status='Open' and id_user='$user'")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Terbuka</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box BERJALAN-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
        <?php  
            $user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
            count(*) AS tiket
            FROM tiket WHERE status='Pending' and id_user='$user'")
            or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Berjalan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box SELESAI-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
        <?php  
            $user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
        COUNT(DISTINCT (`idtiket`)) AS tiket
        FROM tiket WHERE status='Closed' and id_user='$user'")
            or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
                ?>
                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Selesai</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box TOTAL-->
             <div style="background-color:#313e5d;color:#fff" class="small-box">
                <?php  
                $user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
                count(*) AS tiket 
                FROM
                tiket where id_user='$user'")
                    or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                     <h3><?php echo $data['tiket']; ?></h3>
                    <p>Total Tiket</p>
                </div>
                <div class="icon">
                <div style="color:#ffcd02">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>
    </div>

    <!--<div class="container" style="margin-top:20px">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Car Wash Clean Graph</div>
                <div class="panel-body">
                    <div id ="mygraph"></div>
                </div>
        </div>
    </div>
</div>-->
</div>



    <?php
}

elseif ($_SESSION['hak_akses']=='HELPDESK') { ?>
<div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <!--s<button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-user"></i>
                </button>-->
                <i class="ace-icon fa fa-user green"></i>
                Selamat Datang
                <strong class="green"><?php echo $_SESSION['nama_user']; ?></strong> di Helpdesk Infrastruktur!
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

     <div class="row">

    <div class="col-lg-3 col-xs-6">
    <!-- small box TERBUKA-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
            <?php  
            //$user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
            COUNT(DISTINCT (`idtiket`)) AS tiket
            FROM tiket WHERE status='Open'")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Terbuka</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box BERJALAN-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
            <?php  
            //$user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
            COUNT(DISTINCT (`idtiket`)) AS tiket FROM tiket WHERE status='Closed'")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
            ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Berjalan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box SELESAI-->
        <div style="background-color:#313e5d;color:#fff" class="small-box">
            <?php  
            //$user= $_SESSION['id_user'];
            //$users= $_SESSION['nama_user'];
            $query = mysqli_query($mysqli, "SELECT 
            COUNT(DISTINCT (`idtiket`)) AS tiket FROM tiket WHERE status='Closed'")
                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                    <h3><?php echo $data['tiket']; ?></h3>
                    <p>Tiket Selesai</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box TOTAL-->
             <div style="background-color:#313e5d;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT count(*) AS tiket FROM tiket")
                    or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                    $data = mysqli_fetch_assoc($query);
                ?>

                <div class="inner">
                     <h3><?php echo $data['tiket']; ?></h3>
                    <p>Total Tiket</p>
                </div>
                <div class="icon">
                <div style="color:#fecd08">
                    <i class="fa fa-file"></i>
                </div>
                </div>
                <a class="small-box-footer"></i></a>
            </div>
        </div>
    </div>

    <!--<div class="container" style="margin-top:20px">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Car Wash Clean Graph</div>
                <div class="panel-body">
                    <div id ="mygraph"></div>
                </div>
        </div>
    </div>
</div>-->
</div>


<?php
}
?>



     
     <!-- /.page-content -->