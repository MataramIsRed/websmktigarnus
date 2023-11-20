<?php
session_start();
$conn = new mysqli("localhost","root","","school_dashboard");
if(isset($_SESSION['login'])){
if(isset($_GET['nis'])){
    $tanggal_sekarang = date("Y-m-d ");
    $jam_dari = "00:00:00";
    $jam_sampai = "23:59:59";
    $Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."' AND nis = '".$_GET['nis']."'";
    $cek_tanggal =  mysqli_query($conn, $Qcek_tanggal);

    $num_rows = mysqli_num_rows($cek_tanggal);
    $sql_cek = "SELECT * FROM data_siswa WHERE nis='".$_GET['nis']."'";
	$query_cek = mysqli_query($conn, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

    if($num_rows == 0){
        $tanggal = date("Y-m-d H:i:s");
        $sql_simpan = "INSERT INTO absen_siswa (`nis`, `nama`,`jurusan`,`kelas`, `tanggal`) VALUES (
            '".$_GET['nis']."',
            '".$data_cek['nama']."',
            '".$data_cek['jurusan']."',
            '".$data_cek['kelas']."',
            '".$tanggal."')";
        $query_simpan = mysqli_query($conn, $sql_simpan);
        
        if ($query_simpan) {
            echo "<script>alert('Absensi Sukses'); </script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Absensi Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }
    }else{
        echo "<script>alert('Absensi Gagal, Kamu sudah absen hari ini.'); </script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }


}else{
    echo "<script>alert('Gagal absen, NIS tidak ditemukan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
}else{
    echo "<script>alert('Sesi telah selesai')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}


?>