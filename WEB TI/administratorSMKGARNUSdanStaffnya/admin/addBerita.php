<?php
include "../connn.php";
if(isset($_POST['buat'])){
    $judul = $_POST['judul_berita'];
    $sumber = $_FILES['preview']['tmp_name'];
    $preview = $_FILES['preview']['name'];
    $pindah = move_uploaded_file($sumber, '../foto/thumb/'.$preview);
    $beritaAdd = mysqli_query($conn, "INSERT INTO ")
}
?>