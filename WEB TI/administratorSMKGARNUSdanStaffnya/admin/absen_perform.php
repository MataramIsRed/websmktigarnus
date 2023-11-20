<?php
session_start();
$conn = new mysqli("localhost","root","","school_dashboard");
if(isset($_SESSION['login'])){
if(isset($_POST['absen'])){
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_sekarang = date("Y-m-d ");
    $jam_dari = "00:00:00";
    $jam_sampai = "23:59:59";
    $Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."' AND nis = '".$_POST['nis']."'";
    $cek_tanggal =  $conn -> query($Qcek_tanggal);
    $cek_jamset = $conn -> query("SELECT * FROM umum WHERE nama='jam_masuk'");
    $jamset = mysqli_fetch_array($cek_jamset,MYSQLI_BOTH);
    $timeLimit = $_POST['timeLimit'];
    if($jamset['keterangan'] != $timeLimit){
        $conn -> query("UPDATE umum SET keterangan = '".$timeLimit."' WHERE nama='jam_masuk'");
    }
    $num_rows = mysqli_num_rows($cek_tanggal);
    $sql_cek = "SELECT * FROM data_siswa WHERE nis='".$_POST['nis']."'";
	$query_cek = $conn -> query($sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    $num = mysqli_num_rows($query_cek);
    $keterangan = "";

    if($num_rows == 0){
        if($num == 1){
            $poin = 0 + $data_cek['poin'] + 15;
            $tanggal = date("Y-m-d");
            $jam = date("H:i:s");
            if($jam >= $timeLimit){
                $keterangan = "Terlambat";
            }else{
                $keterangan = "Hadir";
            }
        $sql_up_poin = "UPDATE data_siswa SET poin='".$poin."' WHERE nis='".$_POST['nis']."'";
        $sql_simpan = "INSERT INTO absen_siswa (`nis`, `nama`,`jurusan`,`kelas`, `tanggal`, `jam`, `keterangan`) VALUES (
            '".$_POST['nis']."',
            '".$data_cek['nama']."',
            '".$data_cek['jurusan']."',
            '".$data_cek['kelas']."',
            '".$tanggal."',
            '".$jam."',
            '".$keterangan."')";
        $query_simpan = $conn -> query($sql_simpan);
        $poin_simpan = $conn -> query($sql_up_poin);
        if ($query_simpan) {
            // echo "<script>alert('Absensi Sukses'); </script>";
            echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
        }else{
            // echo "<script>alert('Absensi Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
        }
        }else{
            echo "<script>alert('Gagal absen, NIS tidak ditemukan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
        }
    }else{
        // echo "<script>alert('Absensi Gagal, Kamu sudah absen hari ini.'); </script>";
        echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
    }


}else{
    echo "<script>alert('Gagal absen, NIS tidak ditemukan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
}
}else{
    echo "<script>alert('Sesi telah selesai')</script>";
    echo "<meta http-equiv='refresh' content='0; url=absen.php'>";
}


?>