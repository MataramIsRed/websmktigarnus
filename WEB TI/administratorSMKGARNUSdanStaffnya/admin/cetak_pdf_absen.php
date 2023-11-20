

<?php
require('../vendors/FPDF/fpdf.php');
include "../connn.php";
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="'.$namafile.'"');
$nis = $_GET['nis'];
$pdf = new FPDF();
$pdf->AddPage();
$row= $conn ->query("SELECT * FROM absen_siswa");
$pdf->SetFont('Arial','B',12);	
$pdf->Image('../foto/Logo.png',15,5,20,20);
$pdf->SetFont('Arial','B',21);
$pdf->Cell(0,7,strtoupper("SMK TI GARUDA NUSANTARA"),0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,"Jl.Sangkuriang".', Telp ',0,1,'C');
$pdf->Cell(0,7,"www.ti.com",0,1,'C');

$pdf->SetLineWidth(1);
    $pdf->Line(10,31,206,31);
    $pdf->SetLineWidth(0);
    $pdf->Line(10,32,206,32);

    $sql="select * from absen_siswa where nis=$nis";
    $hasil=mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($hasil); 

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,6,'NIS ',0,0);
    $pdf->Cell(31,6,': '.$data['nis'],0,1);
    $pdf->Cell(30,6,'Nama ',0,0);
    $pdf->Cell(31,6,': '.$data['nama'],0,1);
    $pdf->Cell(30,6,'Kelas ',0,0);
    $pdf->Cell(31,6,': '.$data['kelas'],0,1);
    $pdf->Cell(30,6,'Jurusan ',0,0);
    $pdf->Cell(31,6,': '.$data['jurusan'],0,1);

    
    $pdf->Cell(10,3,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,'No',1,0,'C');
    $pdf->Cell(50,6,'Tanggal',1,0,'C');
    $pdf->Cell(47,6,'Waktu',1,0,'C');
    $pdf->Cell(48,6,'Keterangan',1,1,'C');
    $pdf->SetFont('Arial','',10);

    $no= 0;

    $sql="SELECT * FROM absen_siswa WHERE nis='".$nis."'";
    $hasil=mysqli_query($conn,$sql);

    while ($data = mysqli_fetch_assoc($hasil)){
    $ket = $data['keterangan'];
    $waktu = date("h:i", strtotime($data['jam']));
    $tgl = date("d", strtotime($data['tanggal']));
    $bulan = date("m", strtotime($data['tanggal']));
    $tahun = date("Y", strtotime($data['tanggal']));
    
    $no++;
    $pdf->Cell(10,6,$no,1,0,'C');
    $pdf->Cell(50,6,$tgl.'/'.$bulan.'/'.$tahun.'',1,0,'C');
    $pdf->Cell(47,6,$waktu,1,0,'C');
    $pdf->Cell(48,6,$ket,1,0,'C');
    }

    
    $tanggal=date('Y-m-d');
    
    $kueri="select nama from data_siswa where nis=$nis";
    $hasilsql=mysqli_query($conn,$kueri);
    $hasilnama = mysqli_fetch_array($hasilsql); 
    $nama= $hasilnama['nama'];
    $namafile = 'Absensi-'.$nama.'-'.date('YmdHis').'.pdf';
    $pdf->Output('../laporan/'.$namafile, 'F');
    readfile('../laporan/'.$namafile);
?>