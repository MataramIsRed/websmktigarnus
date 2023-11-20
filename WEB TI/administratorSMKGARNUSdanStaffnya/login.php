<?php
session_start();
$koneksi = new mysqli ("localhost","root","","school_dashboard");
$query = "SELECT * FROM pengguna";					
					
$query_run = mysqli_query($koneksi, $query);

    while ($data = mysqli_fetch_array($query_run,MYSQLI_BOTH))
{
if(isset ($_POST['login'])){
    if($_POST['username'] == $data['username']){
        if($_POST['pass'] == $data['pass']){
            if($data['kedudukan'] == "admin"){
                $_SESSION['login'] = true;
                $_SESSION['kedudukan'] = $data['kedudukan'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header('Location: admin/index.php');
                exit();
            }
            if($data['kedudukan'] == "superadmin"){
                $_SESSION['login'] = true;
                $_SESSION['kedudukan'] = $data['kedudukan'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header('Location: admin/index.php');
                exit();
            }
            elseif($data['kedudukan'] == "guru"){
                $_SESSION['login'] = true;
                $_SESSION['kedudukan'] = 'guru';
                $_SESSION['kode'] = $data['nis'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header('Location: guru/index.php');
                exit();
            }
            elseif($data['kedudukan'] == "staff"){
                $_SESSION['login'] = true;
                $_SESSION['kedudukan'] = 'superadmin';
                $_SESSION['id'] = $data['id'];
                $_SESSION['kode'] = $data['nis'];
                $_SESSION['username'] = $data['username'];
                header('Location: staff/index.php');
                exit();
            }
            elseif($data['kedudukan'] == "pelajar"){
                $_SESSION['login'] = true;
                $_SESSION['kedudukan'] = $data['kedudukan'];
                $_SESSION['nis'] = $data['nis'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header('Location: pelajar/index.php');
                exit();
            }
                
        }
        else{
            echo "<meta http-equiv='refresh' content='0; url=index.php?error=Username atau password salah'>";
        }
    }else{
        echo "<meta http-equiv='refresh' content='0; url=index.php?error=data tidak ditemukan'>";
    }
}
}