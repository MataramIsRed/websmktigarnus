<?php
include "../connn.php";
if(isset($_POST['ekspor'])){
  if($_POST['extype'] == "Excel"){
    echo "
    <html>
    <head></head>
    <body>
    <table id='datatable-buttons' class='table table-striped table-bordered' style='width:100%'>
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
                              <tbody>";
                              date_default_timezone_set('Asia/Jakarta');
                              require '../vendors/autoload.php';
                              $tanggal_sekarang = date("Y-m-d ");
                              $jam_dari = "00:00:00";
                              $jam_sampai = "23:59:59";
                              //$Qcek_tanggal =  "SELECT * FROM absen_siswa WHERE tanggal BETWEEN '". $tanggal_sekarang . $jam_dari ."' AND '". $tanggal_sekarang . $jam_sampai ."'";                          
                              $query = mysqli_query($conn,"SELECT * FROM absen_siswa");
                              $no=1;
                              while($data = mysqli_fetch_array($query,MYSQLI_BOTH)){
                              echo "
                                <tr>
                                  <td> ".$no." </td>
                                  <td>  ".$data['nis']." </td>
                                  <td>  ".$data['nama']." </td>
                                  <td>  ".$data['kelas']." </td>
                                  <td>  ".$data['jurusan']." </td>
                                  <td>  ".$data['tanggal']." </td>
                                  <td>  ".$data['jam']." </td>
                                </tr>
                                
                                
                              ";
                               $no++;
                              }
                                echo "}?>
                              </tbody>
                              
                            </table>
    </body>

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
           var wb = XLSX.utils.table_to_book(elt, { sheet: 'sheet1' });
           return dl ?
             XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
             XLSX.writeFile(wb, fn || ('Absen ' + formattedToday + '.' + (type || 'xlsx')));
        }
    
        </script>
    ExportToExcel('xslx');
    </html>";
    header("Location: riwayatAbsen.php");
  }else{
    echo "";
  }
}
?>