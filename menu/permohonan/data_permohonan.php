<?php
session_start();
if (isset($_SESSION['SES_USER'])=="")
{
	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
}
else
{
	include "koneksi.php";
	$QQ ="SELECT p.*,a.* FROM tb_alumni a LEFT JOIN tb_permohonan p ON(p.nim_alumni=a.nim_alumni)";
	?>

	<style type="text/css">
	caption {font-size:x-large}
	</style>
	<?php 
	if($_GET['lap']=='1'){
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data Permohonan </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data Permohonan </h1>
		<p>
			<?php 
			if (($_SESSION["SES_LEVEL"]!='alumni')) {
			}else{
				?>
				<a  class="btn btn-success" href="?page=tambah_permohonan" role="button">Tambah</a>
				<?php
			}
			?>
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
	if ($_SESSION["SES_LEVEL"]!='alumni') {
		?>
		<!-- Tampilkan Status Data :  -->
		<!-- <select id="status">
			<option value="">-Pilih-</option>
			<option value="Proses">Proses</option>
			<option value="Selesai">Selesai</option>
		</select> -->
		<a href="?page=data_permohonan&status=Proses" class="btn btn-default">Proses</a>
		<a href="?page=data_permohonan&status=Selesai" class="btn btn-default">Selesai</a>
		<script type="text/javascript">
		$(document).ready(function(){
			// $('#status').on('change', function(){
			// 	var value = $(this).val();
			// 	location.href='?page=data_permohonan&status='+value;
			// });
		});
		</script>
		<?php
	}
	?>
	<br><br>
	<table border="" cellspacing="1" cellpadding="1" width="100%" class="putih">
		<tr class="header">
			<td>No</td>
			<td>ID Permohonan</td>
			<td>NIM Alumni</td>
			<td>Hal</td>
			<td>Tanggal</td>
			<td>Status</td>
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
		if ($_SESSION["SES_LEVEL"]=='alumni') {
			$q = $QQ." WHERE a.nim_alumni IN(Select c.nim_alumni from tb_alumni c Where c.nim_alumni = '".$_SESSION['SES_USER']."')
			AND p.nim_alumni is not null";
			if ($_POST['btnCari'] == "Cari") {
		// echo "<script>window.location.href='?page=tab_eksekusi&caripermohonan'</script>";
				$sql = mysql_query($q." AND ( p.id_permohonan LIKE '%".$_POST['txtCari']."%' 
					OR a.nim_alumni LIKE '%".$_POST['txtCari']."%'
					ORDER BY p.id_permohonan ") or die (mysql_error());
			} else {
				$sql = mysql_query ($q." ORDER BY p.id_permohonan DESC LIMIT $posisi , $batas ") or die (mysql_error());
			}
		}else{
			$q = $QQ." WHERE p.nim_alumni is not null";
			if ($_POST['btnCari'] == "Cari") {
				$sql = mysql_query($q." AND ( p.id_permohonan LIKE '%".$_POST['txtCari']."%' 
					OR a.nim_alumni LIKE '%".$_POST['txtCari']."%' ORDER BY p.id_permohonan ") or die (mysql_error());
			} else {
				$status = $_GET['status']=="" ? " AND p.status='Proses'" : " AND p.status='".$_GET['status']."'";
				// $status = " AND p.status='".$_GET['status']."'";
				$sql = mysql_query ($q.$status." ORDER BY p.id_permohonan DESC LIMIT $posisi , $batas ") or die (mysql_error());
			}
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr class="datas">
				<td><?php echo $no; ?></td>
				<td><?php echo $isi['id_permohonan'];?></td>
				<td><?php echo $isi['nim_alumni'];?></td>
				<td><?php echo $isi['hal']=="ijazah" ? "Ijazah" : "Surat Keterangan Lulus";?></td>
				<td><?php echo $isi['tgl_permohonan'];?></td>
				<td><?php echo $isi['status'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='220'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_permohonan.php?Gid_permohonan=<?php echo $isi['id_permohonan']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						?>
						<a href="?page=detail_permohonan&Gid_permohonan=<?php echo $isi['id_permohonan']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> |
						<?php 
						if($isi['status']=='Selesai'){
						}else{
							?>
							<a href="?page=ubah_permohonan&Gid_permohonan=<?php echo $isi['id_permohonan']."&hal=".$isi['hal'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah </a>| 
							<?php 
						}
						?>
						<a href="?page=hapus_permohonan&Gid_permohonan=<?php echo $isi['id_permohonan']; ?>" onclick="return confirm('Yakin menghapus data ini ?');"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a>
					</td>
					<?php 
				}
				?>
			</tr>
			<?php
			$no++;
			}
			if ($_SESSION['SES_USER']=='admin'||$_SESSION['SES_LEVEL']=='petugas') {
				$sql2 = mysql_query ($QQ." WHERE p.status = '".$_GET['status']."' AND p.nim_alumni is not null") or die (mysql_error());
				
			}else{
				$sql2 = mysql_query ($QQ." WHERE a.nim_alumni IN(Select c.nim_alumni from tb_alumni c Where c.nim_alumni = '".$_SESSION['SES_USER']."')
					AND p.nim_alumni is not null") or die (mysql_error());
			}
			$jumlahdata = mysql_num_rows ($sql2);
			?>
		</table>
		<br>
		<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
		<?php
		$jmlhal = ceil ($jumlahdata/$batas);
		$url = "?page=data_permohonan";
		
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