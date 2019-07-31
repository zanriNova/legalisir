<?php
session_start();
if (isset($_SESSION['SES_USER'])=="")
{
	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
}
else
{
	include "koneksi.php";
	?>
	<style type="text/css">
	caption {font-size:x-large}
	</style>
		<?php 
	if($_GET['lap']=='1'){
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data User </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data User </h1>
		<p>
			<a  class="btn btn-success" href="?page=tambah_user&lv=1" role="button">Tambah</a>
		</p>
	<?php 
	}
	 ?>
	<div align="right">
		<form name="frmCari" method="post" action="">
			<input name="txtCari" type="text" size="30" maxlength="50" />
			<input name="btnCari" type="submit" value="Cari" />
		</form>
	</div>
	<?php 
	if ($_SESSION['SES_USER']=='admin') {
		?>
		Tampilkan User Data : 
		<select id="status">
			<option value="">-Pilih-</option>
			<option value="alumni">Alumni</option>
			<option value="petugas">Petugas</option>
		</select>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#status').on('change', function(){
				var value = $(this).val();
				location.href='?page=data_user&level='+value;
			});
		});
		</script>
		<?php
	}
	?>
	<br><br>
	<table border="" cellspacing="1" cellpadding="1" width="100%">
		<tr class="header">
			<td>No</td>
			<td><?php echo $_GET['level']=='petugas' ? 'NIP':'NIM'; ?></td>
			<td ><?php echo $_GET['level']=='petugas' ? 'Nama Pegawai':'Nama Alumni'?></td>
			<td>Status</td>
			<td>Telepon</td>
			<td>Aksi</td>
		</tr>
		
		<?php
		$batas = 10;
		$hal = $_GET[hal];
		if (empty($hal)) {
			$posisi = 0;
			$hal = 1;
		}
		else {
			$posisi = ($hal-1) * $batas;
		}
		if ($_GET['level']=='petugas') {
			$q1 = "SELECT u.*, p.* From tb_user u LEFT join tb_petugas p ON(u.username=p.id_petugas)
			Where u.username !='admin' AND id_petugas is not null";
			if ($_POST['btnCari'] == "Cari") {
				$sql = mysql_query($q1." AND (id_petugas LIKE '%".$_POST['txtCari']."%' OR nm_alumni LIKE '%".$_POST['txtCari']."%')
					ORDER BY id_petugas DESC") or die (mysql_error());
			} else {
				$sql = mysql_query ($q1." ORDER BY id_petugas desc LIMIT $posisi , $batas ") or die (mysql_error());
			}
		}else{
			$q2 = "SELECT u.*, a.* From tb_user u LEFT join tb_alumni a ON(u.username=a.nim_alumni)
			Where u.username !='admin' AND a.nim_alumni is not null";
			if ($_POST['btnCari'] == "Cari") {
		// echo "<script>window.location.href='?page=tab_eksekusi&cariuser'</script>";
				$sql = mysql_query($q2." AND (nim_alumni LIKE '%".$_POST['txtCari']."%' OR nm_alumni LIKE '%".$_POST['txtCari']."%')
					ORDER BY nim_alumni DESC") or die (mysql_error());
			} else {
				$sql = mysql_query ($q2." ORDER BY nim_alumni desc LIMIT $posisi , $batas ") or die (mysql_error());
			}
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr class="datas">
				<td><?php echo $no; ?></td>
					<td><?php echo $isi['username'];?></td>
				<?php 
				if ($_GET['level']=='petugas') {
					?>
					<td><?php echo $isi['nm_petugas'];?></td>
					<?php 
				}else { 
					?>
					<td><?php echo $isi['nm_alumni'];?></td>
					<?php 
				} 
				?>
					<td><?php echo $isi['status'];?></td>
					<td><?php echo $isi['no_telp'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='150'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_user.php?Gnim_alumni=<?php echo $isi['nim_alumni']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						$level = $_GET['level'];
						?>
						<!-- <a href="?page=detail_user&Gusername=<?php ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> | -->
						<a href="?page=ubah_user&Gusername=<?php echo $isi['username'].'&level='.$level; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a>| 
						<a href="?page=hapus_user&Gusername=<?php echo $isi['username'].'&level='.$level; ?>"
							onclick="return confirm('Yakin menghapus data ini ?');"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a>
						</td>
						<?php 
					}
					?>
				</tr>

				<?php
				$no++;
			}
			$q1 = "SELECT u.*, p.* From tb_user u LEFT join tb_petugas p ON(u.username=p.id_petugas)
			Where u.username !='admin' AND id_petugas is not null";
			$q2 = "SELECT u.*, a.* From tb_user u LEFT join tb_alumni a ON(u.username=a.nim_alumni)
			Where u.username !='admin' AND a.nim_alumni is not null";
			if ($_GET['level']=='petugas') {
				$sql2 = mysql_query ($q1) or die (mysql_error());
			}else{
				$sql2 = mysql_query ($q2) or die (mysql_error());
			}
			$jumlahdata = mysql_num_rows ($sql2);
			?>
		</table>
		<br>
		<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
		<?php
		$jmlhal = ceil ($jumlahdata/$batas);
		$url = "?page=data_user";
		
		echo"<center>";
		if ($hal>1) {
			$previous=$hal-1;
			echo "<< <a href=$url&hal=1>First</a> | < <a href=$url&hal=$previous>Prev</a> | ";
		}
		else {
			echo "<< First | < Prev |";
		}
		
		if ($hal <$jmlhal) {
			$next = $hal+1;
			echo "| <a href=$url&hal=$next> Next</a> > | <a href=$url&hal=$jmlhal>Last</a> >>";
		}
		else {
			echo " Next > | Last >>";
		}
		echo "</center>";
		?>
		<br />
		<?php
	}
	?>