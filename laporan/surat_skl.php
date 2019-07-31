<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container">
	<div class="kop">
		<img src="">
		<h4>YAYASAN PEMBINA UNIVERSITAS MURIA KUDUS</h4>
		<h3>UNIVERSITAS MURIA KUDUS</h3>
		<h1>FAKULTAS TEKNIK</h1>
		<p>Alamat : Kampus UMK Gondangmanis PO.BOX 53 - Telp. (0291) 443844 FAX.(0291) 4250860</P>
		<p>Telp. Universitas (0291) 438229 Fax. Universitas (0291) 437498</p>
		<p>www.umk.ac.id - email : teknik.umk@gmail.com</p>
		<hr class="grs1">
		<hr class="grs2">
	</div>
	<div class="isi">
		<div class="surat_ket">
			<h4><u>SURAT KETERANGAN</u></h4>
			<p><?php echo $_GET["no_surat"]; ?></p><br>
		</div>
		<div class="detail col-md-9">
			Yang bertanda tangan dibawah ini dekan Fakultas Teknik Universitas Muria Kudus, menerangkan bahwa :
			<table>
				<tr><td width="100px">Nama</td><td width="10px">:</td><td><b><?php echo strtoupper($_GET["nama"]) ?></b></td></tr>
				<tr><td>NIM</td><td>:</td><td><b><?php echo $_GET["nim"] ?></b></td></tr>
				<tr><td>Progdi</td><td>:</td><td><b><?php echo $_GET["progdi"] ?></b></td></tr>
				<tr><td>IP</td><td>:</td><td><b><?php echo $_GET["ip"] ?></b></td></tr>
			</table>
			<p>
				Adalah Mahasiswa Program Studi SI/Sistem Informasi Fakultas Teknik Universitas Muria Kudus, yang sekarang telah menyelesaikan
				studinya dan tinggal menunggu wisuda bulan <?php echo $_GET['bl_th']; ?>.
			</p>
			<p>
				Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
			</p>
			<table class="ttd">
				<tr><td>Kudus, <?php echo date("d M Y"); ?></td></tr>
				<tr><td>Fakultas Teknik</td></tr>
				<tr><td>Dekan,</td></tr>
				<tr><td height="80px"></td></tr>
				<tr><td><u><?php echo $_GET['dekan'] ?></u></td></tr>
				<tr><td>NIS.<?php echo $_GET['nis']; ?></td></tr>
			</table>
		</div>
	</div>
</div>	
<style type="text/css">
u {
font-weight: 600;
}
.container{
	margin-top:  20px;
	border: 1px #000 solid !important;
}
.kop {
	margin-top: 40px;
}
.kop p,.kop h4,.kop h3,.kop h1{
	text-align: center;
	margin-top: -10px;
}
hr.grs1 {
	font-weight: 800;
	border-top: 2px solid #171515;
	margin-top: 0px;
}
hr.grs2 {
	font-weight: 600;
	border-top: 1px solid #171515;
	margin-top: -18px;
}
.surat_ket{
	text-align: center;
}
.surat_ket p{
	margin-top: -12px;
}
.detail{
margin-left: 15%;
}
.detail table{
	margin-top: 20px;
	margin-bottom: 20px;
	margin-left: 30px;
}
.detail table.ttd{
	margin-left: 65%;
	margin-top: 20px;
	margin-bottom: 20px;
}
</style>