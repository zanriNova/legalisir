<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $sql = mysql_query("SELECT * FROM tb_jns_nota
      WHERE id_nota='".$_GET['Gid_nota']."'");
  $data= mysql_fetch_array($sql);
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>

<h2 align="center">Ubah Data Jenis Nota</h2>
<br>
  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
   <table width="700" align="center">
     <tr>
      <td colspan="3" align="center" style="background-color:green">Jenis Nota</td>
    </tr>
    <tr>
     <td width="39%" height="28">Nomor Jenis Nota</td>
     <td width="2%">:</td>
     <td width="59%">
      <input value="<?php echo $data['id_nota'] ?>" name="id_nota" type="text" size="30" readonly>
    </td>
  </tr>
  <tr>
   <td width="39%">Nama Nota</td>
   <td width="2%">:</td>
   <td width="59%">
    <input type="text" value="<?php echo $data['nm_nota'] ?>" name="nm_nota" size="30" >
  </td>
</tr>
<tr>
  <td width="39%" height="29">Jumlah Copy</td>
  <td width="2%">:</td>
  <td width="59%">
    <input  value="<?php echo $data['jml_copy'] ?>" name="jml_copy" type="text" size="20" maxlength="15" > 
  </td>
</tr>
<tr>
  <td width="39%">Biaya</td>
  <td width="2%">:</td>
  <td width="59%">
    <input type="text"  value="<?php echo $data['biaya'] ?>" name="biaya" size="30"  >
  </td>
</tr>
<tr>
 <td width="39%">&nbsp;</td>
 <td width="2%">&nbsp;</td>
 <td width="59%">
   <input name="btnUbah" type="submit" value="Ubah">
   <input name="btnBatal" type="reset" onclick="window.location.href='?page=data_nota'" value="Batal" />
 </td>
</tr>
</table>
</form>

<?php
if($_POST['btnUbah'] == "Ubah") {
  $sql_update = "UPDATE tb_jns_nota set 
    jml_copy = '".$_POST['jml_copy']."'
    ,biaya   = '".$_POST['biaya']."'
    ,nm_nota = '".$_POST['nm_nota']."'
  WHERE id_nota = '".$_POST['id_nota']."' ";
  $query_update = mysql_query($sql_update) or die(mysql_error());
  if ($query_update)
  {
    echo"<script> alert ('Ubah Data Berhasil !')</script>";
    echo"<meta http-equiv='refresh' content='0; url=?page=data_nota'>";
  } 
} 
} 
?>

