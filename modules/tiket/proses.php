<?php
session_start();


require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
             $idtiket                = mysqli_real_escape_string($mysqli, trim($_POST['notiket']));
             $departemen             = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
             $nama                   = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
             $email                  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
             $case                   = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
              $prio                   = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
             $tanggal                = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
             
             $id_user                = $_SESSION['id_user'];
           
                $query = mysqli_query($mysqli, "INSERT INTO tiket(idtiket,departemen,nama,email,priority,problem,id_user,date) 
                    VALUES('$idtiket','$departemen','$nama','$email','$prio','$case','$id_user','$tanggal')")
                                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=tiket_list&alert=1");
                }   
            }
           
        }   

    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['idtiket'])) {
                // ambil data hasil submit dari form
             $idtiket                = mysqli_real_escape_string($mysqli, trim($_POST['idtiket']));
             $departemen             = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
             $nama                   = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
             $email                  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
             $case                   = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
              $prio                   = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
             $problem                = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
              $status                = mysqli_real_escape_string($mysqli, trim($_POST['status_tiket']));
             $id_user                = $_SESSION['id_user'];

               
                    $query = mysqli_query($mysqli, "UPDATE tiket SET status               = '$status',
                         updateuser           = '$id_user', 
                         solveby              = '$id_user'     
                                                                     
                        WHERE idtiket                   = '$idtiket'")
                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=tiket&alert=2");
                    }
                }
              
        }
    }
}

?>