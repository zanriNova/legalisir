<?php
session_start();
include "koneksi.php";
if (isset($_SESSION['SES_USER'])=="")
{
  ?>
  <form name="login" action="" method="post"> 
    <table width="200" align="center" border="0"  >
      <tr height="30"><td></td></tr>
      <tr>
        <td width="61">Username</td>
        <td width="3">:</td>
        <td width="135"><input name="txtusername" type="text" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input name="txtpassword" type="password"  /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><input type="submit" name="btnLogin" value="Login" class="btn btn-default btn-flat"></td>
      </tr>
    </table>
  </form>
  <?php 
}else{ 
  echo "Anda Sedang login!!! Silahkan logout"; 
}
if($_POST['btnLogin']=="Login")
{
  $username=$_POST['txtusername'];
  if ($username !='' && $_POST['txtpassword']!='')
  {
    $cek     =mysql_query("SELECT * from tb_user WHERE status='Aktif' AND username='$username'  and password='".$_POST['txtpassword']."'") or die(mysql_error());
    $cekaktif=mysql_num_rows($cek);
    if($cekaktif >0 )
    {
      $data=mysql_fetch_array($cek);

      $_SESSION["SES_USER"]=$data["username"];  
      $_SESSION["SES_LEVEL"]=$data["level"];  
      // $_SESSION["SES_AKSES"] = $data['akses'];
      $SES_USER =$_SESSION["SES_USER"];
      $SES_LEVEL =$_SESSION["SES_LEVEL"];
      // $SES_AKSES=$_SESSION["SES_AKSES"];
      $_SESSION["SES_ID"] = $data['id_user'];
      $SES_ID=$_SESSION["SES_ID"];
      $_SESSION["SES_STATUS"] = $data['status'];
      $SES_STATUS=$_SESSION["SES_STATUS"];

      echo"<script>alert('Selamat Datang, Login berhasil !')</script>";
      echo"<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    else
    {
      echo"<script>alert('Username dan Password salah, Login Gagal!!!')</script>";
      echo"<meta http-equiv='refresh' content='0; url=index.php'>";
    }
  }
  else
  {
    echo"<script>alert('Username dan Password Belum Diisi, Login Gagal!!!')</script>";
    echo"<meta http-equiv='refresh' content='0; url=index.php'>";
  }	
}
