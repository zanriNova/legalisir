<?php 
// include 'koneksi.php';
function email ($value,$field1,$tbl,$field2)
{
	$a="SELECT $field1 from $tbl WHERE $field2='$value'";
	$data = mysql_query($a)or die(mysql_error());
	$hasil = mysql_num_rows($data);
	if($hasil>=1){
		return 1;
		// echo "<script>alert('Data Sudah ada.')</script>"
	}
}
 ?>