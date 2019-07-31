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
  $sql = mysql_query ("SELECT * FROM tb_p16 p LEFT JOIN tb_identitas i ON(p.id_identitas=i.id_identitas)
    LEFT JOIN tb_jaksa j ON(p.id_jaksa=j.id_jaksa)
    WHERE id_p16='".$_GET['Gid_p16']."'") or die (mysql_error());
    $isi = mysql_fetch_array($sql);
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
	Penunjukan Jaksa Penuntut Umum<br>
	Untuk Mengikuti Perkembangan Penyidikan<br>
	Perkara Tindak Pidana
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
		<td width="431"><?php echo $isi['id_p16']; ?>&nbsp;
		</td>
	</tr>
</table>

<table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
	<tr class="header">
		<td colspan="6"></td>
	</tr>
	<tr >
		<td height="103" colspan="6" align="center"><blockquote>
		<blockquote>
		<p>KEPALA KEJAKSAAN NEGERI KUDUS</p>
		</blockquote>
		</blockquote></td>
	</tr>
 <tr>
  <td width="8" height="25"></td>
  <td width="141" valign="top">Dasar</td><td width="9" valign="top"><strong>: </strong></td>
  <td width="17" valign="top">1.</td>
  <td colspan="2" align="justify">Undang-Undang Republik Indonesia Nomer : 8 Tahun 1981 Tentang Kitab Undang-Undang Hukum Acara Pidana (KUHAP) Pasal 284 ayat (2);</td>
 </tr>
  <tr>
    <td width="8" height="25"></td>
    <td width="141">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="17" valign="top">2.</td>
    <td colspan="2" align="justify">Undang-Undang No.31 Tahun 1999 Tentang Pidana Korupsi, yang telah diubah dengan Undang-Undang No. 20 Tahun 2001 Tentang Pemberantasan Pidana Korupsi;</td>
  </tr>
  <tr>
    <td width="8" height="25"></td>
    <td width="141">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="17" valign="top">3.</td>
    <td colspan="2" align="justify">Undang-Undang Republik Indonesia Nomer : 16 Tahun 2004 Tentang Kejaksaan Republik Indonesia</td>
  </tr>
  <tr>
    <td width="8" height="25"></td>
    <td width="141">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="17" valign="top">4.</td>
    <td colspan="2" align="justify">Peraturan Pemerintahan No. 27 Tahun 1983 Tentang Pelaksanaan Kitab Undang-Undang Hukum Acara Pidana;</td>
  </tr>
  <tr>
    <td width="8" height="25"></td>
    <td width="141">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="17" valign="top">5.</td>
    <td colspan="2" align="justify">Kepres No. 86 Tahun 1999 Tentang Susunan Organisasi dan Tata Kerja Kejaksaan Republik Indonesia</td>
  </tr>
  <tr>
    <td width="8" height="25"></td>
    <td width="141">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="17" valign="top">6.</td>
    <td colspan="2" align="justify">Surat Pemberitahuan Dimulainya Penyidikan Tanggal <?php echo $isi['tgl_p16']; ?> An Tersangka <?php echo $isi['nm_tersangka']; ?></td>
  </tr>
  
  <tr>
	<td width="8" height="25"></td>
    <td width="141" valign="top">Pertimbangan</td><td width="9" valign="top"><strong>: </strong></td>
	<td width="17" valign="top">1.</td>
	<td width="645" align="justify">Bahwa dengan diterimanya pemberitahuan dimulainya penyidikan, dipandang perlu untuk menugaskan seseorang / beberapa orang Jaksa Penuntut Umum untuk mengikuti perkembangan penyidikan, meneliti hasil penyidikan perkara tersebut sesuai dengan peraturan perundang-undangan dan ketentuan administrasi perkara tindak pidana</td>
  </tr>
  <tr>
	<td width="8" height="26"></td>
	<td width="141">&nbsp;</td>
	<td width="9">&nbsp;</td>
	<td width="17" valign="top">2.</td>
	<td colspan="2" align="justify">Bahwa sebagai pelaksananya perlu dikeluarkan Surat Perintah Kepala Kejaksaan Negeri Kudus</td>
  </tr>
</table>
<table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
  <tr>
	<td width="2" height="26"></td><td width="99">&nbsp;</td>
    <td colspan="141" align="center">MEMERINTAHKAN</td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="99">Kepada</td><td width="9"><strong>: </strong></td>
  	<td width="13">1.</td>
  	<td width="117">Nama</td>
  	<td width="4">:</td>
  	<td width="296"><?php echo $isi['nm_jaksa']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="99">&nbsp;</td><td width="9">&nbsp;</td>
  	<td width="13">&nbsp;</td>
  	<td>Pangkat/NIP</td>
  	<td>:</td>
  	<td><?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="99">&nbsp;</td>
    <td width="9">&nbsp;</td>
  	<td width="13">&nbsp;</td>
  	<td>Jabatan</td>
  	<td>:</td>
  	<td><?php echo $isi['jabatan']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="99">Untuk</td><td width="9"><strong>: </strong></td>
  	<td width="13">1.</td>
  	<td colspan="3"><?php echo $isi['untuk']; ?></td>
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
