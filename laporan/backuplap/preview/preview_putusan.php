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
  $sql = mysql_query ("SELECT * FROM tb_putusan p LEFT JOIN tb_p34 s ON(p.id_p34=s.id_p34)
    LEFT JOIN tb_identitas i ON(s.id_identitas=i.id_identitas)
    WHERE id_putusan='".$_GET['Gid_putusan']."'") or die (mysql_error());
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
    <table border="0"  width="51%" align="center">
     <caption>
       Petikan Putusan
     </caption>

     <tr>
      <td colspan="7">
       <center><font color="#000000"> <hr size="3"></center>
     </td>
   </tr>

   <tr>
     <td colspan="2"></td>

     <tr>
       <td width="50">&nbsp;</td>
       <td width="71">Nomor</td>
       <td width="7">:</td>  
       <td width="390"><?php echo $isi['id_putusan']; ?>&nbsp;</td>
     </tr>
   </table>
   <table border="0"  width="75%" align="center">
     <tr>
      <td align="center"><strong>DEMI KEADILAN BERDASARKAN KETUHANAN YANG MAHA ESA</strong></td>
    </tr>
  </table>
  <br>
  <table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
   <tr class="header">
    <td colspan="4"></td>
  </tr>
  <tr>
    <td height="64" colspan="4" valign="top" align="justify"><p>Pengadilan Tindak Pidana Korupsi pada Pengadilan Negeri Semarang yang memeriksa dan mengadili perkara-pekara korupsi dalam pengadilan tingkat pertama dengan pemeriksaan acara biasa telah menjatuhkan putusan sebagai berikut dalam perkara terdakwa :</p></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Nama Lengkap</td>
    <td width="5">:</td>
    <td width="481" valign="top"><?php echo $isi['nm_tersangka']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Tempat, Tgl.Lahir</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['tmpt_lhr']; ?> , <?php echo $isi['tgl_lhr']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Jenis Kelamin</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['jekel']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Kewarganegaraan</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['negara']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Alamat</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['alamat']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Agama</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['agama']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Pekerjaan</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td width="92">Pendidikan</td>
    <td width="5">:</td>
    <td valign="top"><?php echo $isi['pendidikan']; ?></td>
  </tr>
  <tr>
    <td width="41" height="25"></td>
    <td colspan="3">Terdakwa ditahan sampai sekarang.</td>
  </tr>
</table>
<br>

<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr class="header">
		<td colspan="3"></td>
	</tr>
	<tr >
		<td height="21" colspan="3" align="center"><strong>PENGADILAN TINDAK PIDANA KORUPSI PADA PENGADILAN NEGERI SEMARANG TERSEBUT</strong></td>
  </tr>
  <tr>
    <td width="19" height="25" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">Telah membaca berkas perkara tersebut:</td>
  </tr>
  <tr>
    <td height="25" valign="top">&nbsp;</td>
    <td height="25" colspan="2" align="justify" valign="top">Mengingat Pasal 3 ayat Jo Pasal 18 Undang-Undang No. 31 Tahun 1999 tentang Pemberantasan Tindak Pidana Korupsi jo Undang-Undang No. 20 Tahun 2001 Tentang Perubahan Undang-Undang No. 31 Tahun 1999 Jo Pasal 55 ayat (1) ke-1 KUHP, Undang-Undang No. 8 Tahun 1981 tentang KUHAP serta peraturan lain yang berkaitan</td>
  </tr>
  <tr>
    <td height="25" colspan="3" valign="top" align="center"><strong>M E N G A D I L I </strong></td>
  </tr>
  <tr>
    <td height="25">1.</td>
    <td colspan="2" align="justify">Menyatakan Terdakwa <?php echo $isi['nm_tersangka']; ?> tidak terbukti secara sah dan menyakinkan bersalah melakukan tindak pidana sebagaimana dalam dakwaan Primair</td>
  </tr>
  <tr>
    <td height="25">2.</td>
    <td colspan="2" align="justify">Membebaskan Terdakwa <?php echo $isi['nm_tersangka']; ?> dari dakwaan Primain Tersebut</td>
  </tr>
  <tr>
    <td height="25">3.</td>
    <td colspan="2" align="justify">Menyatakan Terdakwa <?php echo $isi['nm_tersangka']; ?> tidak secara sah dan menyakinkan bersalah melakukan tindak pidana "KORUPSI DILAKUKAN SECARA BERSAMA-SAMA"</td>
  </tr>
  <tr>
    <td height="25">4.</td>
    <td colspan="2" align="justify">Menjatuhkan pidana terhadap Terdakwa <?php echo $isi['nm_tersangka']; ?> tersebut dengan Pidana Penjara <?php echo $isi['pidana_penjara']; ?> dan menjatuhkan pidana denda <?php echo $isi['denda']; ?></td>
  </tr>
  <tr>
    <td height="25">5.</td>
    <td colspan="2" align="justify">Menetapkan lamanya penahanan yang pernah dijalani oleh terdakwa, dikurangkan seluruhnya dengan pidana penjara yang dijatuhkan</td>
  </tr>
  <tr>
    <td height="25">6.</td>
    <td colspan="2" align="justify">Memerintahkan terdakwa tetap ditahan</td>
  </tr>
  <tr>
    <td height="25">7.</td>
    <td colspan="2" align="justify">Memerintahkan barang bukti berupa :</td>
  </tr>
  <tr>
    <td height="25" valign="top">&nbsp;</td>
    <td width="17" height="25" valign="top">1.</td>
    <td width="609" valign="top"><?php echo $isi['barang_bukti']; ?></td>
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
