var siswaShow =  () =>{
  $("#riwayat").load("absen_show.php");
}
var siswaFilter = () =>{
  $("#faisalcum").load("show_siswa_f.php");
}
setInterval(siswaShow,500);
setInterval(siswaFilter,100);