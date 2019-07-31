<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
// }
// else
{
	include "koneksi.php";
	if($_GET['lap']=='1'){
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data Pengumuman </h1>
		<p>
			<?php include 'laporan/lap_menu.php';?>
			<!-- <a href="laporan/preview/preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a> -->
		</p>
		<?php
	}else{
		?>
		<h1 align="center" style="font-family:Franklin Gothic Bold"> Data Pengumuman </h1>
		<p>
			<!-- <a  class="btn btn-success" href="?page=tambah_pengumuman" role="button">Tambah</a> -->
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
	<table border="" cellspacing="1" cellpadding="1" width="100%" class="putih">
		<tr class="header">
			<td>No</td>
			<td>Dari</td>
			<td>Nomor Pengumuman</td>
			<td>Nama Alumni</td>
			<td>Verifikasi Legalisir </td>
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
			if ($_POST['btnCari'] == "Cari") {
		// echo "<script>window.location.href='?page=tab_eksekusi&caripengumuman'</script>";
				$sql = mysql_query("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
					WHERE i.nim_alumni='".$_SESSION['SES_USER']."' AND id_pengumuman LIKE '%".$_POST['txtCari']."%' 
					ORDER BY id_pengumuman ") or die (mysql_error());
			} else {
				$sql = mysql_query ("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
					WHERE i.nim_alumni='".$_SESSION['SES_USER']."' 
					ORDER BY id_pengumuman LIMIT $posisi , $batas") or die (mysql_error());
			}
		}else{
			if ($_POST['btnCari'] == "Cari") {
			// echo "<script>window.location.href='?page=tab_eksekusi&caripengumuman'</script>";
				$sql = mysql_query("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
					WHERE id_pengumuman LIKE '%".$_POST['txtCari']."%' 
					ORDER BY id_pengumuman ") or die (mysql_error());
			} else {
				$sql = mysql_query ("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
					ORDER BY id_pengumuman LIMIT $posisi , $batas") or die (mysql_error());
			}
		}
		$no=$posisi+1;
		while ($isi = mysql_fetch_array($sql)) {
			?>
			<tr class="datas">
				<td><?php echo $no; ?></td>
				<td>
					<?php 
					$sql_cek = mysql_query ("SELECT p.nm_petugas FROM tb_nota n LEFT JOIN tb_petugas p 
						ON(n.id_petugas=p.id_petugas) WHERE id_nota='".$isi["id_nota"]."'") or die (mysql_error());
					$hasilCek = mysql_fetch_array($sql_cek);
					echo $hasilCek['nm_petugas']==""? "Admin":$hasilCek['nm_petugas'];
					?>
				</td>
				<td><?php echo $isi['id_pengumuman'];?></td>
				<td><?php echo $isi['nim_alumni'];?></td>
				<td><?php echo $isi['verifikasi_legalisir'];?></td>
				<td  <?php echo $_GET['lap']=='1' ? "width='100'":"width='150'"; ?>>
					<?php
					if($_GET['lap']=='1'){
						?>
						<a href="laporan/preview/preview_pengumuman.php?Gid_pengumuman=<?php echo $isi['id_pengumuman']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> CETAK</a>
						<?php
					}else{
						?>
						<a href="?page=detail_pengumuman&Gid_pengumuman=<?php echo $isi['id_pengumuman']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Detail </a> |
						<a href="?page=hapus_pengumuman&Gid_pengumuman=<?php echo $isi['id_pengumuman']; ?>"
							onclick="return confirm('Yakin menghapus data ini ?');"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a>
						</td>
						<?php 
					}
					?>
				</tr>

				<?php
				$no++;
			}
			if ($_SESSION['SES_LEVEL']=='alumni') {
				$sql2 = mysql_query ("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
					WHERE i.nim_alumni='".$_SESSION['SES_USER']."'") or die (mysql_error());
				
			}else{
				$sql2 = mysql_query ("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
					ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)") or die (mysql_error());
			}
			$jumlahdata = mysql_num_rows ($sql2);
			?>
		</table>
		<br>
		<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
		<?php
		$jmlhal = ceil ($jumlahdata/$batas);
		$url = "?page=data_pengumuman";
		
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