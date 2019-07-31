<?php
// session_start();
// include "koneksi.php";
// if (isset($_SESSION['SES_USER'])=="")
{
  ?>
  <form name="login" action="" method="post"> 
    <table width="335" align="center" border="0" >
      <tr>
        <td colspan="3">
          <h6>*Gunakan NIM atau NIP Sebagai Username</h6>
        </td>
      </tr>
      <tr height="30"><td></td></tr>
      <?php if ($_GET['lv']!='1') { ?>
      <tr>
        <td width="120">Username</td>
        <td width="3">:</td>
        <td width="135"><input name="username" type="text" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input name="password" type="password"  /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><input name="email" type="email"  /></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input name="nm_alumni" type="text"  /></td>
      </tr>
      <tr>
        <td width="61">Jenis Kelamin</td>
        <td width="3">:</td>
        <td width="135">
          <select name="jns_kelamin" >
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>
          <textarea name="alamat" type="text" cols="22" rows="5"></textarea>
        </td>
      </tr>
      <tr>
        <td width="61">No Telp</td>
        <td width="3">:</td>
        <td width="135"><input name="no_telp" type="text" /></td>
      </tr>
      <tr>
        <td>Fakultas</td>
        <td>:</td>
        <td>
          <input name="fakultas" type="hidden"  value="TEKNIK"/>TEKNIK
        </td>
      </tr>
      <tr>
        <td>Progdi</td>
        <td>:</td>
        <td>
         <select name="progdi" >
          <option value="">Pilih</option>
          <option value="Sistem Informasi">Sistem Informasi</option>
          <option value="Teknik Informatika">Teknik Informatika</option>
          <option value="Teknik Mesin">Teknik Mesin</option>
          <option value="Teknik Elektro">Teknik Elektro</option>
          <option value="Teknik Industri">Teknik Industri</option>
        </select>
      </td>
    </tr>
    <?php }else{ ?>
    <tr>
      <td width="61">Username</td>
      <td width="3">:</td>
      <td width="135"><input name="username" type="text" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input name="password" type="password"  /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input name="email" type="email"  /></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><input name="nm_petugas" type="text"  /></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td>
        <textarea name="alamat" type="text" cols="22" rows="5"></textarea>
      </td>
    </tr>
    <tr>
      <td>No Telp</td>
      <td>:</td>
      <td><input name="no_telp" type="text"  /></td>
    </tr>
    <?php } ?>  
    <tr><td><br></td></tr>
    <tr>
      <td colspan="3">
        <?php //include 'captcha/captcha.html'; ?>
      </td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
      <td align="center" colspan="3"><input type="submit" name="save" value="Register" class="btn btn-primary"></td>
    </tr>
  </table>
</form>
<?php 
}
if($_POST['save']=="Register")
{
  include 'cek.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level    = $_GET['lv'] != '1' ? 'alumni' : 'petugas';

  $cek_email = email($_POST['email'],'email','tb_alumni','email');
  $cek_user = email($username,'username','tb_user','username');
  if($cek_email==1){
    echo "<script>alert('EMAIL Anda Sudah Terdaftar')</script>";
  }elseif ($cek_user==1) {
    echo "<script>alert('Username Anda Sudah Terdaftar')</script>";
  }else {
    if($_GET['lv'] == '1') {
      $nm_petugas     = $_POST['nm_petugas'];
      $alamat         = $_POST['alamat'];
      $no_telp        = $_POST['no_telp'];
      if ($username == ""||$nm_petugas==""||$alamat==""||$no_telp=="")
      {
        echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
      }
      else
      {
        $sql_insert ="INSERT INTO tb_petugas(id_petugas,nm_petugas,alamat,no_telp,foto)
        VALUES ('$username','$nm_petugas','$alamat','$no_telp','-')";
        $req = 1;
        include 'kirim-email/email.php';
      }
    }else{
      $nm_alumni   = $_POST['nm_alumni'];
      $alamat      = $_POST['alamat'];
      $email      = $_POST['email'];
      $fakultas    = $_POST['fakultas'];
      $progdi      = $_POST['progdi'];
      $jns_kelamin = $_POST['jns_kelamin'];
      $no_telp     = $_POST['no_telp'];
      if ($username == ""||$password==""||$nm_alumni==""||$alamat==""||$fakultas==""||$progdi==""||$jns_kelamin==""||$no_telp=="")
      {
        echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";
        echo"<meta http-equiv='refresh' content='0; url=index.php'>";exit;
      }
      else
      {
        $sql_insert ="INSERT INTO tb_alumni(nim_alumni,nm_alumni,email,alamat,fakultas,progdi,jns_kelamin,no_telp,foto)
        VALUES ('$username','$nm_alumni','$email','$alamat','$fakultas','$progdi','$jns_kelamin','$no_telp','-')";
        $req = 1;
        include 'kirim-email/email.php';
      }
    }
    $query_insert = mysql_query($sql_insert) or die (mysql_error());
    if($query_insert){
      $sql_user   = "INSERT INTO tb_user(username,password,status,level) VALUES ('$username','$password','Tidak Aktif','$level')";
      $query_user = mysql_query($sql_user) or die (mysql_error());
      if($query_user){
        echo "<script>alert('Data berhasil disimpan')</script>";
        echo"<meta http-equiv='refresh' content='0; url=index.php'>";exit();
      }
    }
    }  // echo"<meta http-equiv='refresh' content='0; url=?page=tambah_stok&kd_rbg=$kode__p31&Qt=$qt'>";
  }
