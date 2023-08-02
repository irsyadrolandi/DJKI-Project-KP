<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $idtiket = mysqli_real_escape_string($mysqli, trim($_POST['notiket']));
            $departemen = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
            $nama = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $case = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
            $prio = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
            $teknisi = mysqli_real_escape_string($mysqli, trim($_POST['teknisi']));
            $keteranganteknisi = mysqli_real_escape_string($mysqli, trim($_POST['keteranganteknisi']));
            $tanggal = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
            $id_user = $_SESSION['id_user'];

            // Proses upload foto jika ada foto yang diunggah
            $foto = $_FILES['foto']['name'];
            if (!empty($foto)) {
                $direktorifoto = "assets/uploads/";
                if (!is_dir($direktorifoto)) {
                    mkdir($direktorifoto, 0777, true);
                }

                $foto_tmp = $_FILES['foto']['tmp_name'];
                $direktoriFoto = $direktorifoto . $foto;
                $file_extension = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

                if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                    if (in_array($file_extension, array('jpg', 'jpeg', 'png'))) {
                        if (move_uploaded_file($foto_tmp, $direktoriFoto)) {
                            chmod($direktoriFoto, 0777);
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
            }

            $query = mysqli_query($mysqli, "INSERT INTO tiket (idtiket, departemen, nama, email, priority, teknisi, keteranganteknisi, problem, id_user, date, foto)
                                            VALUES ('$idtiket', '$departemen', '$nama', '$email', '$prio', '$teknisi', '$keteranganteknisi', '$case', '$id_user', '$tanggal', '$direktoriFoto')")
                or die('Ada kesalahan pada query insert: ' . mysqli_error($mysqli));

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
                $teknisi = mysqli_real_escape_string($mysqli, trim($_POST['teknisi']));
                $keteranganteknisi = mysqli_real_escape_string($mysqli, trim($_POST['keteranganteknisi']));
                $status = mysqli_real_escape_string($mysqli, trim($_POST['status_tiket']));

                // Proses upload foto jika ada foto yang diunggah
                $foto = $_FILES['foto']['name'];
                if (!empty($foto)) {
                    $direktorifoto = "assets/uploads/";
                    if (!is_dir($direktorifoto)) {
                        mkdir($direktorifoto, 0777, true);
                    }

                    $foto_tmp = $_FILES['foto']['tmp_name'];
                    $direktoriFoto = $direktorifoto . $foto;
                    $file_extension = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

                    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                        if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'pdf'))) {
                            if (move_uploaded_file($foto_tmp, $direktoriFoto)) {
                                chmod($direktoriFoto, 0777);
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
                }

                // Proses update data ke dalam database
                $query = mysqli_query($mysqli, "UPDATE tiket SET status = '$status',
                                                            updateuser = '$id_user', 
                                                            solveby = '$id_user',
                                                            foto = '$direktoriFoto'
               WHERE idtiket = '$idtiket'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

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
