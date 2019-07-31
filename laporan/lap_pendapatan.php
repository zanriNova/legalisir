<?php 
	// header('Content-Type:text/plain');
if (!empty($_GET['lap'])) {
	include '../koneksi.php';
	?>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<?php
}else{
	include 'koneksi.php';
}
$data = array();
$bulan =array(
	'1' => 'Januari'
	,'2' => 'Februari'
	,'3' => 'Maret'
	,'4' => 'April'
	,'5' => 'Mei'
	,'6' => 'Juni'
	,'7' => 'Juli'
	,'8' => 'Agustus'
	,'9' => 'September'
	,'10' => 'Oktober'
	,'11' => 'November'
	,'12' => 'Desember'
	);
$th = date('Y');
$tgl = $_GET['bl_th'] =='' ? date('Y-m'):$_GET['bl_th'];
$sql_p = "SELECT nim_alumni, sum(biaya) as jumlah,tgl_permohonan FROM tb_nota n left join tb_permohonan p 
on(n.id_permohonan=p.id_permohonan) Where tgl_permohonan like '$tgl%' AND biaya>0 group by nim_alumni";
$permoh = mysql_query($sql_p) or die(mysql_error());
while ($dt_p=mysql_fetch_array($permoh)) {
	$data[$dt_p['nim_alumni']] = $dt_p;
	$dt_key[]=$dt_p['nim_alumni'];
}
if (!empty($data)) {
	foreach ($data as &$key) {
		$sql_all = "SELECT p.id_permohonan,tgl_permohonan,biaya,hal FROM tb_nota n left join tb_permohonan p 
		on(n.id_permohonan=p.id_permohonan) Where tgl_permohonan like '$tgl%' AND biaya>0  and nim_alumni='".$key['nim_alumni']."'";
		$all = mysql_query($sql_all) or die(mysql_error());
		while ($dt_all=mysql_fetch_array($all)) {
			$key[$dt_all['nim_alumni']][]=$dt_all;
		}
	}
}

?>
<h2><center>PENDAPATAN PERMOHONAN</center></h2>
<br>
<?php if (empty($_GET['lap'])) { ?>
Bulan : 
<select id="bulan">
	<?php 
	$a=1;
	foreach ($bulan as $value) {
		echo '<option value="'.$a.'">'.$value.'</option>';
		$a++;
	} 
	?>
</select>
<select id="tahun">
	<?php 
	for ($i=$th; $i>2010 ; $i--) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
</select>
<div class="btn btn-default" id="cr">CARI</div>	&nbsp; 
<div class="btn btn-primary" id="ctk"><i class="fa fa-print"></i>&nbsp;PRINT</div> 
<?php } ?>
<br><br>
<table border="1" align="center" cellspacing="1" cellpadding="1" width="100%" class="putih">
	<tr class="header">
		<td>No</td>
		<td>NIM Alumni</td>
		<td>ID Permohonan</td>
		<td>Tanggal</td>
		<td>Hal (Biaya)</td>
		<td>Jumlah</td>
	</tr>
	<?php 
	$i = 1;
	if (!empty($data)) {
		foreach ($data as $value) {
			?>
			<tr class="datas">
				<td><?php echo $i; ?></td>
				<td><?php echo $value['nim_alumni']; ?></td>
				<td>
					<?php foreach ($value[''] as $k) {
						echo $k['id_permohonan']."<br>";
					} ?>
				</td>
				<td>
					<?php foreach ($value[''] as $k) {
						echo $k['tgl_permohonan']."<br>";
					} ?>
				</td>
				<td>
					<?php foreach ($value[''] as $k) {
						echo $k['hal']=='skl' ? "Surat Keterangan Lulus (Rp.".number_format($k['biaya'],2,",",".").")":$k['hal']."Rp.".number_format($k['biaya'],2,",",".").")";echo "<br>";
					} ?>
				</td>
				<td><?php echo "Rp.".number_format($value['jumlah'],2,",","."); ?></td>
			</tr>
			<?php
			$i++;
		}
	}
	?>
</table>
<?php if (empty($_GET['lap'])) { ?>
<script type="text/javascript">
	$(document).ready(function () {
		$("#cr").on('click',function () {
			var a = $("#bulan").val();
			var b = $("#tahun").val();
			if (a<10) {
				a='0'+a;
			};
			location.href='?page=lap_pendapatan&bl_th='+b+"-"+a;
		});
		$("#ctk").on('click',function () {
			 var a = window.location.search;
			window.open('laporan/lap_pendapatan.php'+a+'&lap=1');
		});
	});
</script>
<?php } ?>