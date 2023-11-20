<?php
include "head.php";
include "../connn.php";
if(($_SESSION['login'] == true)){
  if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
    $jam_maks = "SELECT * FROM umum WHERE nama='jam_masuk'";
    $sql_jam = mysqli_query($conn,$jam_maks);
    $jam = mysqli_fetch_array($sql_jam,MYSQLI_BOTH);
?> 


<div class="right_col" role="main">

<div class="col-md-12 col-sm-12 ">
    <div class="col-md-12">
        
    <div class="x_panel">
                          <div class="x_title">
            Profil Instansi
            </div>
            <div class="panel-body">
            <?php

                if (isset($_GET['edit'])) {
                    if ($_GET['edit']=='berhasil'){
                        echo"<div class='alert alert-success'><strong>Berhasil!</strong> Pengaturan Website Telah Diupdate</div>";
                    }else if ($_GET['edit']=='gagal'){
                        echo"<div class='alert alert-danger'><strong>Gagal!</strong> Pengaturan Website Gagal Diupdate</div>";
                    }    
                }

                if (isset($_GET['absen'])) {
                    if ($_GET['absen']=='berhasil'){
                        echo"<div class='alert alert-success'><strong>Berhasil!</strong> Pengaturan Absensi Telah Diupdate</div>";
                    }else if ($_GET['absen']=='gagal'){
                        echo"<div class='alert alert-danger'><strong>Gagal!</strong> Pengaturan Absensi Gagal Diupdate</div>";
                    }    
                }
            ?>

            <?php
                //Include database
              
                //Mengambil data profil aplikasi
                $query=mysqli_query($conn,"select * from tbl_site order by nama_instansi desc limit 1");
                $data = mysqli_fetch_array($query); 
            ?>

                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $data['id_site'];?>" name="id">  
                    </div>
                    <div class="form-group">
                        <label>Nama Instansi :</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_instansi'];?>" name="nama_instansi" placeholder="Masukan Nama Instansi" required>  
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua (Pimpinan) :</label>
                        <input type="text" class="form-control" value="<?php echo $data['pimpinan'];?>" name="pimpinan" placeholder="Masukan Nama Ketua" required>  
                    </div>
                    <div class="form-group">
                        <label>Nama Pembina Magang :</label>
                        <input type="text" class="form-control" value="<?php echo $data['pembimbing'];?>" name="pembimbing" placeholder="Masukan Nama Pembimbing" required>  
                    </div>
                    <div class="form-group">
                        <label>Alamat :</label>
                        <input type="text" class="form-control" value="<?php echo $data['alamat'];?>" placeholder="Masukan Alamat Instansi" name="alamat">  
                    </div>
                    <div class="form-group">
                        <label>No Telp :</label>
                        <input type="text" class="form-control" value="<?php echo $data['no_telp'];?>" placeholder="Masukan Nomor Telp" name="no_telp">  
                    </div>
                    <div class="form-group">
                        <label>Website :</label>
                        <input type="text" class="form-control" value="<?php echo $data['website'];?>" placeholder="Masukan Alamat Website" name="website">  
                    </div>
                    <div class="form-group">
                        <div id="msg"></div>
                        <label>Logo :</label>
                        <input type="file" name="logo" class="file" >
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                <div class="input-group-append">
                                        <button type="button" id="pilih_logo" class="browse btn btn-info"><i class="fa fa-search"></i> Pilih Logo</button>
                                </div>
                            </div>
                        <img src="logo/<?php echo $data['logo'];?>" id="preview" width="10%" class="img-thumbnail">
                        <input type="hidden" name="logo_sebelumnya" value="<?php echo $data['logo'];?>" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="ubah_aplikasi" ><i class="fa fa-edit"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            </div>
<?php
include "foot.php";
}else{
  header('Location: ../index.php?error=NoAccess');
  exit();
}
}else{
  header('Location: ../index.php?error=SessionEnd');
  exit();
}
?>