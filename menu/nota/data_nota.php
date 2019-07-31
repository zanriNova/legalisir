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
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data Nota </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		if ($_SESSION['SES_LEVEL']=='alumni') {}else{
			?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data Nota </h1>
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
			<!-- <td>NO</td> -->
			<td>ID NOTA	</td>
			<td>ID Pemohon	</td>
			<td>Nama Alumni</td>
			<td>Hal</td>
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
			$sql = mysql_query("SELECT * FROM tb_nota  n left JOin tb_permohonan p 
				ON(n.id_permohonan=p.id_permohonan)
			 left join tb_alumni a ON(p.nim_alumni=a.nim_alumni) 
				WHERE biaya>0 AND (
				id_nota LIKE '%".$_POST['txtCari']."%' 
				OR id_permohonan LIKE '%".$_POST['txtCari']."%' )
				ORDER BY id_nota ") or die (mysql_error());
		} else {
			$sql = mysql_query ("SELECT * FROM tb_nota n left JOin tb_permohonan p
			 ON(n.id_permohonan=p.id_permohonan)
			 left join tb_alumni  a ON(p.nim_alumni=a.nim_alumni) WHERE biaya>0
				ORDER BY id_nota DESC LIMIT $posisi , $batas ") or die (mysql_error());
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr class="datas">
				<!-- <td><?php $no; ?></td> -->
				<td><?php echo $isi['id_nota'];?></td>
				<td><?php echo $isi['id_permohonan'];?></td>
				<td><?php echo $isi['nm_alumni'];?></td>
				<td><?php echo $isi['hal'];?></td>
				<td><?php echo $isi['jml_copy'];?></td>
				<td><?php echo $isi['biaya'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='150'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_nota.php?Gid_nota=<?php echo $isi['id_nota']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						?>
						<a href="?page=detail_nota&hal=<?php echo $isi["hal"] ?>&permohonan=<?php echo $isi["id_permohonan"]."&nota=1" ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> |
						<!-- <a href="?page=ubah_nota&Gid_nota=<?php  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah </a>|  -->
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
			$sql2 = mysql_query ("SELECT * FROM tb_nota n left JOin tb_permohonan p
			 ON(n.id_permohonan=p.id_permohonan)
			 left join tb_alumni a ON(p.nim_alumni=a.nim_alumni) WHERE biaya>0")or die (mysql_error());
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
	