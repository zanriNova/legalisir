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
  $sql = mysql_query ("SELECT p.*,i.nm_tersangka,s.kasus FROM tb_p31 p LEFT JOIN tb_bp a 
      ON(p.id_bp=a.id_bp) LEFT JOIN tb_spdp s ON(s.id_spdp=a.id_spdp) 
      left join  tb_identitas i ON(s.id_identitas=i.id_identitas)
      WHERE id_p31='".$_GET['Gid_p31']."'") or die (mysql_error());
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
      <td width="10%">P-31</td>
    </tr>
    <tr>
      <td valign="top"><u>Jl. Jendral Sudirman No.41</u></td>
      <td width="61%"></td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="top">&nbsp;</td>
    </tr>
  </table>
  <p></p>
  <table border="0"  width="80%" align="center">
   <caption>
     Surat Pelimpahan Perkara Acara Pemeriksaan Biasa
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
   <td width="431"><?php echo $isi['id_p31']; ?>&nbsp;
   </td>
 </tr>
</table>

<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr class="header">
		<td colspan="6"></td>
	</tr>
	<tr >
		<td height="66" colspan="6" align="center"><blockquote>
      <blockquote>
        <p>KEPALA KEJAKSAAN NEGERI KUDUS</p>
      </blockquote>
    </blockquote></td>
  </tr>
  <tr>
    <td height="25" colspan="2" valign="top">Membaca</td>
    <td width="9" valign="top"><strong>: </strong></td>
    <td width="3" valign="top">&nbsp;</td>
    <td width="463" colspan="2" align="justify">Berkas Perkara Nomor : <?php echo $isi['id_bp']; ?> tanggal <?php echo $isi['tgl_bp']; ?> yang dibuat oleh Penyidik atas sumpah jabatan dalam perkara terdakwa :</td>
  </tr>
  <tr>
    <td width="12" height="25"></td>
    <td width="129">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="3" valign="top">&nbsp;</td>
    <td colspan="2" align="justify">&nbsp;</td>
  </tr>
</table>

<table border="1" width="100%" align="center">
	<tr>
   <td width="6%" align="center">No.</td>
   <td width="21%" align="center">Nama Terdakwa</td>
   <td width="24%" align="center">Ditahan Penyidik / Penuntut Umum</td>
   <td width="34%" align="center">Jenis Tahanan</td>
   <td width="15%" align="center">Keterangan</td>
 </tr>
 <tr>
   <td rowspan="2" valign="top">1.</td>
   <td rowspan="2" valign="top"><?php echo $isi['nm_tersangka']; ?></td>
   <td>Penyidik</td>
   <td><?php echo $isi['jenis_tahanan']; ?> , <?php echo $isi['tgl_masuk_polri']; ?> s/d <?php echo $isi['tgl_keluar_polri']; ?></td>
   <td rowspan="2">&nbsp;</td>
 </tr>
 <tr>
  <td>Jaksa Penuntut Umum</td>
  <td><?php echo $isi['jenis_tahanan']; ?> , <?php echo $isi['tgl_masuk_pu']; ?> s/d <?php echo $isi['tgl_keluar_pu']; ?></td>
</tr>
</table>
<table border="0" cellspacing="1" cellpadding="1" width="90%" align="center">
	<tr class="header">
		<td colspan="5"></td>
	</tr>
	<tr >
		<td height="21" colspan="5" align="center"></td>
  </tr>
  <tr>
    <td width="153" height="25" valign="top">Menimbang</td>
    <td width="9" valign="top"><strong>: </strong></td>
    <td width="11" valign="top">a.</td>
    <td width="446" colspan="2" align="justify">Bahwa Penuntut Umum berpendapat dari hasil  penyidikan dapat dilakukan penuntutan dengan dakwaan telah melakukan tindak  pidana Korupsi sebagaimana diuraikan dan diancam dengan pidana melanggar Pasal  3 atau pasal 8 Jo pasal 18 Undang-Undang N0.31 tahun 1999 tentang Pemberantasan  tindak Pidana Korupsi sebagaimana telah diubah dan ditambah dengan  Undang-Undang Nomor 20 tahun 2001 tentang Perubahan atas Undang-Undang N0.31  tahun 1999 tentang Pemberantasan Tindak Pidana Korupsi</td>
  </tr>
  <tr>
    <td height="25"></td>
    <td width="9">&nbsp;</td>
    <td width="11" valign="top">b.</td>
    <td colspan="2" align="justify">Bahwa pemeriksaan selanjutnya adalah masuk  wewenang Pengadilan Negeri Tindak Pidana Korupsi di Semarang</td>
  </tr>
  <tr>
    <td height="25" valign="top">Mengingat</td>
    <td width="9" valign="top">:</td>
    <td width="11" valign="top">&nbsp;</td>
    <td colspan="2" align="justify">Pasal 137 jis pasal 143, pasal 81, pasal 152 KUHAP</td>
  </tr>
  <tr>
    <td height="25" valign="top">Menetapkan</td>
    <td width="9" valign="top">:</td>
    <td width="11" valign="top">&nbsp;</td>
    <td colspan="2" align="justify">Melimpahkan perkara  terdakwa <?php echo $isi['nm_tersangka']; ?> ke Pengadilan Negeri Tindak Pidana Korupsi di Semarang dengan Acara Pemeriksaan Biasa dan mohon segera  mengadili perkara tersebut atas dakwaan sebagaimana dimaksud dalam surat  dakwaan terlampir.</td>
  </tr>
  <tr>
    <td height="25" valign="top">Meminta</td>
    <td width="9" valign="top">:</td>
    <td width="11" valign="top">1.</td>
    <td colspan="2" align="justify">Agar Pengadilan Negeri Tindak Pidana Korupsi di Semarang menetapkan hari persidangan untuk mengadili  perkara tersebut dan menetapkan pemanggilan terdakwa <?php echo $isi['nm_tersangka']; ?> serta saksi-saksi</td>
  </tr>
  <tr>
    <td height="25" valign="top">&nbsp;</td>
    <td width="9" valign="top">&nbsp;</td>
    <td width="11" valign="top">2.</td>
    <td colspan="2" align="justify" valign="top">Mengeluarkan penetapan  untuk tetap menahan terdakwa <?php echo $isi['nm_tersangka']; ?></td>
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
