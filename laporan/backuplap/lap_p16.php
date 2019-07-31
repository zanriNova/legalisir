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

<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data P-16 </h1>
<p>
<?php include 'lap_menu.php';?>
<a href="preview_spdp.php"><img src="dist/img/print.jpg" width="40"> PREVIEW</a>
</p>
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
        <td>Nomor P-16</td>
      	<td>Nama Tersangka</td>
      	<td>Alamat</td>
        <td>Pekerjaan</td>
        <td>Nama Jaksa</td>
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
		$sql = mysql_query("SELECT p.*,i.nm_tersangka,i.alamat,i.pekerjaan, j.nm_jaksa FROM tb_p16 p LEFT JOIN tb_identitas i
			ON(p.id_identitas=i.id_identitas) LEFT JOIN tb_jaksa j ON(p.id_jaksa=j.id_jaksa) WHERE
      id_p16 LIKE '%".$_POST['txtCari']."%' 
      ORDER BY id_p16 ") or die (mysql_error());
	} else {
		$sql = mysql_query ("SELECT p.*,i.nm_tersangka,i.alamat,i.pekerjaan, j.nm_jaksa FROM tb_p16 p LEFT JOIN tb_identitas i
			ON(p.id_identitas=i.id_identitas) LEFT JOIN tb_jaksa j ON(p.id_jaksa=j.id_jaksa)
			ORDER BY id_p16 LIMIT $posisi , $batas ") or die (mysql_error());
	}
	$no=$posisi+1;
	while ($isi = mysql_fetch_array($sql)) {
?>
	     <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $isi['id_p16'];?></td>
      		<td><?php echo $isi['nm_tersangka'];?></td>
      		<td><?php echo $isi['alamat'];?></td>
            <td><?php echo $isi['pekerjaan'];?></td>
            <td><?php echo $isi['nm_jaksa'];?></td>
			<td>
				<a href="?page=preview_p16&Gid_p16=<?php echo $isi['id_p16']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>PREVIEW </a>
       </td>
		</tr>

	<?php
	$no++;
	}
	$sql2 = mysql_query ("SELECT * FROM tb_p16") or die (mysql_error());
	$jumlahdata = mysql_num_rows ($sql2);
	?>
</table>
<br>
<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
<?php
	$jmlhal = ceil ($jumlahdata/$batas);
	$url = "?page=data_p16";
	
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