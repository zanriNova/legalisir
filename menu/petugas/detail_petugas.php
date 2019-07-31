<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $sql = mysql_query("SELECT p.*,i.nm_tersangka,j.* FROM tb_p48 p LEFT JOIN tb_identitas i 
      ON(p.id_identitas=i.id_identitas) LEFT join tb_jaksa j ON(j.id_jaksa=p.id_jaksa)
      WHERE id_p48='".$_GET['Gid_p48']."'");
  $data= mysql_fetch_array($sql);
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>

<h2 align="center">Detail Data P-48</h2>
<br>

  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
   <table width="600" align="center">
     <tr>
      <td colspan="3" align="center" style="background-color:green">P-48</td>
    </tr>
    <tr>
     <td width="46%" height="28">Nomor P-48</td>
     <td width="2%">:</td>
     <td width="52%"><?php echo $data['id_p48'] ?>
    </td>
  </tr>
  <tr>
    <td width="46%" height="28">Tanggal P-48</td>
    <td width="2%">:</td>
    <td width="52%"><?php echo $data['tgl_p48'] ?>
    </td>
  </tr>
  <tr>
    <td width="46%" height="28">Tanggal Hukum</td>
    <td width="2%">:</td>
    <td width="52%"><?php echo $data['tgl_hukum'] ?>
    </td>
  </tr>
  <tr>
   <td width="46%">Nama Tersangka</td>
   <td width="2%">:</td>
   <td width="52%"><?php echo $data['nm_tersangka'] ?>
  </td>
</tr>
<tr>
  <td width="46%" height="28">Keperluan untuk</td>
  <td width="2%">:</td>
  <td width="52%"><?php echo $data['untuk'] ?>            
  </td>
</tr>
<tr>
  <td height="27" colspan="3" align="center" style="background-color:green">Jaksa Penuntut Umum</td>
</tr>
<tr>
  <td width="46%">Nama Jaksa</td>
  <td width="2%">:</td>
  <td width="52%"><?php echo $data['nm_jaksa'] ?>
  </td>
</tr>
<tr>
  <td width="46%" height="29">Pangkat/NIP</td>
  <td width="2%">:</td>
  <td width="52%"><?php echo $data['pangkat'] ?> / <?php echo $data['nip'] ?>
  </td>
</tr>
<tr>
  <td width="46%">Jabatan</td>
  <td width="2%">:</td>
  <td width="52%"><?php echo $data['jabatan'] ?>
  </td>
</tr>
<tr>
 <td width="46%">&nbsp;</td>
 <td width="2%">&nbsp;</td>
 <td width="52%"><input name="btnBatal" type="reset" onclick="window.location.href='?page=tab_eksekusi'" value="Batal" />
 </td>
</tr>
</table>
</form>

<?php
} 
?>

