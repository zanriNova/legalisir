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
  $sql = mysql_query ("SELECT * FROM tb_t7 t left join tb_p16a a ON(t.id_p16a=a.id_p16a) 
        left join tb_identitas i ON(a.id_identitas=i.id_identitas)
		left join tb_jaksa j ON(a.id_jaksa=j.id_jaksa)  WHERE id_t7='".$_GET['Gid_t7']."'") or die (mysql_error());
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
	Penahanan / Pengalihan Jenis Penahanan<br>
	(Tingkat Penuntutan)
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
  <td width="3" height="25"></td>
  <td width="108" valign="top">Dasar</td><td width="9" valign="top"><strong>: </strong></td>
  <td width="12" valign="top">1.</td>
  <td colspan="2" align="justify">Undang Undang No. 8 Tahun 1981 tentang Hukum  Acara Pidana, Pasal 284 ayat (2), jo Pasal 20 ayat (1) jo Pasal 21, Pasal 22,  Pasal 23, Pasal 25.</td>
 </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">2.</td>
    <td colspan="2" align="justify">Pasal 14 Undang Undang  No. 26 Tahun 2000 tentang Pengadilan Hak  Azasi Manusia.</td>
  </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">3.</td>
    <td colspan="2" align="justify">Undang-Undang No. 16 Tahun 2004 tentang Kejaksaan Republik Indonesia.</td>
  </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">4.</td>
    <td colspan="2" align="justify">Peraturan Pemerintah No. 27 Tahun 1983 tentang  Pelaksanaan Kitab Undang-Undang Hukum Acara Pidana.</td>
  </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">5.</td>
    <td colspan="2" align="justify">Berkas Perkara dari Penyidik Nomor : <?php echo $isi['id_bp']; ?> tanggal <?php echo $isi['tgl_bp']; ?> dalam perkara atas nama tersangka <?php echo $isi['nm_tersangka']; ?></td>
  </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">6.</td>
    <td colspan="2" align="justify">Saran pendapat dari <?php echo $isi['nm_jaksa']; ?>, <?php echo $isi['pangkat']; ?>, <?php echo $isi['nip']; ?>, <?php echo $isi['jabatan']; ?></td>
  </tr>
  <tr>
    <td width="3" height="25"></td>
    <td width="108">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="12" valign="top">&nbsp;</td>
    <td colspan="2" align="justify">&nbsp;</td>
  </tr>
  
  <tr>
	<td width="3" height="25"></td>
    <td width="108" valign="top">Pertimbangan</td><td width="9" valign="top"><strong>: </strong></td>
	<td width="12" valign="top">1.</td>
	<td width="414" align="justify">Berdasarkan hasil pemeriksaan berkas dari  penyidik diperoleh bukti yang cukup, terdakwa diduga keras melakukan tindak  pidana yang dapat dikenakan penahanan, dikhawatirkan terdakwa akan melarikan  diri, merusak dan menghilangkan barang bukti dan atau mengulangi tindak pidana serta  untuk mempermudah jalannya persidangan</td>
  </tr>
  <tr>
	<td width="3" height="26"></td>
	<td width="108">&nbsp;</td>
	<td width="9">&nbsp;</td>
	<td width="12" valign="top">2.</td>
	<td colspan="2" align="justify">Oleh karena itu dianggap perlu untuk  mengeluarkan Surat Perintah</td>
  </tr>
</table>
<br>
<table border="0" cellspacing="1" cellpadding="1" width="80%" align="center">
  <tr>
	<td width="2" height="26"></td><td width="110">&nbsp;</td>
    <td colspan="141" align="center">MEMERINTAHKAN</td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="110">Kepada</td><td width="9"><strong>: </strong></td>
  	<td width="12">1.</td>
  	<td width="132">Nama</td>
  	<td width="6">:</td>
  	<td width="269"><?php echo $isi['nm_jaksa']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="110">&nbsp;</td><td width="9">&nbsp;</td>
  	<td width="12">&nbsp;</td>
  	<td>Pangkat/NIP</td>
  	<td>:</td>
  	<td><?php echo $isi['pangkat']; ?> / <?php echo $isi['nip']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
  	<td width="12">&nbsp;</td>
  	<td>Jabatan</td>
  	<td>:</td>
  	<td><?php echo $isi['jabatan']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="25"></td>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
  <td width="2" height="27"></td><td width="110">Untuk</td><td width="9"><strong>:</strong></td>
  <td width="12">1.</td>
  <td width="132" align="justify">Menahan terdakwa</td>
  <td colspan="2" align="justify">&nbsp;</td>
  </tr>
  <tr>
  <td width="2" height="27"></td><td width="110">&nbsp;</td>
  <td width="9">&nbsp;</td>
  <td width="12" valign="top">&nbsp;</td>
  <td valign="top">Nama Lengkap</td>
  <td width="6" valign="top">:</td>
  <td width="269"><?php echo $isi['nm_tersangka']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Tempat, tgl. lahir</td>
	<td valign="top">:</td>
	<td><?php echo $isi['tmpt_lhr']; ?>, <?php echo $isi['tgl_lhr']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Jenis Kelamin</td>
	<td valign="top">:</td>
	<td><?php echo $isi['jekel']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Kebangsaan</td>
	<td valign="top">:</td>
	<td><?php echo $isi['negara']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12" valign="top">&nbsp;</td>
	<td valign="top">Tempat Tinggal</td>
	<td valign="top">:</td>
	<td><?php echo $isi['alamat']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Agama</td>
	<td valign="top">:</td>
	<td><?php echo $isi['agama']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Pekerjaan</td>
	<td valign="top">:</td>
	<td><?php echo $isi['pekerjaan']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12" valign="top">&nbsp;</td>
	<td align="justify" valign="top">Pendidikan</td>
	<td align="justify" valign="top">:</td>
	<td align="justify"><?php echo $isi['pendidikan']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12">&nbsp;</td>
	<td valign="top">Reg. Perkara No.</td>
	<td valign="top">:</td>
	<td><?php echo $isi['no_perkara']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12" valign="top">&nbsp;</td>
	<td align="justify" valign="top">Reg. Tahanan No.</td>
	<td align="justify" valign="top">:</td>
	<td align="justify"><?php echo $isi['no_tahanan']; ?></td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12" valign="top">&nbsp;</td>
	<td align="justify" valign="top">Reg.BarangBukti No.</td>
	<td align="justify" valign="top">:</td>
	<td align="justify"><?php echo $isi['no_bb']; ?></td>
  </tr>
  <tr>
  	<td width="2" height="21"></td>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
	<td width="2" height="26"></td>
    <td width="110">&nbsp;</td>
    <td width="9">&nbsp;</td>
	<td width="12" valign="top">&nbsp;</td>
	<td colspan="3" align="justify" valign="top">Dengan ketentuan bahwa ia ditahan di <?php echo $isi['jenis_tahanan']; ?> di Kudus selama <strong>20  (dua puluh)</strong> hari terhitung mulai tanggal <strong><?php echo $isi['tgl_masuk_pu']; ?> s/d <?php echo $isi['tgl_keluar_pu']; ?></strong></td>
  </tr>
  <tr>
  	<td width="2" height="21"></td>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
  <td width="2" height="27"></td><td width="110">&nbsp;</td><td width="9" valign="top">&nbsp;</td>
  <td width="12" valign="top">2.</td>
  <td colspan="3" align="justify" valign="top">Membuat Berita Acara Penahanan Lanjutan / Pengalihan Jenis Tahanan</td>
  </tr>
</table>
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
