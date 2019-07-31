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
  $sql = mysql_query ("SELECT * FROM tb_p16a p LEFT JOIN tb_identitas i
      ON(p.id_identitas=i.id_identitas) LEFT JOIN tb_jaksa j ON(p.id_jaksa=j.id_jaksa)
      WHERE id_p16a='".$_GET['Gid_p16a']."'") or die (mysql_error());
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
       Penunjukan Jaksa Penuntut Umum<br>
       Untuk Penyelesaian<br>
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
     <td width="431"><?php echo $isi['id_p16a']; ?>&nbsp;
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
    <td width="2" height="25"></td>
    <td width="82" valign="top">Dasar</td><td width="9" valign="top"><strong>: </strong></td>
    <td width="20" valign="top">1.</td>
    <td colspan="3" align="justify">Undang-Undang Republik Indonesia Nomer : 8 Tahun 1981 Tentang Kitab Undang-Undang Hukum Acara Pidana (KUHAP) Pasal 8 (3) b, Pasal 137, Pasal 140 KUHAP</td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">2.</td>
    <td colspan="3" align="justify">Undang-Undang Republik Indonesia Nomer : 16 Tahun 2004 Tentang Kejaksaan Republik Indonesia</td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">3.</td>
    <td width="161" align="justify">Nama Lengkap</td>
    <td width="7" align="justify">:</td>
    <td align="justify"><?php echo $isi['nm_tersangka']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Tempat/Tanggal Lahir</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['tmpt_lhr']; ?>, <?php echo $isi['tgl_lhr']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Jenis Kelamin</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['jekel']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Bangsa/Suku</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['negara']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify" valign="top">Alamat/Tempat Tinggal</td>
    <td align="justify" valign="top">:</td>
    <td align="justify" valign="top"><?php echo $isi['alamat']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Agama</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['agama']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Pendidikan</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['pendidikan']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td align="justify">Pekerjaan</td>
    <td align="justify">:</td>
    <td align="justify"><?php echo $isi['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td colspan="3" align="justify">Diduga melakukan tindak pidana sebagaimana diatur pada melanggar</td>
  </tr>
  <tr>
    <td width="2" height="25"></td>
    <td width="82">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="20" valign="top">&nbsp;</td>
    <td colspan="3" align="justify">&nbsp;</td>
  </tr>
  
  <tr>
   <td width="2" height="25"></td>
   <td width="82" valign="top">Pertimbangan</td><td width="9" valign="top"><strong>: </strong></td>
   <td width="20" valign="top">1.</td>
   <td align="justify" colspan="3">Bahwa dengan diterimanya berkas perkara, tersangka dan barang bukti, dipandang perlu untuk menugaskan seorang / beberapa orang Jaksa Penuntut Umum untuk melakukan penuntutan / penyelesaian tindak pidana tersebut sesuai dengan peraturan perundang-undangan dan ketentuan administrasi perkara tindak pidana</td>
 </tr>
 <tr>
   <td width="2" height="26"></td>
   <td width="82">&nbsp;</td>
   <td width="9">&nbsp;</td>
   <td width="20" valign="top">2.</td>
   <td colspan="3" align="justify">Bahwa sebagai pelaksananya perlu dikeluarkan Surat Perintah Kepala Kejaksaan Negeri Kudus</td>
 </tr>
 <tr>
   <td width="2" height="26"></td><td width="82">&nbsp;</td>
   <td width="9">&nbsp;</td><td width="20">&nbsp;</td>
   <td colspan="3" align="center">MEMERINTAHKAN</td>
 </tr>
 <tr>
  <td width="2" height="25"></td><td width="82">Kepada</td><td width="9"><strong>: </strong></td>
  <td width="20">1.</td>
  <td colspan="2">Nama</td>
  <td width="275">: <?php echo $isi['nm_jaksa']; ?></td>
</tr>
<tr>
  <td width="2" height="25"></td><td width="82">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="20">&nbsp;</td>
  <td colspan="2">Pangkat/NIP</td>
  <td width="275">: <?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
</tr>
<tr>
  <td width="2" height="25"></td><td width="82">&nbsp;</td><td width="9">&nbsp;</td>
  <td width="20">&nbsp;</td>
  <td colspan="2">Jabatan</td>
  <td width="275">: <?php echo $isi['jabatan']; ?></td>
</tr>
<tr>
  <td width="2" height="27"></td><td width="82">Untuk</td><td width="9"><strong>:</strong></td>
  <td width="20" valign="top">1.</td>
  <td colspan="3" align="justify">Melaksanakan penahanan / pengalihan jenis penahanan / penangguhan penahanan / pengeluaran dari tahanan / pencabutan penangguhan penahanan dan meneliti benda sitaan / barang bukti</td>
</tr>
<tr>
  <td width="2" height="27"></td><td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20" valign="top">2.</td>
  <td colspan="3">Melakukan pemeriksaan tambahan terhadap perkara-perkara tersebut</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">3.</td>
  <td colspan="3">Melaksanakan penghentian penuntutan</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">4.</td>
  <td colspan="3">Melakukan  penuntutan perkara ke pengadilan</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">5.</td>
  <td colspan="3">Melaksanakan penetapan Hakim / Ketua Pengadilan</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20" valign="top">6.</td>
  <td colspan="3">Melakukan perlawanan terhadap penetapan Hakim / Ketua Pengadilan</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">7.</td>
  <td colspan="3">Melakukan upaya hukum</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">8.</td>
  <td colspan="3">Memberi pertimbangan atas permohonan grasi terpidana</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20" valign="top">9.</td>
  <td colspan="3" align="justify">Memberikan jawaban / tangkisan atas permohonan peninjauan kembali putusan pengadilan yang sudah memperoleh kekuatan hukum tetap</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20">10.</td>
  <td colspan="3">Menanda tangani berita acara pemeriksaan PK</td>
</tr>
<tr>
	<td width="2" height="26"></td>
  <td width="82">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="20" valign="top">11.</td>
  <td colspan="3" align="justify">Melaporkan setiap pelaksanaan tindak hukum berdasarkan perintah penugasan ini dengan berita acara kepada pejabat pengendali penanganan perkara pidana yang bersaangkutan</td>
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
