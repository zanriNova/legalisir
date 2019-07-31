<?php
session_start();
if (isset($_SESSION['SES_USER'])=="")
{
  echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
else 
{ 
  $tgl=date('Y-m-d');
  // echo $_SESSION['SES_LEVEL'];
  include 'koneksi.php';
  if ($_SESSION['SES_LEVEL']=='petugas') {
    $sql = mysql_query("SELECT u.*, p.* From tb_user u LEFT join tb_petugas p ON(u.username=p.id_petugas)
      Where u.username !='admin' and id_petugas='".$_GET['Gusername']."'")or die(mysql_error());
  }else{
    $sql = mysql_query("SELECT u.*, a.* From tb_user u LEFT join tb_alumni a ON(u.username=a.nim_alumni)
      Where u.username !='admin' and nim_alumni='".$_GET['Gusername']."'")or die(mysql_error());
  }
  $data= mysql_fetch_array($sql);
  ?>
  <style type="text/css">
  caption {font-size:x-large}
  </style>
  <h2 align="center">Ubah Data User</h2>
  <br>
  <form name="frm_user" method="post" action="" enctype="multipart/form-data">
    <table width="700" align="center">
      <tr>
        <td colspan="3" class="line"></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td width="39%">Status</td>
        <td width="2%">:</td>
        <td width="59%"><?php echo $data['status']?></td>
      </tr>
      <tr>
        <td width="39%"><?php echo $_SESSION['SES_LEVEL']=='petugas' ? 'NIP':'NIM Alumni'; ?></td>
        <td width="2%">:</td>
        <td width="59%">
          <input value="<?php echo $data['username'] ?>" name="username" type="text" size="30" readonly="readonly" >
        </td>
      </tr>
      <tr>
        <td width="39%">Password</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="password" value="<?php echo $data['password'] ?>">
        </td>
      </tr>
      <tr>
        <td><?php echo $_SESSION['SES_LEVEL']=='petugas' ? 'Nama Pegawai':'Nama Alumni'?></td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="nama2" value="<?php echo $_SESSION['SES_LEVEL']=='petugas' ? $data['nm_petugas'] : $data['nm_alumni'] ?>">
        </td>
      </tr>
      <tr>
        <td width="39%">Alamat</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>">
        </td>
      </tr>
      <tr>
        <td width="39%">No Telp</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="no_telp" value="<?php echo $data['no_telp'] ?>">
        </td>
      </tr>
      <tr><td width="100">Upload Gambar </td>
        <td width="10">:</td>
        <td width="219">
          <input type="hidden" name="myFile2"  value="<?php echo $data['foto'] ?>" />
          <input type="file" name="myFile"   />
        </td>
      </tr>
      <?php if ($_SESSION['SES_LEVEL']=='petugas') {}else{?>
      <tr>
        <td width="61">Jenis Kelamin</td>
        <td width="3">:</td>
        <td width="135">
          <select name="jns_kelamin" >
            <option value="<?php echo $data['jns_kelamin'] ?>"><?php echo $data['jns_kelamin']=="L" ? "Laki-laki" : "Perempuan" ?></option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </td>
      </tr>
      <tr>
        <td width="39%">Fakultas</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="fakultas" value="<?php echo $data['fakultas'] ?>">
        </td>
      </tr>
      <tr>
        <td width="39%">Programstudy</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" name="progdi" value="<?php echo $data['progdi'] ?>">
        </td>
      </tr>
      <?php } ?>
      <tr>
        <td width="39%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
        <td width="59%">
          <input name="btnUbah" type="submit" value="Ubah" class="btn btn-primary">
          <input name="btnBatal" type="reset" onclick="window.location.href='?page='" value="Batal" class="btn btn-primary"/>
        </td>
      </tr>
    </table>
  </form>

  <?php
  if($_POST['btnUbah'] == "Ubah") {
    $tipe_file   = $_FILES['myFile']['type'];
    $nama_file   = $_FILES['myFile']['name']=="" ? $_POST['myFile2'] : $tgl.$_FILES['myFile']['name'];
    $lokasi_file = $_FILES['myFile']['tmp_name'];
    $direktori   = "foto/$nama_file"; 

    if ($_SESSION['SES_LEVEL']=='petugas') {
      $sql_update      = "UPDATE tb_petugas SET
      nm_petugas       = '".$_POST['nama2']."'
      ,foto            = '$nama_file'
      ,alamat          = '".$_POST['alamat']."'
      ,no_telp         = '".$_POST['no_telp']."'
      WHERE id_petugas = '".$_POST['username']."'";
    }else{
      $sql_update      = "UPDATE tb_alumni SET
      nm_alumni        = '".$_POST['nama2']."'
      ,foto            = '$nama_file'
      ,alamat          = '".$_POST['alamat']."'
      ,fakultas        = '".$_POST['fakultas']."'
      ,progdi          = '".$_POST['progdi']."'
      ,jns_kelamin     = '".$_POST['jns_kelamin']."'
      ,no_telp         = '".$_POST['no_telp']."'
      WHERE nim_alumni = '".$_POST['username']."' ";
    }
    $query_update = mysql_query($sql_update) or die (mysql_error());
    if($query_update){
      move_uploaded_file($lokasi_file,$direktori);
      $sql_user      = "UPDATE tb_user set 
      password       = '".$_POST['password']."'
      WHERE username = '".$_POST['username']."' ";
      $query_user = mysql_query($sql_user) or die (mysql_error());
      if($query_user){
        echo"<script> alert ('Ubah Data Berhasil !')</script>";
        echo $_SESSION['SES_USER']=='admin' ? "<meta http-equiv='refresh' content='0; url=?page=data_user'>" : "<meta http-equiv='refresh' content='0; url=?page='>";
      } 
    } 
  }
}
?>

