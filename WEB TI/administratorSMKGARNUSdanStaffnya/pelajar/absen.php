<?php
include "head.php";

if(($_SESSION['login'] == true)){
  if($_SESSION['kedudukan'] == "pelajar"){
?>
        <!-- page content -->
        <!-- Start to do list -->
                <!-- End to do list -->
                <!-- TABLE -->
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Absen Hari Ini</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div id="status" class="card-box">
                                    <?php
                                        $tanggal_sekarang = date("Y-m-d ");
                                        $jam_dari = "00:00:00";
                                        $jam_sampai = "23:59:59";
                                        //$Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'";                          
                                        $cek = mysqli_query($conn,"SELECT * FROM absen_siswa WHERE nis='".$_SESSION['nis']."' AND tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'");
                                        $cek1 = mysqli_num_rows($cek);
                                        if($cek1 == 0){
                                          echo "
                                          <script>
                                            let x = document.getElementById('status');
                                            x.classList.add('btn');
                                            x.classList.add('btn-outline-danger');
                                            x.classList.add('bg-outline-danger');
                                          </script>
                                          ";
                                    ?>
                                    <h5>
                                      Anda belum absen hari ini 
                                    </h5>
                                    <?php
                                        }else{
                                          echo "
                                          <script>
                                            let x = document.getElementById('status');
                                            x.classList.add('btn');
                                            x.classList.add('btn-outline-success');
                                            x.classList.add('bg-outline-success');
                                          </script>
                                          ";
                                    ?>
                                    <h5>
                                      Anda sudah absen hari ini 
                                    </h5>
                                    <?php
                                        }
                                    ?>
                                  </div>
                                </div>
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
                                  <th>BARCODE</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              require '../vendors/autoload.php';
                              $query = mysqli_query($conn,"SELECT * FROM data_siswa WHERE nis='".$_SESSION['nis']."'");
                              $no=1;
                              while($data = mysqli_fetch_array($query,MYSQLI_BOTH)){
                              ?>
                              
                                <tr>
                                  
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $data['nis'];?></td>
                                  <td><?php echo $data['nama'];?></td>
                                  <td><?php echo $data['kelas'];?></td>
                                  <td><?php echo $data['jurusan'];?></td>
                                  <td>
                                    <img src="../bar/<?= $data['nama'],$_SESSION['nis'] ?>.jpg" alt="">
                                  </td>
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