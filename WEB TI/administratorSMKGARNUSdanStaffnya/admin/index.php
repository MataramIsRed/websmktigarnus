       <?php
        include "head.php";
        if($_SESSION['login'] == true){
          if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
        ?>
        <div class="right_col " role="main">
          <!-- top tiles -->
          <div class="row d-flex justify-content-center" style="display: inline-block;" >
          <div class="tile_count ">
            <div class="col-md-3 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pelajar</span>
              <div class="count"><?php
              $result = mysqli_query($conn,"SELECT * FROM data_siswa");
              $total = mysqli_num_rows($result);
              echo $total;
              ?></div>
              <span class="count_bottom"><i class="green">4%</i> From last Year</span>
            </div>
            <div class="col-md-3 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pelajar Laki - laki</span>
              <div class="count green"><?php
              $result1 = mysqli_query($conn,"SELECT * FROM data_siswa WHERE jenis_kelamin='Laki-laki'");
              $total1 = mysqli_num_rows($result1);
              echo $total1;
              ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Year</span>
            </div>
            <div class="col-md-3 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pelajar Perempuan</span>
              <div class="count"><?php
              $result2 = mysqli_query($conn,"SELECT * FROM data_siswa WHERE jenis_kelamin='Perempuan'");
              $total2 = mysqli_num_rows($result2);
                echo $total2;
              ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Year</span>
            </div>
            <div class="col-md-3 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Alumni</span>
              <div class="count"><?php
              $resultx = mysqli_query($conn,"SELECT * FROM data_alumni");
              $totalx = mysqli_num_rows($resultx);
              echo $totalx;
              ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Year</span>
            </div>
            
          </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
          <div class="container d-flex align-items-center x_panel">
            <div class="col-sm-12">
              <div id="text x_title" class=""><h2></h2></div>
              <h1>Selamat Datang <?php echo $_SESSION['username']?></h1>
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