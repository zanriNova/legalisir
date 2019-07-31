 <?php 
 include "koneksi.php";
 if ($_GET['Gusername']!="") {
 	$sql_hapus_al = "DELETE FROM tb_alumni WHERE nim_alumni='".$_GET['Gusername']."'";
 	$query_hapus_al = mysql_query($sql_hapus_al) or die (mysql_error());
 	if ($query_hapus_al) {
 		$sql_hapus = "DELETE FROM tb_user WHERE username='".$_GET['Gusername']."'";
 		$query_hapus = mysql_query($sql_hapus) or die (mysql_error());
 		if ($query_hapus) {
 			echo"<script>alert('Hapus data berhasil !')</script>";
 			echo "<meta http-equiv='refresh' content='0; url=?page=data_user'>";
 		}
 	}
 }
 ?>