<?php
include "../connn.php";
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
                                  
                                  <td> ".$no."</td>
                                  <td> ".$data['nis']."</td>
                                  <td> ".$data['nama']."</td>
                                  <td> ".$data['kelas']."</td>
                                  <td> ".$data['jurusan']."</td>
                                  <td> ".$data['tanggal']."</td>
                                  <td> ".$data['jam']."</td>
                                </tr>
                                ";
                                $no++;
                              }?>