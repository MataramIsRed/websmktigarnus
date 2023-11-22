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
          <div class="modal fade" id="modelIdx" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Download File Laporan Absen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                  <form action="cetak_pdf_absentgl.php" method="GET">
                  <div class="container-fluid">
                    <input class="form-control" type="text" name="nis" placeholder="Masukan Nis Pelajar">
                    <br>
                    <label for="">Tanggal awal</label>
                    <input class="form-control" type="date" name="date0" placeholder="" value="Absen <?php echo date("Y-m-d ");?>">
                    <br>
                    <label for="">Tanggal akhir</label>
                    <input class="form-control" type="date" name="date1" placeholder="" value="Absen <?php echo date("Y-m-d ");?>">
                    <br>                                          
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="" class="btn btn-primary">Download</button>
                </div></form>
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
                            <h2>Absen Siswa</h2>
                            <button class="btn btn-success mx-3" type="button" id="triggerId" data-toggle="modal" data-target="#modelIdx" aria-haspopup="true"
                                    aria-expanded="false">
                                      Export
                                    </button>
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                      <form method="GET">
                                      <select name="jurusan" class="form-control col-md-8">
                                        <option>--Jurusan--</option>
                                        <option>RPL</option>
                                        <option>TKJ</option>
                                        <option>TJA</option>
                                        <option>AN</option>
                                        <option>MM</option>
                                        <option>OTKP</option>
                                          </select> 
                                <button class="btn btn-primary mx-1" name="search"><span class="glyphicon glyphicon-search"></span></button>
                              </form>
                              
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          
                                <table class="table table-bordered">
                                  <thead class="table-Secondary">
                                    <tr>
                                  <th>NO</th>
                                  <th>NIS</th>
                                  <th>NAMA</th>
                                  <th>KELAS</th>
                                  <th>JURUSAN</th>
                                  <th>ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php include 'range.php';?>	
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