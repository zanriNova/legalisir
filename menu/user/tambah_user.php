<?php
session_start();
if (isset($_SESSION['SES_USER'])=="")
{
	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
else 
{ 
	include 'koneksi.php';
	if ($_SESSION["SES_LEVEL"]=='petugas') {
		?>
		<div class='line'>
			<div class='content1'>Tambah Data : 
				<select id="status">
					<option value="">-Pilih-</option>
					<option value="0">Alumni</option>
					<option value="1">Petugas</option>
				</select>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#status').on('change', function(){
				var value = $(this).val();
				location.href='?page=tambah_user&lv='+value;
			});
		});
		</script>
		<?php
	}
	include 'registrasi.php';
}