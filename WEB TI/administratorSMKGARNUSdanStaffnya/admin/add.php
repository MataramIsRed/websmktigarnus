<?php
        include "../connn.php";
        if($_SESSION['login'] == true){
        if($_SESSION['kedudukan'] == "admin"){
    if (isset ($_POST['Simpan'])){

      $sumber = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
      $pindah = move_uploaded_file($sumber, '../foto/'.$nama_file);
            
            $sql_simpan = "INSERT INTO data_siswa(`nis`, `nama`, `jenis_kelamin`, `kelas`,`jurusan`, `foto`) VALUES (
          '".$_POST['nis']."',
          '".$_POST['nama']."',
          '".$_POST['jekel']."',
          '".$_POST['kelas']."',
          '".$_POST['jurusan']."',
          '".$nama_file."')";
        $query_simpan = mysqli_query($conn, $sql_simpan);
    
            if ($query_simpan) {
                echo "<script>alert('Tambah Data Sukses')</script>";
                echo "<meta http-equiv='refresh' content='0; url=add.php'>";
            }else{
                echo "<script>alert('Tambah Data Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=add.php'>";
            }
            require '../vendors/autoload.php';
            $text = "".$_POST['nis']."";
            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents("../bar/" . $_POST['nama'] .$_POST['nis']. ".jpg", $generator->getBarcode($_POST['nis'], $generator::TYPE_CODE_128));
          }
}else{
  header('Location: ../index.php?error=NoAccess');
  exit();
}
}else{
  header('Location: ../index.php?error=SessionEnd');
  exit();
}
?>