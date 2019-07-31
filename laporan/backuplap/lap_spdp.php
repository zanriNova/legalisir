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

<h1 align="center" style="font-family:Franklin Gothic Bold"> Laporan Data SPDP </h1>
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
        <td>Nomor SPDP</td>
      	<td>Nama Tersangka</td>
      	<td>Tanggal SPDP</td>
        <td width="100">Aksi</td>
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
		$sql = mysql_query("SELECT * FROM tb_spdp p LEFT JOIN tb_identitas i 
			ON(p.id_identitas=i.id_identitas)  WHERE
      id_spdp LIKE '%".$_POST['txtCari']."%' 
      ORDER BY id_spdp ") or die (mysql_error());
	} else {
		$sql = mysql_query ("SELECT p.*,i.nm_tersangka FROM tb_spdp p LEFT JOIN tb_identitas i 
			ON(p.id_identitas=i.id_identitas)  ORDER BY id_spdp LIMIT $posisi , $batas ") or die (mysql_error());
	}
	$no=$posisi+1;
	while ($isi = mysql_fetch_array($sql)) {
?>
	  <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $isi['id_spdp'];?></td>
      	<td><?php echo $isi['nm_tersangka'];?></td>
      	<td><?php echo $isi['tgl_spdp'];?></td>
      	<td><a href=""><i class="fa fa-print" aria-hidden="true"></i> CETAK</a></td>
		</tr>

	<?php
	$no++;
	}
	$sql2 = mysql_query ("SELECT * FROM tb_spdp") or die (mysql_error());
	$jumlahdata = mysql_num_rows ($sql2);
	?>
</table>
<br>
<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>
<?php
	$jmlhal = ceil ($jumlahdata/$batas);
	$url = "?page=data_spdp";
	
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