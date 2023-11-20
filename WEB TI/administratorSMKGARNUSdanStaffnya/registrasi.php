<?php
$conn = new mysqli("localhost","root","","school_dashboard");
$nis = $_POST['nis'];
$username = $_POST['username'];
$password = $_POST['pass'];
$kpassword = $_POST['kpass'];
$data_search = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nis='".$nis."'");
$role = $_POST['role'];
$cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='".$username."'");
if(mysqli_num_rows($cek) != 0){
    echo "<script>alert('Username Telah Digunakan!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}else{
    if($role == "Pengajar"){
        $data_guru = mysqli_query($conn, "SELECT * FROM data_guru WHERE kode_pengajar='".$nis."'");
        if(mysqli_num_rows($data_guru) == 1){
            $tambah_data = mysqli_query($conn, "INSERT INTO pengguna(username,nis, pass, kedudukan) VALUE(
                '".$username."',
                '".$password."',
                'guru'
            );");
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Data tidak ditemukan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }
    }elseif($role == "Pelajar"){
        $data_siswa = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nis='".$nis."'");
        if(mysqli_num_rows($data_siswa) == 1){
            $tambah_data = mysqli_query($conn, "INSERT INTO pengguna(username,nis, pass, kedudukan) VALUE(
                '".$username."',
                '".$nis."',
                '".$password."',
                'pelajar'
            );");
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Data tidak ditemukan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }
    }elseif($role == "Staff"){
        $data_siswa = mysqli_query($conn, "SELECT * FROM data_staff WHERE kode_staff='".$nis."'");
        if(mysqli_num_rows($data_siswa) == 1){
            $tambah_data = mysqli_query($conn, "INSERT INTO pengguna(username,nis, pass, kedudukan) VALUE(
                '".$username."',
                '".$nis."',
                '".$password."',
                'staff'
            );");
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Data tidak ditemukan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }
    }
}
?>