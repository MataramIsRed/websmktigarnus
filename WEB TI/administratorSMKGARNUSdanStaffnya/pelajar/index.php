<?php
include "head.php";
if(($_SESSION['login'] == true)){
  if($_SESSION['kedudukan'] == "pelajar"){
?>
        <!-- page content -->

          <!-- top tiles -->
          <!-- <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          <?php
                  // $year = date("Y");
                  // $query1 = mysqli_query($conn,"SELECT * FROM data_siswa WHERE tahun_ajaran = '".$year."'");
                  // $no=1;
                  // while($data = mysqli_fetch_array($query1,MYSQLI_BOTH)){
                ?>
            <div class="col-md-4 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
              <div class="count"><?php
              // echo $data['total_murid'];
              ?></div>
              <span class="count_bottom"><i class="green">4%</i> From last Year</span>
            </div>
            <div class="col-md-4 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa Laki</span>
              <div class="count green"><?php
              // echo $data['total_siswa'];
              ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
              <div class="count"><?php
              // echo $data['total_siswi'];
              ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <?php
            // }?>
          </div>
        </div> -->
                <!-- TABLE -->
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Detail Siswa</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                              <tbody>
                              <?php
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