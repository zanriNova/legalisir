<?php 
// session_start();
// if (isset($_SESSION['SES_USER'])=="") {
// 	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// } else
{
	include "koneksi.php";
	if (! $_GET['Gid_permohonan']=="") {

		$sql_hapus = "DELETE FROM tb_permohonan WHERE id_permohonan='".$_GET['Gid_permohonan']."'";
		$query_hapus = mysql_query($sql_hapus) or die (mysql_error());

		if ($query_hapus) {
			echo"<script>alert('Hapus data berhasil !')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=data_permohonan'>";
		}
	}
}
?>