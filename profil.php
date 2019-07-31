<style type="text/css">
.user {
	text-align: center;
	padding-bottom: 20px;
}	
</style>

<?php
session_start();
if (isset($_SESSION["SES_USER"])=="")
{
	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
else 
{ 
	include 'koneksi.php';
	if($_SESSION["SES_LEVEL"]=="alumni"){
		$cek = "SELECT * from tb_user u left Join tb_alumni a on(u.username=a.nim_alumni)  WHERE u.username = '".$_SESSION["SES_USER"]."'";
	}else{
		$cek = "SELECT * from tb_user u left Join tb_petugas p on(u.username=p.id_petugas)  WHERE u.username = '".$_SESSION["SES_USER"]."'";
	}
	$data = mysql_query($cek) or die(mysql_error());
	$aktif = mysql_fetch_array($data);
	?>
	<div class="w3-card-2 w3-round w3-white">
		<div class="w3-container">
			<br>
			<p class="w3-center">
				<?php 
				if ($aktif['foto']=="-" || $aktif['username']=="admin" ||$aktif['foto']=="" ){
					?>
					<img src="img/img_avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
					<?php 
				}else{ 
					?>
					<img src="foto/<?php echo $aktif['foto'];?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
					<?php
				} 
				?>
			</p>
			<hr>
			<div class="user">
				<?php
				if ($_SESSION['SES_USER']=="admin"){
					echo $_SESSION["SES_USER"];
				}else{
					echo '<p><a href="?page=ubah_profil&Gusername='.$_SESSION["SES_USER"].'" class="btn prof"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i></a>'.$aktif['username'].'</p>';
				}
				echo $_SESSION["SES_LEVEL"]=="alumni" ? $aktif['nm_alumni'] : $aktif['nm_petugas'];
				?>
			</div>
		</div>
	</div>
	<br>
	<!-- Accordion -->
	<div class="w3-card-2 w3-round">
		<div class="w3-accordion w3-white">
			<?php 
			if ($_SESSION["SES_USER"]=="admin") {
				?>
				<div class="panel-heading w3-theme-l1">
					<h4 class="panel-title">
						<a href="?page=data_user">User</a>
					</h4>
				</div>
				<?php
			}
			if ($_SESSION["SES_LEVEL"]=="alumni") {}else{ ?>
			<div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="cekqrcode">Cek QR-Code</a>
				</h4>
			</div>
			<div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="?page=data_nota">Nota</a>
				</h4>
			</div>
			<div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="?page=lap_pendapatan">Pendapatan</a>
					<div class="kanan">
						<i class="fa fa-money" aria-hidden="true"></i>
					</div>
				</h4>
			</div>
			<!-- <div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="?page=tes">Tes</a>
				</h4>
			</div> -->
			<?php } ?>
			<div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="?page=data_permohonan">Permohonan</a>
				</h4>
			</div>
			<div class="panel-heading w3-theme-l1">
				<h4 class="panel-title">
					<a href="?page=data_pengumuman">Pengumuman</a>
					<div class="kanan">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
				</h4>
			</div>
		</div>
	</div>
	<br>
	<?php 
}
?>