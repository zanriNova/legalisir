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
  <h2 align="center">Ubah Data User</h2>
  <br>
   <form name="frm_user" method="post" action="" enctype="multipart/form-data">
    <table width="350" align="center">
      <tr>
        <td colspan="3" class="line"></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td width="39%"><?php echo $_GET['level']=='petugas' ? 'NIP':'NIM Alumni'; ?></td>
        <td width="2%">:</td>
        <td width="59%">
          <input value="<?php echo $data['username'] ?>" name="username" type="hidden" size="30" readonly>
          <?php echo $data['username'] ?>
        </td>
      </tr>
      <tr>
        <td width="39%"><?php echo $_GET['level']=='petugas' ? 'Nama Pegawai':'Nama Alumni'?></td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="hidden"  value="<?php echo $_GET['level']=='petugas' ? $data['nm_petugas'] : $data['nm_alumni'] ?>"  readonly="readonly">
          <?php echo $_GET['level']=='petugas' ? $data['nm_petugas'] : $data['nm_alumni'] ?>
        </td>
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
        <td width="39%">Status</td>
        <td width="2%">:</td>
        <td width="59%">
          <select name="status">
            <option value="<?php echo $data['status']?>"><?php echo $data['status']?></option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td colspan="3" align="center">
          <input name="btnUbah" type="submit" value="Ubah" class="btn btn-primary">
          <input name="btnBatal" type="reset" onclick="window.location.href='?page=data_user'" value="Batal" class="btn btn-primary"/>
        </td>
      </tr>
    </table>
  </form>

  <?php
  if($_POST['btnUbah'] == "Ubah") {

    $sql_update    = "UPDATE tb_user set 
    status         = '".$_POST['status']."'
    WHERE username = '".$_POST['username']."' ";
    $query_update  = mysql_query($sql_update) or die(mysql_error());
    if ($query_update)
    {
      echo"<script> alert ('Ubah Data Berhasil !')</script>";
      echo"<meta http-equiv='refresh' content='0; url=?page=data_user'>";
    } 
  } 
} 
?>

