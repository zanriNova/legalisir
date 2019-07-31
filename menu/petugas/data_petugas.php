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
	tr.header {font-weight:bold; text-align:center; background:#04B40D; font-family:sans-serif; font-size:16px}
	caption {font-size:x-large}
	</style>
		<?php 
	if($_GET['lap']=='1'){
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data P-48 </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data P-48 </h1>
		<p>
			<a  class="btn btn-success" href="?page=tambah_p48" role="button">Tambah</a>
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
	<br>
	<table border="" cellspacing="1" cellpadding="1" width="100%">
		<tr class="header">
			<td>No</td>
			<td>Nomor P-48</td>
			<td>Nama Tersangka</td>
			<td>Tanggal Penetapan Hukum</td>
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
		// echo "<script>window.location.href='?page=tab_eksekusi&carip48'</script>";
			$sql = mysql_query("SELECT p.*,i.nm_tersangka,j.* FROM tb_p48 p LEFT JOIN tb_identitas i 
				ON(p.id_identitas=i.id_identitas) LEFT join tb_jaksa j ON(j.id_jaksa=p.id_jaksa)
				WHERE id_p48 LIKE '%".$_POST['txtCari']."%' 
				OR nm_tersangka LIKE '%".$_POST['txtCari']."%'
				OR tgl_hukum LIKE '%".$_POST['txtCari']."%'
				ORDER BY id_p48 ") or die (mysql_error());
		} else {
			$sql = mysql_query ("SELECT p.*,i.nm_tersangka,j.* FROM tb_p48 p LEFT JOIN tb_identitas i 
				ON(p.id_identitas=i.id_identitas) LEFT join tb_jaksa j ON(j.id_jaksa=p.id_jaksa)
				ORDER BY id_p48 LIMIT $posisi , $batas ") or die (mysql_error());
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr class="datas">
				<td><?php echo $no; ?></td>
				<td><?php echo $isi['id_p48'];?></td>
				<td><?php echo $isi['nm_tersangka'];?></td>
				<td><?php echo $isi['tgl_hukum'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='220'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_p48.php?Gid_p48=<?php echo $isi['id_p48']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						?>
						<a href="?page=detail_p48&Gid_p48=<?php echo $isi['id_p48']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> |
						<a href="?page=ubah_p48&Gid_p48=<?php echo $isi['id_p48']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah </a>| 
						<a href="?page=hapus_p48&Gid_p48=<?php echo $isi['id_p48']; ?>"
							onclick="return confirm('Yakin menghapus data ini ?');"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a>
						</td>
						<?php 
					}
					?>
				</tr>

				<?php
				$no++;
			}
			$sql2 = mysql_query ("SELECT * FROM tb_p48") or die (mysql_error());
			$jumlahdata = mysql_num_rows ($sql2);
			?>
		</table>
		<br>
		<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
		<?php
		$jmlhal = ceil ($jumlahdata/$batas);
		$url = "?page=data_p48";
		
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