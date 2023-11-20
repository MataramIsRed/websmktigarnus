<?php
include "head.php";

if(($_SESSION['login'] == true)){
  if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
    $jam_maks = "SELECT * FROM umum WHERE nama='jam_masuk'";
    $sql_jam = mysqli_query($conn,$jam_maks);
    $jam = mysqli_fetch_array($sql_jam,MYSQLI_BOTH);
?>  
        <!-- page content -->
        <div class="right_col" role="main">
        <!-- Start to do list -->
        <div class="col-md-12 col-sm-12 ">
          <div class="container d-flex align-items-center x_panel">
            <div class="col-sm-12">
              <div id="text x_title" class=""><h2>Scan BarCode</h2></div>
            <form method="POST" action="absen_perform.php">
              <div class="form-group">
                <input type="text"
                  class="form-control" name="nis" id="1" aria-describedby="helpId" placeholder="KODE" autofocus>
              </div>
              <div class="form-group">
                <label for="">Batas Waktu</label>
                <input type="time"
                  class="form-control" name="timeLimit" id="1" aria-describedby="helpId" value="<?php echo $jam['keterangan'];?>" autofocus>
              </div>
              <div class="form-group">
                <button type="submit" name="absen" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
                </div>
                <!-- End to do list -->
                <!-- TABLE -->
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Absen Siswa Hari Ini</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a onclick = "ExportToExcel('xlsx')" name="" id="" class="btn btn-outline-secondary text-dark" href="#" role="button">Export Excel</a>
                              </li>
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
                                  <th>NIS</th>
                                  <th>NAMA</th>
                                  <th>KELAS</th>
                                  <th>JURUSAN</th>
                                  <th>TANGGAL</th>
                                  <th>JAM MASUK</th>
                                  <!-- <th>BARCODE</th>
                                  <th>ACTION</th> -->
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              date_default_timezone_set('Asia/Jakarta');
                              require '../vendors/autoload.php';
                              $tanggal_sekarang = date("Y-m-d ");
                              $jam_dari = "00:00:00";
                              $jam_sampai = "23:59:59";
                              //$Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'";                          
                              $query = mysqli_query($conn,"SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'");
                              $no=1;
                              while($data = mysqli_fetch_array($query,MYSQLI_BOTH)){
                              ?>
                              
                                <tr>
                                  
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $data['nis'];?></td>
                                  <td><?php echo $data['nama'];?></td>
                                  <td><?php echo $data['kelas'];?></td>
                                  <td><?php echo $data['jurusan'];?></td>
                                  <td><?php echo $data['tanggal'];?></td>
                                  <td><?php echo $data['jam'];?></td>
                                
                                  <!-- <td>
                                    <a name="" id="" class="btn btn-danger" href="delAbsen.php?kode=<?php echo $data['id'];?>" role="button">Hapus</a>
                                  </td>  -->
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
        

        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        <script>
const today = new Date();
const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; // Months start at 0!
let dd = today.getDate();

if (dd < 10) dd = '0' + dd;
if (mm < 10) mm = '0' + mm;

const formattedToday = dd + '/' + mm + '/' + yyyy;


function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('datatable-buttons');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Absen ' + formattedToday + '.' + (type || 'xlsx')));
    }

    </script>


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