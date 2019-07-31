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
  $sql = mysql_query ("SELECT z.*,i.nm_tersangka,s.kasus FROM tb_p21 z LEFT JOIN 
      tb_bp p ON(z.id_bp=p.id_bp)  LEFT JOIN tb_spdp s ON(s.id_spdp=p.id_spdp) 
      left join  tb_identitas i ON(s.id_identitas=i.id_identitas) WHERE id_p21='".$_GET['Gid_p21']."'") or die (mysql_error());
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
    <table border="0"  width="100%" align="center">
     <tr>
      <td width="26%"><strong>Kejaksaan Negeri Kudus</strong></td>
      <td width="64%"></td>
      <td width="10%">P-21</td>
    </tr>
    <tr>
      <td width="26%" valign="top"><u>Jl. Jendral Sudirman No.41</u></td>
      <td width="64%"></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <p></p>
  <table border="0"  width="100%" align="center">
   <tr>
    <td width="73">Nomor</td>
    <td width="3">:</td>
    <td width="238"><?php echo $isi['id_p21']; ?></td>
    <td width="72"></td>
    <td width="294">Kudus, <?php echo $isi['tgl_p21']; ?></td>
  </tr>
  <tr>
    <td width="73">Sifat</td>
    <td width="3">:</td>
    <td width="238">Biasa</td>
    <td width="72"></td>
    <td width="294">&nbsp;</td>
  </tr>
  <tr>
    <td width="73">Lampiran</td>
    <td width="3">:</td>
    <td width="238">-</td>
    <td width="72"></td>
    <td width="294">&nbsp;</td>
  </tr>
  <tr>
    <td width="73" valign="top">Perihal</td>
    <td width="3" valign="top">:</td>
    <td width="238" valign="top">Pemberitahuan Hasil Penyidikan perkara pidana An.<?php echo $isi['nm_tersangka']; ?> yang disangka melanggar <?php echo $isi['kasus']; ?> sudah lengkap</td>
    <td width="72"></td>
    <td width="294">KEPADA YTH.<br>
      KEPALA KPPBC TIPE MADYA CUKAI<br>
      KUDUS<br>
      DI - KUDUS</td>
    </tr>
    <tr>
      <td width="73" valign="top"></td>
      <td width="3" valign="top"></td>
      <td width="238" valign="top"><font color="#000000"> <hr size="3"></center></td>
      <td width="72"></td>
      <td width="294"></td>
    </tr>
  </table>
  <br>
  <table border="0"  width="100%" align="center">
   <tr>
     <td width="77">&nbsp;</td>
     <td width="615" align="justify">Sehubungan dengan penyerahan berkas perkara pidana atas nama tersangka <?php echo $isi['nm_tersangka']; ?> Nomor : <?php echo $isi['id_bp']; ?> <?php echo $isi['keterangan']; ?></td>
   </tr>
   <tr>
     <td width="77">&nbsp;</td>
     <td width="615">Sesuai dengan pasal 8 ayat (3) huruf b, pasal 138 ayat (1), dan pasal 139 KUHAP supaya saudara menyerahkan tanggung jawab tersangka dan barang bukti kepada kami, guna menentukan apakah perkara tersebut sudah memenuhi persyaratan untuk dapat atau tidak dapat dilimpahkan ke Pengadilan.</td>
   </tr>
   <tr>
     <td width="77">&nbsp;</td>
     <td width="615">Demikian untuk dimaklumi.</td>
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
    <p>&nbsp;</p>
  </body>
  <?php } ?>
