<?php
session_start();
if($_SESSION['kedudukan'] == 'superadmin'){
$koneksi = new mysqli ("localhost","root","","school_dashboard");
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM data_staff WHERE kode_staff='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    $sql_hapus = "DELETE FROM data_staff WHERE kode_staff='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if($query_hapus){
        echo "<script>alert('Hapus Data Sukses')</script>";
        echo "<meta http-equiv='refresh' content='0; url=data_staff.php'>";
    }else{
        echo "<script>alert('Hapus Data Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=data_staff.php'>";
    }
    
}
}else{
    echo "<script>alert('NO ACCESS')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>