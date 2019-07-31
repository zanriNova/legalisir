<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db_legalisir";
$koneksi = mysql_connect($server, $username, $password);
if (koneksi) {
	//echo "koneksi berhasil";
} else {
	echo "koneksi gagal";
}
mysql_select_db ($db)
	or die ("database tidak ada: ".mysql_error()) ;
