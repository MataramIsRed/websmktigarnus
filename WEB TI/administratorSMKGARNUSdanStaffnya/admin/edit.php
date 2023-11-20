<?php
session_start();
include "../connn.php";
if($_SESSION['kedudukan'] == "superadmin"){

    if(isset($_POST['ubah_aplikasi'])){
        $sumber = $_FILES['logo']['tmp_name'];
    $nama_file = $_FILES['logo']['name'];
  $pindah = move_uploaded_file($sumber, '../foto/'.$nama_file);
        $sintaks = "UPDATE tbl_site SET 
        nama_instansi='".$_POST['nama_instansi']."',
        pimpinan='".$_POST['pimpinan']."',
        pembimbing='".$_POST['pembimbing']."',
        no_telp='".$_POST['no_telp']."',
        alamat='".$_POST['alamat']."',
        website='".$_POST['website']."',
        logo='".$nama_file."';";
        $query = mysqli_query($conn, $sintaks);
    }
    if($query){
        header("Location: edit_export.php");
    }
}
?>