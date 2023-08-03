<?php 
/* panggil file database.php untuk koneksi ke database */
require_once "../../config/database.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data.xls");

?>
<head>
    <title>LAPORAN</title>
</head>
  <table border='1'>
    <thead>
      <tr>
        <th class='center'>No</th>
          <th class='center'>IDtiket</th>
            <th class='center'>Nama</th>
              <th class='center'>Bagian/Unit Kerja</th>
                <th class='center'>NIP</th>
                  <th class='center'>Jenis Kendala</th>
                    <th class="center" >Kendala</th>
                      <th class="center" >Teknisi</th>
                        <th class="center" >Keterangan Teknisi</th>
                          <th class="center">Status Tiket</th>
                            <th class='center'>Tanggal Dibuat</th>
       </tr>
    </thead>
  <?php
    error_reporting(0);
    $no = 1;
                          
if (isset($_GET['dari'])) {
    $dari=$_GET['dari'];
    $sampai=$_GET['sampai'];
}

  $query = mysqli_query($mysqli, "SELECT
  *
FROM
  tiket where date between '".$_GET['dari']."' and '".$_GET['sampai']."'
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
                      <td width="100"><?php echo $data['teknisi']; ?></td>
                         <td width="100"><?php echo $data['keteranganteknisi']; ?></td>
                           <td width="100" style="background:<?php echo $warna; ?>">
      <?php echo $data['status']; ?></td>
        <td width="100"><?php echo $data['createdate']; ?></td>
          <td class='center' width='30'>
      <div>
      </div>
      </div>
      </td>
      </tr>
      <?php
        $no++;
      } ?>
    </tbody>
  </table>
          