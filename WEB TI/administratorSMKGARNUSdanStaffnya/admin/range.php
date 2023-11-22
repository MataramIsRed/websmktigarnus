<?php
include "../connn.php";
	if(ISSET($_GET['jurusan'])){
		$query=mysqli_query($conn, "SELECT * FROM `absen_siswa` WHERE jurusan='".$_GET['jurusan']."'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		$no=1;
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td><?php echo $fetch['nis']?></td>
                            <td><?php echo $fetch['nama']?></td>
                            <td><?php echo $fetch['kelas']?></td>
                            <td><?php echo $fetch['jurusan']?></td>
                            <td>
                            <a href="cetak_pdf_absen.php?nis=<?php echo $fetch['nis'];?>" id_mahasiswa="<?php echo $data['nis']; ?>" id_absensi="<?php echo $data['id_absensi']; ?>" class="absensi btn btn-success btn-circle" ><i class="fa fa-clock-o"></i> Absensi</a>
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
            <tr>
                            <td> <?php echo $no ?> </td>
                            <td><?php echo $fetch['nis']?></td>
                            <td><?php echo $fetch['nama']?></td>
                            <td><?php echo $fetch['kelas']?></td>
                            <td><?php echo $fetch['jurusan']?></td>
                            <td>
                            <a href="cetak_pdf_absen.php?nis=<?php echo $fetch['nis'];?>" id_mahasiswa="<?php echo $data['nis']; ?>" id_absensi="<?php echo $data['id_absensi']; ?>" class="absensi btn btn-success btn-circle" ><i class="fa fa-clock-o"></i> Absensi</a>
                            </td>
		<?php $no++;
        }
    }
?>




