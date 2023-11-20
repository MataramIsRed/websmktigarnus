<?php
include "../connn.php";
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM `absen_siswa` WHERE date(`tanggal`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		$no=1;
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td> <?php ".$no." ?> </td>
		<td><?php echo $fetch['nis']?></td>
		<td><?php echo $fetch['nama']?></td>
		<td><?php echo $fetch['kelas']?></td>
		<td><?php echo $fetch['jurusan']?></td>
    <td><?php echo $fetch['tanggal']?></td>
    <td><?php echo $fetch['jam']?></td>
		<td>
                                <button id_mahasiswa="<?php echo $data['nis']; ?>" id_absensi="<?php echo $data['id_absensi']; ?>" class="absensi btn btn-success btn-circle" ><i class="fa fa-clock-o"></i> Absensi</button>
                                <button id_mahasiswa="<?php echo $data['nis']; ?>" class="cetak btn btn-primary btn-circle" ><i class="fa fa-print"></i> Cetak</button>
                            </td>
														<?php $no++; ?>
	</tr>

<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `absen_siswa`") or die(mysqli_error());
		$no=1;
		while($fetch=mysqli_fetch_array($query)){
?>



<?php 
                                    

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $cari = "SELECT * FROM absen_siswa WHERE CONCAT(jurusan) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $cari);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
																								<td> <?php ".$no." ?> </td>
                                                    <td><?= $items['nis']; ?></td>
                                                    <td><?= $items['nama']; ?></td>
                                                    <td><?= $items['kelas']; ?></td>
                                                    <td><?= $items['jurusan']; ?></td>
																										<td><?= $items['tanggal']; ?></td>
																										<td><?= $items['jam']; ?></td>
																										<td>
 
    <button class="btn btn-success mx-3" type="button" id="triggerId" data-toggle="modal" data-target="#modelId" aria-haspopup="true"
                                    aria-expanded="false">
                                      
                                    <i class="fa fa-print"></i> Cetak</button>
    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>

	
<?php
		}
	}
?>



