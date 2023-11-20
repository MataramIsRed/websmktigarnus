<?php
        include "head.php";
        if($_SESSION['login'] == true){
          if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
        ?>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">NIS</label required>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="nis" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="nama" class="form-control " data-inputmask="'mask' : '(999) 999-9999'" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <select name="jekel" class="form-control">
                              <option>Laki-laki</option>
                              <option>Perempuan</option>
                            </select>                        
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Jurusan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="jurusan" class="form-control " placeholder="Contoh: RPL 2" data-inputmask="'mask' : '(999) 999-9999'" required>
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
                
<!-- Modal -->
<div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                      <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">NIS</label required>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="nis" class="form-control">
                          </div>
                        </div>
                        <div class="ln_solid"></div>

                        <div class="form-group row">
                          <div class="col-md-9 offset-md-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Hapus" class="btn btn-success">Hapus</button>
                          </div>
                        </div>

                      </div>
                      </form>

                    </div>
                  </div>
                </div>

                <script>
                  $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM
                    
                  });
                </script>
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Data Siswa</h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <?php if($_SESSION['kedudukan'] == "superadmin"){?>
                              <li><a class="btn btn-outline-secondary" data-toggle="modal" data-target="#modelId"><i class="fa fa-plus" >Tambah Data</i></a></li>
                              <li><a class="btn btn-outline-secondary" data-toggle="modal" data-target="#modelId2"><i class="fa fa-minus" >Hapus Data</i></a></li>
                              <?php
                            }
                            ?>
                              <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                  <th>NIS</th>
                                  <th>NAMA</th>
                                  <th>JURUSAN</th>
                                  <th>TAHUN KELULUSAN</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tbody>
                              <?php
                              $query = mysqli_query($conn,"SELECT * FROM data_alumni");
                              $no=1;
                              while($data = mysqli_fetch_array($query,MYSQLI_BOTH)){
                              ?>
                              
                                <tr>
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $data['nis'];?></td>
                                  <td><?php echo $data['nama'];?></td>
                                  <td><?php echo $data['jurusan'];?></td>
                                  <td><?php echo $data['tahun_kelulusan'];?></td>
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
        
        $sql_simpan = "INSERT INTO data_alumni(`nis`, `nama`, `jenis_kelamin`,`jurusan`, `tahun_kelulusan`) VALUES (
      '".$_POST['nis']."',
      '".$_POST['nama']."',
      '".$_POST['jekel']."',
      '".$_POST['jurusan']."',
      '".$_POST['tahun_kelulusan']."')";
    $query_simpan = mysqli_query($conn, $sql_simpan);

        if ($query_simpan) {
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_alumni.php'>";
        }else{
            echo "<script>alert('Tambah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_alumni.php'>";
        }
        }elseif(isset($_POST['Hapus'])){
        $sql_hapus = "DELETE FROM data_alumni WHERE nis='".$_POST['nis']."';";
        $query_hapus = mysqli_query($conn, $sql_hapus);
        if ($query_hapus) {
          echo "<script>alert('Tambah Data Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=data_alumni.php'>";
      }else{
          echo "<script>alert('Tambah Data Gagal')</script>";
          echo "<meta http-equiv='refresh' content='0; url=data_alumni.php'>";
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
