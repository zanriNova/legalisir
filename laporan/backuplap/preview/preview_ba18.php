<?php
//session_start();
// if (isset($_SESSION['SES_USER'])=="") {
// 	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
// 	}
// 	else 
 {
  if($_GET['lap']=='1'){
  }else{
    include "../../koneksi.php";
  }
  $sql = mysql_query ("SELECT * FROM tb_ba18 p LEFT JOIN tb_p16a a ON(p.id_p16a=a.id_p16a)
    LEFT JOIN tb_identitas i on(a.id_identitas=i.id_identitas)
	LEFT JOIN tb_jaksa j on(a.id_jaksa=j.id_jaksa)
    WHERE id_ba18='".$_GET['Gid_ba18']."'") or die (mysql_error());
  $isi=mysql_fetch_array($sql);
	?>
      
<style type="text/css">
	tr.header {font-family:"Times New Roman", Times, serif; font-size:15px; color:#000; font-weight:bolder; }
	caption {font-size:x-large; color: #000; font-family:"Times New Roman",Comic Sans MS, cursive; font-weight:bold}
</style>

<div align="left">
<br />
</div>

<body>
<table border="0"  width="66%" align="center">
	<caption>
	Berita Acara Penerimaan 
	dan Penelitian<br>
	Benda Sitaan / Barang
	Bukti
	</caption>
 
	<tr>
		<td width="455" colspan="6">
			<center><font color="#000000"> <hr size="3"></center>
		</td>
	</tr>
 
	<td width="455"></td>

	</table>

<table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
	<tr class="header">
		<td colspan="6"></td>
	</tr>
	<tr >
		<td height="45" colspan="6" valign="top" align="justify">-----Pada hari ini Senin tanggal 25 Februari tahun 2016, bertempat di Kejaksaan Negeri Kudus, Kami  :</td>
	</tr>
 <tr>
  <td width="42" height="25"></td>
  <td width="12">1.</td>
  <td width="86">Nama</td>
  <td width="5">:</td>
  <td width="401"><?php echo $isi['nm_jaksa']; ?></td>
  </tr>
  <tr>
    <td width="42" height="25"></td>
    <td width="12">&nbsp;</td>
    <td>Pangkat/NIP</td>
    <td>:</td>
    <td><?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
  </tr>
  <tr>
    <td width="42" height="25"></td>
    <td width="12">&nbsp;</td>
    <td>Jabatan</td>
    <td>:</td>
    <td><?php echo $isi['jabatan']; ?></td>
  </tr>
   
  <tr>
	<td height="18" colspan="5"></td>
  </tr>
  <tr>
	<td height="26" colspan="6" align="justify">Berdasarkan Surat Perintah Kepala Kejaksaan  Negeri Kudus (P-16 A) Nomor : <?php echo $isi['id_p16a']; ?> tanggal <?php echo $isi['tgl_p16a']; ?>, telah menerima dan melakukan  penelitian terhadap Benda Sitaan / Barang Bukti dalam perkara tersangka <?php echo $isi['nm_tersangka']; ?> melanggar <?php echo $isi['pasal_pelanggaran']; ?>, berupa :</td>
  </tr>
  <tr>
	<td width="42" height="26"></td>
	<td width="12">&nbsp;</td>
	<td width="86">&nbsp;</td>
	<td width="5" valign="top">&nbsp;</td>
	<td colspan="2" align="justify">&nbsp;</td>
  </tr>
  <tr>
	<td height="26" colspan="6"><?php echo $isi['barang_bukti']; ?></td>
  </tr>
</table>
<br>

<br>
<p></p>
<br>
<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr>
    	<td width="45%"></td>
        <td width="45%" align="center">
          <p>KEPALA KEJAKSAAN NEGERI KUDUS</p>
          <p>SELAKU PENUNTUT UMUM</p></td>
    </tr>
    <tr>
    	<td width="40%" height="72">&nbsp;</td>
        <td width="60%" height="72">&nbsp;</td>
  </tr>
    <tr>
    	<td width="45%"></td>
        <td width="45%" align="center"><p>(<u>AMRAN LAKON, SH.MH.</u>)</p>
        <p>JAKSA MADYA NIP. 196408171984031001</p></td>
    </tr>
</table>


    <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td width="44%" height="95" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
</body>
<?php } ?>
