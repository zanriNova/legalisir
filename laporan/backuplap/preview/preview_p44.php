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
  $sql = mysql_query ("SELECT p.id_putusan, i.nm_tersangka, p.denda, p.pidana_penjara,s.barang_bukti,q.*,j.*
      FROM tb_p44 q Left JOIN tb_putusan p ON(q.id_putusan=p.id_putusan) 
      LEFT JOIN tb_p34 s ON(p.id_p34=s.id_p34) 
      LEFT JOIN tb_identitas i ON(s.id_identitas=i.id_identitas)
      LEFT JOIN tb_jaksa j ON(s.id_jaksa=j.id_jaksa)
      ORDER BY id_p44") or die (mysql_error());
  
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
      <td width="10%">P-44</td>
    </tr>
    <tr>
      <td valign="top"><u>Jl. Jendral Sudirman No.41</u></td>
      <td width="61%"></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <br>
  <table border="0"  width="100%" align="center">
    <h3 align="center">
     <u>Laporan Jaksa / Penuntutan Umum Segera setelah Putusan Pengadilan Negeri (Tipikor Semarang)</u>
   </h3>
   <tr>
    <td width="19%" valign="top">Nama Jaksa Penuntut Umum</td>
    <td width="2%" valign="top">:</td>
    <td width="23%" valign="top"><?php echo $isi['nm_jaksa']; ?></td>
    <td width="17%" valign="top">&nbsp;</td>
    <td width="20%" valign="top">Tanggal Tuntutan Pidana</td>
    <td width="1%" valign="top">:</td>
    <td width="18%"><?php echo $isi['tgl_tuntutan']; ?></td>
  </tr>
  <tr>
    <td width="19%" valign="top"></td>
    <td width="2%" valign="top"></td>
    <td width="23%" valign="top"></td>
    <td width="17%" valign="top">&nbsp;</td>
    <td width="20%" valign="top">Tanggal Pledooi</td>
    <td width="1%" valign="top">:</td>
    <td width="18%"><?php echo $isi['tgl_pledoi']; ?></td>
  </tr>
  <tr>
    <td width="19%" valign="top"></td>
    <td width="2%" valign="top"></td>
    <td width="23%" valign="top"></td>
    <td width="17%" valign="top">&nbsp;</td>
    <td width="20%" valign="top">Tanggal Putusan PN Tipikor</td>
    <td width="1%" valign="top">:</td>
    <td width="18%"><?php echo $isi['tgl_putusan_pn']; ?></td>
  </tr>
</table>
<br>
<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
  <tr class="header">
   <td colspan="6"></td>
 </tr>
 <tr>
  <td width="48" height="25"></td><td width="199" valign="top">Nomor </td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td width="475" colspan="2" valign="top"><?php echo $isi['id_p44']; ?></td>
</tr>
<tr>
  <td width="48" height="25"></td><td width="199" valign="top">Nama Terdakwa </td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td width="475" colspan="2" valign="top"><?php echo $isi['nm_tersangka']; ?></td>
</tr>
<tr>
  <td width="48" height="23"></td><td width="199" valign="top">Pasal</td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td width="475" colspan="2" valign="top" align="justify">Primair Pasal 2 ayat (1) Jo Pasal 18 UU No. 31  Tahun 1999 sebagaimana telah diubah dengan UU No. 20 Tahun 2001 Jo Pasal  55 ayat (1) ke-1 KUHP Subsidiair Pasal 3 Jo  Pasal 18 UU No. 31 Tahun 1999 sebagaimana telah diubah dengan UU No. 20 Tahun  2001 Jo Pasal  55 ayat (1) ke-1 KUHP</td>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td width="199" valign="top">Dakwaan yang dapat dibuktikan </td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td width="475" colspan="2" valign="top" align="justify"><?php echo $isi['dakwaan']; ?></td>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td colspan="4" align="center" valign="top"><strong>TUNTUTAN JAKSA PENUNTUT UMUM</strong></td>
</tr>
<tr>
  <td width="48" height="26"></td>
  <td width="199" valign="top">Pidana Penjara </td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['pidana_penjara']; ?></td>
</tr>
<tr>
  <td width="48" height="25"></td>
  <td width="199" valign="top">Denda</td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['denda']; ?></td>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td width="199" valign="top">Barang Bukti</td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['barang_bukti']; ?></td>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td colspan="4" align="center" valign="top"><strong>PUTUSAN HAKIM PENGADILAN NEGERI</strong></td>
</tr>
<tr>
  <td width="48" height="26"></td>
  <td width="199" valign="top">Pidana PN </td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['pidana_pn']; ?></td>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td width="199" valign="top">Barang Bukti</td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['barang_bukti_pn']; ?></td>
</tr>
</tr>
<tr>
  <td width="48" height="24"></td>
  <td width="199" valign="top">Biaya Perkara</td>
  <td width="13" valign="top"><strong>: </strong></td>
  <td colspan="2" valign="top"><?php echo $isi['biaya_perkara_pn']; ?></td>
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
