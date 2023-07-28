<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $idtiket = mysqli_real_escape_string($mysqli, trim($_POST['notiket']));
            $departemen = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
            $nama = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $case = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
            $prio = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
            $tanggal = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
            $id_user = $_SESSION['id_user'];

         // Proses upload foto
$direktorifoto = "assets/uploads/";

// Mengecek apakah direktori sudah ada
if (!is_dir($direktorifoto)) {
    //Membuat direktori jika belum ada
    mkdir($direktorifoto, 0777, true);
}

$foto = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$direktoriFoto = $direktorifoto . $foto;

// Mendapatkan informasi ekstensi file
$file_extension = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

// Mengecek apakah file foto berhasil diupload dan ekstensinya valid
if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    if (in_array($file_extension, array('jpg', 'jpeg', 'png'))) {
        // Move uploaded file to destination directory with the original name
        if (move_uploaded_file($foto_tmp, $direktoriFoto)) {
            // Set izin tulis pada direktori foto
            chmod($direktoriFoto, 0777);

            // ...

            $query = mysqli_query($mysqli, "INSERT INTO tiket (idtiket, departemen, nama, email, priority, problem, id_user, date, foto)
                                            VALUES ('$idtiket', '$departemen', '$nama', '$email', '$prio', '$case', '$id_user', '$tanggal', '$direktoriFoto')")
                or die('Ada kesalahan pada query insert: ' . mysqli_error($mysqli));

            // ...
        } else {
            echo "Gagal mengupload file foto.";
        }
    } else {
        echo "Ekstensi file tidak valid. Hanya file JPG, JPEG, dan PNG yang diizinkan.";
    }
} else {
    echo "Terjadi kesalahan dalam upload foto: " . $_FILES['foto']['error'];
    exit;
}



            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=tiket_list&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['idtiket'])) {
                // ambil data hasil submit dari form
                $idtiket = mysqli_real_escape_string($mysqli, trim($_POST['idtiket']));
                $departemen = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
                $nama = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
                $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
                $case = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
                $prio = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
                $problem = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
                $status = mysqli_real_escape_string($mysqli, trim($_POST['status_tiket']));

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
