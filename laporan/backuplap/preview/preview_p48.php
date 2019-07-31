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
  $sql = mysql_query ("SELECT p.*,i.nm_tersangka,j.* FROM tb_p48 p LEFT JOIN tb_identitas i 
    ON(p.id_identitas=i.id_identitas) LEFT join tb_jaksa j ON(j.id_jaksa=p.id_jaksa)
    ORDER BY id_p48") or die (mysql_error());
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
    <table border="0"  width="70%" align="center">
     <caption>Surat Perintah<br>
       Pelaksanaan Putusan Pengadilan
     </caption>
     
     <tr>
      <td colspan="6">
       <center><font color="#000000"> <hr size="3"></center>
     </td>
   </tr>
   
   <td width="16"></td>

   <tr>
     <td width="16"></td>
     <td width="168"><strong>NOMOR :</strong></td>  
     <td width="431"><?php echo $isi['id_p48']; ?>&nbsp;
     </td>
   </tr>
 </table>

 <table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
   <tr class="header">
    <td colspan="7"></td>
  </tr>
  <tr >
    <td height="103" colspan="7" align="center"><blockquote>
      <blockquote>
        <p>KEPALA KEJAKSAAN NEGERI KUDUS</p>
      </blockquote>
    </blockquote></td>
  </tr>
  <tr>
    <td width="10" height="25"></td>
    <td width="104" valign="top">Dasar</td><td width="9" valign="top"><strong>: </strong></td>
    <td width="18" valign="top">1.</td>
    <td colspan="3" align="justify">Putusan Pengadilan Negeri Tindak Pidana Korupsi pada Pengadilan Negeri Semarang  Nomor :116/Pen.Pid.Sus/PN Tipikor.Smg Tanggal <?php echo $isi['tgl_p48']; ?></td>
  </tr>
  <tr>
    <td width="10" height="25"></td>
    <td width="104">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="18" valign="top">2.</td>
    <td colspan="3" align="justify">Undang-undang Nomor 3 tahun 1950 tentang Grasi  jo pasal 3 dan 14 Undang-undang Nomor 2 / PNPS / 1964 tentang  pelaksanaan pidana mati</td>
  </tr>
  <tr>
    <td width="10" height="25"></td>
    <td width="104">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="18" valign="top">3.</td>
    <td colspan="3" align="justify">Pasal  46 (2), 191, 192, 193, 194, 1 butir 6a jo 197 jo 270, 273 KUHAP</td>
  </tr>
  <tr>
    <td width="10" height="25"></td>
    <td width="104">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="18" valign="top">4.</td>
    <td colspan="3" align="justify">Pasal  30 ayat (1) b Undang-undang No. 16 tahun 2004 tentang Kejaksaan RI</td>
  </tr>
  <tr>
    <td width="10" height="25"></td>
    <td width="104">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="18" valign="top">&nbsp;</td>
    <td colspan="3" align="justify">&nbsp;</td>
  </tr>
  
  <tr>
   <td width="10" height="25"></td>
   <td width="104" valign="top">Pertimbangan</td><td width="9" valign="top"><strong>: </strong></td>
   <td width="18" valign="top">1.</td>
   <td colspan="2" align="justify">Bahwa  putusan Pengadilan tersebut telah memperoleh kekuatan hukum yang tetap pada tanggal<strong> <?php echo $isi['tgl_hukum']; ?></strong> dan oleh karena itu perlu segera dilaksanakan</td>
 </tr>
 <tr>
   <td width="10" height="26"></td>
   <td width="104">&nbsp;</td>
   <td width="9">&nbsp;</td>
   <td width="18" valign="top">2.</td>
   <td colspan="3" align="justify">Bahwa  sebagai pelaksanaannya perlu dikeluarkan Surat Perintah Kepala Kejaksaan Negeri  Kudus</td>
 </tr>
 <tr>
   <td width="10" height="26"></td><td width="104">&nbsp;</td>
   <td width="9">&nbsp;</td><td width="18">&nbsp;</td>
   <td colspan="3" align="center">MEMERINTAHKAN</td>
 </tr>
 <tr>
  <td width="10" height="25"></td><td width="104">Kepada</td><td width="9"><strong>: </strong></td>
  <td width="18">1.</td>
  <td>Nama</td>
  <td width="311">: <?php echo $isi['nm_jaksa']; ?></td>
  <td width="1">&nbsp;</td>
</tr>
<tr>
  <td width="10" height="25"></td><td width="104">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="18">&nbsp;</td>
  <td>Pangkat/NIP</td>
  <td width="311">: <?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
  <td width="1">&nbsp;</td>
</tr>
<tr>
  <td width="10" height="25"></td><td width="104">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="18">&nbsp;</td>
  <td>Jabatan</td>
  <td width="311">: <?php echo $isi['jabatan']; ?></td>
  <td width="1">&nbsp;</td>
</tr>
<tr>
  <td width="10" height="27"></td><td width="104">Untuk</td><td width="9"><strong>:</strong></td>
  <td width="18" valign="top">1.</td>
  <td colspan="3" align="justify">Melaksanakan  putusan Pengadilan  Tindak Pidana Korupsi pada Pengadilan Negeri Semarang <strong><?php echo $isi['untuk']; ?></strong>tanggal <strong><?php echo $isi['tgl_p48']; ?></strong><strong> </strong>atas nama terpidana :<strong></strong></td>
</tr>
<tr>
  <td width="10" height="27"></td><td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18" valign="top">&nbsp;</td>
  <td width="107" valign="top">1.1 <strong><?php echo $isi['nm_tersangka']; ?></strong></td>
  <td colspan="2" valign="top" align="justify">Pasal 3 Jo Pasal 18 UU No. 31 Tahun 1999 sebagaimana  telah diubah dengan UU No 20 Tahun 2001</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18" valign="top">2.</td>
  <td colspan="3">Melaksanakan  perintah yang terdapat dalam putusan Pengadilan Tindak Pidana Korupsi pada Pengadilan Negeri  Semarang Nomor : <strong><?php echo $isi['keperluan']; ?></strong> tanggal <strong><?php echo $isi['tgl_hukum']; ?> </strong>tersebut</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18">3.</td>
  <td colspan="3">Melaporkan  setiap pelaksanaan surat perintah ini dengan Berita Acara</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18">4.</td>
  <td colspan="3">Agar  dilaksanakan dengan penuh rasa tanggung jawab</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18" valign="top">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18" valign="top">&nbsp;</td>
  <td colspan="3" align="justify">&nbsp;</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="10" height="26"></td>
  <td width="104">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="18" valign="top">&nbsp;</td>
  <td colspan="3" align="justify">&nbsp;</td>
</tr>
</table>
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
