<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
// }
// else
{
	include "koneksi.php";
	?>

	<style type="text/css">
	caption {font-size:x-large}
	</style>
		<?php 
	if($_GET['lap']=='1'){
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data Jenis Nota </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		?>
			<h1 align="center" style="font-family:Franklin Gothic Bold">Nota </h1>
		<?php 
		if ($_SESSION['SES_LEVEL']=='alumni') {}else{
			?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data Jenis Nota </h1>
			<p>
				<!-- <a  class="btn btn-success" href="?page=tambah_nota" role="button">Tambah</a> -->
			</p>
			<?php
		}
	}
	if ($_SESSION['SES_LEVEL']=='alumni'){}else{
		?>
		<div align="right">
		<form name="frmCari" method="post" action="">
			<input name="txtCari" type="text" size="30" maxlength="50" />
			<input name="btnCari" type="submit" value="Cari" />
		</form>
	</div>
	<br>
	<table border="" cellspacing="1" cellpadding="1" width="100%">
		<tr class="header">
			<td>NO</td>
			<td>ID NOTA	</td>
			<td>Nama Nota	</td>
			<td>Jumlah Copy</td>
			<td>Biaya</td>
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
		if ($_POST['btnCari'] == "Cari") {
		// echo "<script>window.location.href='?page=tab_eksekusi&carinota'</script>";
			$sql = mysql_query("SELECT * FROM tb_jns_nota
				WHERE id_nota LIKE '%".$_POST['txtCari']."%' 
				OR nm_nota LIKE '%".$_POST['txtCari']."%'
				ORDER BY id_nota ") or die (mysql_error());
		} else {
			$sql = mysql_query ("SELECT * FROM tb_jns_nota
				ORDER BY id_nota LIMIT $posisi , $batas ") or die (mysql_error());
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $isi['id_nota'];?></td>
				<td><?php echo $isi['nm_nota'];?></td>
				<td><?php echo $isi['jml_copy'];?></td>
				<td><?php echo $isi['biaya'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='220'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_nota.php?Gid_nota=<?php echo $isi['id_nota']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						?>
						<a href="?page=detail_nota&Gid_nota=<?php echo $isi['id_nota']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> |
						<a href="?page=ubah_nota&Gid_nota=<?php echo $isi['id_nota']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah </a>| 
						<a href="?page=hapus_nota&Gid_nota=<?php echo $isi['id_nota']; ?>"
							onclick="return confirm('Yakin menghapus data ini ?');"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a>
						</td>
						<?php 
					}
					?>
				</tr>
				<?php
				$no++;
			}
			$sql2 = mysql_query ("SELECT * FROM tb_jns_nota") or die (mysql_error());
			$jumlahdata = mysql_num_rows ($sql2);
			?>
		</table>
		<br>
		<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
		<?php
		$jmlhal = ceil ($jumlahdata/$batas);
		$url = "?page=data_nota";
		
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
}
	