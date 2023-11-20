<?php
        include "head.php";
        if($_SESSION['login'] == true){
          if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
        ?>
        <!-- page content -->
        

        <!-- page content -->
        <div class="right_col" role="main">
                <!-- TABLE -->
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Kode</label required>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="kode" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="nama" class="form-control " data-inputmask="'mask' : '(999) 999-9999'" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="pass" class="form-control" placeholder="contoh: 10/11/12" data-inputmask="'mask' : '(999) 999-9999'" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Foto</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="file" name="foto" id="" placeholder="" class="form-control-file" aria-describedby="fileHelpId" required>
                          </div>
                        </div>
                        <div class="ln_solid"></div>

                        <div class="form-group row">
                          <div class="col-md-9 offset-md-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Simpan" class="btn btn-success">Submit</button>
                          </div>
                        </div>

                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Button trigger modal -->
                
                
                <script>
                  $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM
                    
                  });
                </script>
                <!-- TABLE -->
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Data Admin</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="btn btn-outline-secondary" data-toggle="modal" data-target="#modelId"><i class="fa fa-plus" >Tambah Data</i></a></li>
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th>NO</th>
                                  <th>NAMA</th>
                                  <th>LEVEL</th>
                                  <?php
                                  if($_SESSION['kedudukan']){
                                    echo "<th>ACTION</th>";
                                  }
                                  ?>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $query = mysqli_query($conn,"SELECT * FROM pengguna WHERE kedudukan = 'admin' OR kedudukan = 'superadmin'");
                              $no=1;
                              while($data = mysqli_fetch_array($query,MYSQLI_BOTH)){
                              ?>
                              
                                <tr>
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $data['username'];?></td>
                                  <td><?php echo $data['kedudukan'];?></td>
                                  <?php
                                  if($_SESSION['kedudukan']){
                                    echo "<td><a class='btn btn-danger' href='delAdmin.php?kode=".$data['id']."' role='button'>Hapus</a></td>";
                                  }
                                  ?>
                                </tr>
                                <?php
                                $no++;
                              }?>
                              </tbody>
                              
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                      </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>


        
        <!-- /page content -->

<?php
if (isset ($_POST['Simpan'])){

  $sumber = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
  $pindah = move_uploaded_file($sumber, '../foto/'.$nama_file);
        
        $sql_simpan = "INSERT INTO pengguna(`nis`,`username`,`pass`,`kedudukan`,`foto`) VALUES (
      '".$_POST['kode']."',
      '".$_POST['nama']."',
      '".$_POST['pass']."',
      'admin',
      '".$nama_file."')";
    $query_simpan = mysqli_query($conn, $sql_simpan);

        if ($query_simpan) {
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
        }else{
            echo "<script>alert('Tambah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
        }
        }elseif(isset($_POST['Hapus'])){
          $sql_hapus = "DELETE FROM pengguna WHERE nis='".$_POST['kode']."';";
          $query_hapus = mysqli_query($conn, $sql_hapus);
          if ($query_hapus) {
            echo "<script>alert('Hapus Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_admin.php'>";
        }else{
            echo "<script>alert('Hapus Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_admin.php'>";
        }
        }
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