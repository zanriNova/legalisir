 <?php
	{
		include "koneksi.php";
		echo $_SESSION['SES_USER'];
?>
<style type="text/css">
	tr.header {font-weight:bold; text-align:center; background:#04B40D; font-family:sans-serif; font-size:16px}
	caption {font-size:x-large}
</style>
<table border="0" cellspacing="1" cellpadding="1" width="550" align="center">
    <tr>
      <td width="18%" rowspan="5"><img src="../dist/img/Logo_Kejaksaan.png" width="127" height="113"></td>
      <td width="82%" colspan="5" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="82%" colspan="5" align="center" style="font-size:20px">
      		<strong>KEJAKSAAN NEGERI KUDUS</strong></td>
    </tr>
    
    <tr>
    	<td width="82%" colspan="5" align="center" style="font-size:14px">
        	Jalan Jendral Sudirman No.41</td>
    </tr>
    
    <tr>
    	<td width="82%" colspan="5" align="center" style="font-size:18px">
        	<strong>LAPORAN DATA BP</strong></td>
   </tr>
   <tr>
   		<td width="82%" colspan="5" align="center">&nbsp;</td>
   </tr>
</table>
<br>
<table border="" cellspacing="1" cellpadding="1" width="100%">
	<tr class="header">
    	<td>No</td>
        <td>Nomor BP</td>
        <td>Nama Tersangka</td>
        <td>Tanggal BP</td>
    </tr>
    
<?php
	$batas = 11;
	$hal = $_GET[hal];
	if (empty($hal)) {
		$posisi = 0;
		$hal = 1;
	}
	else {
		$posisi = ($hal-1) * $batas;
	}
	if ($_POST['btnCari'] == "Cari") {
		$sql = mysql_query(" select b.id_biodata, i.nm_identitas, b.id_identitas,i.almt_rmh from tb_biodata b join tb_identitas i on 			
		(b.id_identitas=i.id_identitas) where 
		id_biodata like '%".$_POST['txtCari']."%'
		or nm_identitas like '%".$_POST['txtCari']."%'
		or almt_rmh like '%".$_POST['txtCari']."%'
			ORDER BY id_biodata LIMIT $posisi, $batas") or die (mysql_error());
	} else {
		$sql = mysql_query ("select b.id_biodata, i.nm_identitas, b.id_identitas, i.almt_rmh , i.pekerjaan from tb_biodata b join tb_identitas i on (b.id_identitas=i.id_identitas) LIMIT $posisi,$batas") or die (mysql_error());
	}
	$no=$posisi+1;
	while ($data = mysql_fetch_array($sql)) {
?>
	     <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['id_bp']; ?></td>
			<td><?php echo $data['nm_tersangka']; ?></td>
			<td><?php echo $data['tgl_bp']; ?></td>
		</tr>

	<?php
	$no++;
	}
	$sql2 = mysql_query ("select b.id_biodata, i.nm_identitas, b.id_identitas, i.almt_rmh , i.pekerjaan from tb_biodata b join tb_identitas i on (b.id_identitas=i.id_identitas)") or die (mysql_error());
	$jumlahdata = mysql_num_rows ($sql2);
	?>
</table>
<br>
<center>JUMLAH DATA : <?php echo $jumlahdata ?></center>

<?php
	}
?>