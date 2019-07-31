<form name="" action="" method="post" >
	<select name="laporan">
		<option value="spdp">Penerimaan SPDP</option>
		<option value="prapenuntutan">Prapenuntutan</option>
		<option value="penuntutan">Penuntutan</option>
		<option value="pelimpahan">Pelimpahan</option>
		<option value="eksekusi">Eksekusi</option>
	</select>
	<input name="btcek" type="submit" value="CEK" />
</form>
<?php	
if ($_POST['btcek'] == "CEK") 
{ 
	if($_POST['laporan']=="spdp")
	{ 
		echo "<meta http-equiv='refresh' content='0; url=?page_lap=lap_penerimaan_spdp&lap=1'>";
	}
	if($_POST['laporan']=="prapenuntutan")
	{ 
		echo "<meta http-equiv='refresh' content='0; url=?page_lap=lap_prapenuntutan&lap=1'>";
	}
	if($_POST['laporan']=="penuntutan")
	{ 
		echo "<meta http-equiv='refresh' content='0; url=?page_lap=lap_penuntutan&lap=1'>";
	}
	if($_POST['laporan']=="pelimpahan")
	{ 
		echo "<meta http-equiv='refresh' content='0; url=?page_lap=lap_pelimpahan&lap=1'>";
	}
	if($_POST['laporan']=="eksekusi")
	{ 
		echo "<meta http-equiv='refresh' content='0; url=?page_lap=lap_eksekusi&lap=1'>";
	}
}