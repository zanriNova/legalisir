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

<h2 align="center">Ubah Data P-48</h2>
<br>
  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
   <table width="700" align="center">
     <tr>
      <td colspan="3" align="center" style="background-color:green">P-48</td>
    </tr>
    <tr>
     <td width="39%" height="28">Nomor P-48</td>
     <td width="2%">:</td>
     <td width="59%">
      <input value="<?php echo $data['id_p48'] ?>" name="id_p48" type="text" size="30" readonly>
    </td>
  </tr>
  <tr>
    <td width="39%" height="28">Tanggal P-48</td>
    <td width="2%">:</td>
    <td width="59%">
      <input type="date" value="<?php echo $data['tgl_p48'] ?>" name="tgl_p48" id="tanggal"/>
    </td>
  </tr>
  <tr>
    <td width="39%" height="28">Tanggal Hukum</td>
    <td width="2%">:</td>
    <td width="59%">
      <input type="date" value="<?php echo $data['tgl_hukum'] ?>" name="tgl_hukum" id="tanggal"/>
    </td>
  </tr>
  <tr>
   <td width="39%">Nama Tersangka</td>
   <td width="2%">:</td>
   <td width="59%">
    <input type="hidden" value="<?php echo $data['id_identitas'] ?>" name="id_identitas" size="30" >
    <input type="text" value="<?php echo $data['nm_tersangka'] ?>" name="nm_tersangka" size="30" readonly>
    <a href=# class="style1" onClick="window.open('menu_admin/pop/p_identitas.php?in=p48&di=ubah', 'p48','menubar=0,toolbar=0,scrollbars=1,width=800,height=400,top=200,left=200')">Pilih</a>
  </td>
</tr>
<tr>
  <td width="39%" height="28">Keperluan untuk</td>
  <td width="2%">:</td>
  <td width="59%">
    <textarea name="untuk" cols="50" rows="3"><?php echo $data['untuk']; ?></textarea>            
  </td>
</tr>
<tr>
  <td height="27" colspan="3" align="center" style="background-color:green">Jaksa Penuntut Umum</td>
</tr>
<tr>
  <td width="39%">Nama Jaksa</td>
  <td width="2%">:</td>
  <td width="59%">
    <input type="hidden"  value="<?php echo $data['id_jaksa'] ?>" name="id_jaksa" size="30"  >
    <input type="text"  value="<?php echo $data['nm_jaksa'] ?>" name="nm_jaksa" size="30"  readonly="readonly">
    <a href=# class="style1" onClick="window.open('menu_admin/pop/p_jaksa.php?in=p48&di=ubah', 'p34','menubar=0,toolbar=0,scrollbars=1,width=800,height=400,top=200,left=200')">Pilih</a>
  </td>
</tr>
<tr>
  <td width="39%" height="29">Pangkat/NIP</td>
  <td width="2%">:</td>
  <td width="59%">
    <input  value="<?php echo $data['pangkat'] ?>" name="pangkat" type="text" size="20" maxlength="15" readonly> 
    / 
    <input  value="<?php echo $data['nip'] ?>" name="nip" type="text" size="25" readonly>
  </td>
</tr>
<tr>
  <td width="39%">Jabatan</td>
  <td width="2%">:</td>
  <td width="59%">
    <input type="text"  value="<?php echo $data['jabatan'] ?>" name="jabatan" size="30"  readonly="readonly">
  </td>
</tr>
<tr>
 <td width="39%">&nbsp;</td>
 <td width="2%">&nbsp;</td>
 <td width="59%">
   <input name="btnUbah" type="submit" value="Ubah">
   <input name="btnBatal" type="reset" onclick="window.location.href='?page=tab_eksekusi'" value="Batal" />
 </td>
</tr>
</table>
</form>

<?php
if($_POST['btnUbah'] == "Ubah") {

  $sql_update = "UPDATE tb_p48 set 
    tgl_p48       = '".$_POST['tgl_p48']."'
    ,id_identitas = '".$_POST['id_identitas']."'
    ,tgl_hukum    = '".$_POST['tgl_hukum']."'
    ,untuk        = '".$_POST['untuk']."'
    ,id_jaksa     = '".$_POST['id_jaksa']."'
  WHERE id_p48 = '".$_POST['id_p48']."' ";
  $query_update = mysql_query($sql_update) or die(mysql_error());
  if ($query_update)
  {
    echo"<script> alert ('Ubah Data Berhasil !')</script>";
    echo"<meta http-equiv='refresh' content='0; url=?page=tab_eksekusi'>";
  } 
} 
} 
?>

