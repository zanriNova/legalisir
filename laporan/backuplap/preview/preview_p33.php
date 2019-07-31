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
  $sql = mysql_query ("SELECT p.*,i.nm_tersangka FROM tb_p33 p LEFT JOIN tb_identitas i 
      ON(p.id_identitas=i.id_identitas) WHERE id_p33='".$_GET['Gid_p33']."'") or die (mysql_error());
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
    <table border="0"  width="100%" align="center">
     <tr>
      <td width="21"><strong>Kejaksaan Negeri Kudus</strong></td>
      <td width="61%"></td>
      <td width="10%">P-33</td>
    </tr>
    <tr>
      <td valign="top"><u>Jl. Jendral Sudirman No.41</u></td>
      <td width="61%"></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <br>
  <table border="0"  width="80%" align="center">
   <caption>
     Tanda Terima Surat<br>
     Pelimpahan Perkara Acara Pemeriksaan Biasa
   </caption>
   
   <tr>
    <td colspan="6">
     <center><font color="#000000"> <hr size="3"></center>
   </td>
 </tr>
 
 <td width="16"></td>

 <tr>
   <td width="16"></td>
   <td width="168">&nbsp;</td>  
   <td width="431">&nbsp;</td>
 </tr>
</table>

<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr class="header">
		<td colspan="4"></td>
	</tr>
 <tr>
  <td height="25" colspan="4" valign="top">-------Pada hari ini..............tanggal <?php echo $isi['tgl_p33']; ?> jam.........., Saya: --------</td>
</tr>
<tr>
  <td width="41" height="25"></td>
  <td width="92">Nama</td>
  <td width="5">:</td>
  <td width="481" valign="top"><?php echo $isi['nm_penerima']; ?></td>
</tr>
<tr>
  <td width="41" height="25"></td>
  <td width="92">Alamat</td>
  <td width="5">:</td>
  <td valign="top"><?php echo $isi['alamat_penerima']; ?></td>
</tr>
<tr>
  <td width="41" height="25"></td>
  <td width="92">Pekerjaan</td>
  <td width="5">:</td>
  <td valign="top"><?php echo $isi['jabatan_penerima']; ?></td>
</tr>
</table>
<br>

<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr class="header">
		<td colspan="5"></td>
	</tr>
	<tr >
		<td height="21" colspan="5">Telah menerima surat - surat berupa :</td>
  </tr>
  <tr>
    <td width="26" height="25" valign="top">1.</td>
    <td colspan="4" valign="top"><?php echo $isi['surat_diterima']; ?></td>
  </tr>
  <tr>
    <td height="25"></td>
    <td width="136">&nbsp;</td>
    <td width="11" valign="top">&nbsp;</td>
    <td colspan="2" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="5" valign="top">Sehubung dengan perkara atas nama terdakwa : <?php echo $isi['nm_tersangka']; ?></td>
  </tr>
</table>
<br>
<p></p>
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
