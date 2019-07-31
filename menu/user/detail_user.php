<?php
session_start();
if (isset($_SESSION['SES_USER'])=="")
{
  echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
else 
{ 
  include 'koneksi.php';
  if ($_GET['level']=='petugas') {
    $sql = mysql_query("SELECT u.*, p.* From tb_user u LEFT join tb_petugas p ON(u.username=p.id_petugas)
    Where u.username !='admin' AND id_petugas='".$_GET['Gusername']."'")or die(mysql_error());
  }else{
    $sql = mysql_query("SELECT u.*, a.* From tb_user u LEFT join tb_alumni a ON(u.username=a.nim_alumni)
    Where u.username !='admin' AND nim_alumni='".$_GET['Gusername']."'")or die(mysql_error());
  }
  $data= mysql_fetch_array($sql);
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>
  <h2 align="center">Detail Data User</h2>
  <br>
  <form name="frm_user" method="post" action="" enctype="multipart/form-data">
    <table width="600" align="center">
      <tr>
        <td colspan="3" class="line"></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td width="46%"><?php echo $_GET['level']=='petugas' ? 'NIP':'NIM'; ?></td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['username'] ?></td>
      </tr>
      <tr>
      <td><?php echo $_GET['level']=='petugas' ? 'Nama Pegawai':'Nama Alumni'?></td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $_GET['level']=='petugas' ? $data['nm_petugas'] : $data['nm_alumni'] ?></td>
      </tr>
      <tr>
        <td width="46%" height="28">Alamat</td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['alamat'] ?></td>
      </tr>
      <tr>
        <td width="46%">No Telp</td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['no_telp'] ?></td>
      </tr>
      <?php if ($_GET['level']=='petugas') {}else{?>
      <tr>
        <td width="46%" height="28">Fakultas</td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['fakultas'] ?></td>
      </tr>
      <tr>
        <td width="46%">Progdi</td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['progdi'] ?></td>
      </tr>
      <?php } ?>
      <tr>
        <td width="46%" height="29">Status</td>
        <td width="2%">:</td>
        <td width="52%"><?php echo $data['status'] ?></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td><input class="btn btn-default" name="btnBatal" type="reset" onclick="window.location.href='?page=data_user'" value="<<" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <?php
} 
?>

