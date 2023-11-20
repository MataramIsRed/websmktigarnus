<?php
include "head.php";
date_default_timezone_set('Asia/Jakarta');
if(($_SESSION['login'] == true)){
  if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- Button trigger modal -->
          
          
          <!-- Modal -->
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Download File Laporan Absen(.xlsx)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <input class="form-control" type="text" id="filen" placeholder="nama file" value="Absen <?php echo date("Y-m-d ");?>">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick = "ExportToExcel('xlsx')" class="btn btn-primary">Download</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Download File Laporan Absen(.PDF)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="cetak_pdf_absen.php" method="GET">
                    <div class="modal-body">
                      <div class="container-fluid">
                    <input class="form-control" type="text" name="nis" id="nis" placeholder="NIS">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Download</button>
                  </form>
                </div>
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
                <!-- TABLE -->
                <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Absen Siswa</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li>
                                <div class="dropdown open">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                      Export
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a name="" id="" class="dropdown-item text-dark" data-toggle="modal" data-target="#modelId" href="#" role="button">Excel</a>
                                <a name="" id="" class="dropdown-item text-dark" data-toggle="modal" data-target="#modelId2" href="#" role="button">Laporan PDF</a>
                                </div>
                              </div>
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
                              
                              require '../vendors/autoload.php';
                              $tanggal_sekarang = date("Y-m-d ");
                              $jam_dari = "00:00:00";
                              $jam_sampai = "23:59:59";
                              //$Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'";                          
                              $query = mysqli_query($conn,"SELECT * FROM absen_siswa");
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
                                    <img src="../bar/<?= $data['nama'],$data['nis']; ?>.jpg" alt="">
                                  </td> -->
                                  <!-- <td>
                                    <a name="" id="" class="btn btn-danger" href="delAbsen.php?kode=" role="button">Hapus</a>
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

          let fln = document.getElementById('filen');
          function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('datatable-buttons');
                var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
                return dl ?
                  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                  XLSX.writeFile(wb, fn || (fln + '.' + (type || 'xlsx')));
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