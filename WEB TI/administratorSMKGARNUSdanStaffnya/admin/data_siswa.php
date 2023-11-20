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
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Kelas</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="kelas" class="form-control" placeholder="contoh: 10/11/12" data-inputmask="'mask' : '(999) 999-9999'" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Jurusan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9 input-lg">
                            <input type="text" name="jurusan" class="form-control " placeholder="Contoh: RPL 2" data-inputmask="'mask' : '(999) 999-9999'" required>
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
                            <form action="POST">
                              <input type="text"
                                class="form-control col-sm-3 mx-3" name="" id="" aria-describedby="helpId" placeholder="Cari">
                                <select name="jurusan" class="form-control col-sm-1 mx-3">
                              <option>--Jurusan--</option>
                              <option>RPL</option>
                              <option>TKJ</option>
                              <option>TJA</option>
                              <option>AN</option>
                              <option>MM</option>
                              <option>OTKP</option>
                                </select>   

                                <select name="kelas" class="form-control col-sm-1 mx-3">
                              <option>--Kelas--</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                                </select>   

                            <ul class="nav navbar-right panel_toolbox">
                              <li><a type="submit" name="fil" onclick="$('#faisalcum').load('show_siswa_f.php')" class="btn btn-secondary text-light" >Filter</i></a></li>
                            </form>
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
                                  <th>KELAS</th>
                                  <th>JURUSAN</th>
                                </tr>
                              </thead>
                              <tbody id="faisalcum">
                              
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
            echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
        }else{
            echo "<script>alert('Tambah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
        }
        require '../vendors/autoload.php';
        $text = "".$_POST['nis']."";
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents("../bar/" . $_POST['nama'] .$_POST['nis']. ".jpg", $generator->getBarcode($_POST['nis'], $generator::TYPE_CODE_128));
      }elseif(isset($_POST['Hapus'])){
        $sql_hapus = "DELETE FROM data_siswa WHERE nis='".$_POST['nis']."';";
        $query_hapus = mysqli_query($conn, $sql_hapus);
        if ($query_hapus) {
          echo "<script>alert('Tambah Data Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
      }else{
          echo "<script>alert('Tambah Data Gagal')</script>";
          echo "<meta http-equiv='refresh' content='0; url=data_siswa.php'>";
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