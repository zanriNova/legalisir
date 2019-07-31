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
  $sql = mysql_query ("SELECT p.*,i.nm_tersangka,j.* FROM tb_d4 p LEFT JOIN tb_identitas i 
        ON(p.id_identitas=i.id_identitas) left join tb_jaksa j ON(p.id_jaksa=j.id_jaksa)
        ORDER BY id_d4") or die (mysql_error());
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
       Penyerahan Denda / Denda Cuti / Uang Pengganti / Biaya Perkara
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
     <td width="431"><?php echo $isi['id_d4']; ?>&nbsp;
     </td>
   </tr>
 </table>

 <table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
   <tr class="header">
    <td colspan="7"></td>
  </tr>
  <tr >
    <td height="78" colspan="7" align="center"><blockquote>
      <blockquote>
        <p>KEPALA KEJAKSAAN NEGERI KUDUS</p>
      </blockquote>
    </blockquote></td>
  </tr>
  <tr>
    <td width="4" height="25"></td>
    <td width="88" valign="top">Dasar</td><td width="9" valign="top"><strong>: </strong></td>
    <td width="13" valign="top">1.</td>
    <td colspan="3" align="justify">Pasal 9 Keppres Nomor 29 Tahun 1984.</td>
  </tr>
  <tr>
    <td width="4" height="25"></td>
    <td width="88">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="13" valign="top">2.</td>
    <td colspan="3" align="justify">Surat Edaran Jaksa Agung RI  Nomor SE- 009/JA/1983 tanggal 12 September  1983 tentang Tata Cara Penanganan Uang Denda dan Biaya Perkara</td>
  </tr>
  <tr>
    <td width="4" height="25"></td>
    <td width="88">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="13" valign="top">&nbsp;</td>
    <td colspan="3" align="justify">&nbsp;</td>
  </tr>
  
  <tr>
   <td width="4" height="25"></td>
   <td width="88" valign="top">Pertimbangan</td><td width="9" valign="top"><strong>: </strong></td>
   <td width="13" valign="top">1.</td>
   <td colspan="2" align="justify"><strong><strong><?php echo $isi['pertimbangan']; ?></strong></strong></td>
 </tr>
 <tr>
   <td width="4" height="25"></td>
   <td width="88" valign="top">&nbsp;</td><td width="9" valign="top">&nbsp;</td>
   <td width="13" valign="top">2.</td>
   <td colspan="2" align="justify"><strong><strong><?php echo $isi['keperluan']; ?></strong></strong></td>
 </tr>
 <tr>
   <td width="4" height="26"></td>
   <td width="88">&nbsp;</td>
   <td width="9">&nbsp;</td>
   <td width="13" valign="top">3.</td>
   <td colspan="3" align="justify">Oleh karena itu dipandang perlu untuk  mengeluarkan Surat Perintah dimaksud</td>
 </tr>
 <tr>
   <td width="4" height="26"></td><td width="88">&nbsp;</td>
   <td width="9">&nbsp;</td><td width="13">&nbsp;</td>
   <td colspan="3" align="center">MEMERINTAHKAN</td>
 </tr>
 <tr>
  <td width="4" height="25"></td><td width="88">Kepada</td><td width="9"><strong>: </strong></td>
  <td width="13">1.</td>
  <td width="165">Nama</td>
  <td colspan="2">: <?php echo $isi['nm_jaksa']; ?></td>
</tr>
<tr>
  <td width="4" height="25"></td><td width="88">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td>Pangkat/NIP</td>
  <td width="280">: <?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
  <td width="1">&nbsp;</td>
</tr>
<tr>
  <td width="4" height="25"></td><td width="88">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td>Jabatan</td>
  <td width="280">: <?php echo $isi['jabatan']; ?></td>
  <td width="1">&nbsp;</td>
</tr>
<tr>
  <td width="4" height="27"></td><td width="88">Untuk</td><td width="9"><strong>:</strong></td>
  <td width="13" valign="top">1.</td>
  <td colspan="3" align="justify"><strong><?php echo $isi['keperluan']; ?></strong></td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13" valign="top">2.</td>
  <td colspan="3">Agar dilaksanakan dengan penuh rasa tanggung  jawab dengan Berita Acara Serah Terima</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13" valign="top">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13" valign="top">&nbsp;</td>
  <td colspan="3" align="justify">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13">&nbsp;</td>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="4" height="26"></td>
  <td width="88">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="13" valign="top">&nbsp;</td>
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
