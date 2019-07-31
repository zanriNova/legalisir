<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $sql = mysql_query ("SELECT p.*,a.* FROM tb_alumni a LEFT JOIN tb_permohonan p ON(p.nim_alumni=a.nim_alumni)
    WHERE id_permohonan='".$_GET['Gid_permohonan']."'") or die(mysql_error());
  $data= mysql_fetch_array($sql);
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>

  <h2 align="center">Detail Data Permohonan</h2>
  <br>

  <form name="frm_permohonan" method="post" action="" enctype="multipart/form-data">
    <table width="600" align="center">
      <tr>
        <td class="line" colspan="3"></td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
       <td width="46%" height="28">Nomor Permohonan</td>
       <td width="2%">:</td>
       <td width="52%"><?php echo $data['id_permohonan'] ?>
       </td>
     </tr>
     <tr>
      <td width="46%" height="28">Nama</td>
      <td width="2%">:</td>
      <td width="52%"><?php echo $data['nim_alumni'] ?>
      </td>
    </tr>
    <tr>
      <td width="46%" height="28">NIM</td>
      <td width="2%">:</td>
      <td width="52%"><?php echo $data['nim_alumni'] ?>
      </td>
    </tr>
    <tr>
      <td width="46%" height="28">Tanggal Permohonan</td>
      <td width="2%">:</td>
      <td width="52%"><?php echo $data['tgl_permohonan'] ?>
      </td>
    </tr>
    <tr>
      <td width="46%">Hal</td>
      <td width="2%">:</td>
      <td width="52%"><?php echo $data['hal']=="ijazah" ? "Ijazah" : "Surat Keterangan Lulus" ?>
      </td>
    </tr>
    <?php 
    if($data['hal']=='ijazah'){
      ?>
      <tr><td><br></td></tr>
      <tr>
        <td width="46%"><b>Cek Data</b></td>
        <td width="2%">:</td>
        <td width="52%">
          <a class="btn btn-success" href="ijazah/<?php echo $data['ijazah'] ?>">
            <i class="fa fa-print"></i>&nbsp;&nbsp;Open File
          </a>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr><td><br></td></tr>
    <tr>
      <td colspan="2">
        <input class="btn btn-default" name="btnBatal" type="reset" onclick="window.location.href='?page=data_permohonan'" value="<<" />
      </td>
      <td align="right">
        <a class="btn btn-success" href="?page=detail_nota&hal=<?php echo $data["hal"] ?>&permohonan=<?php echo $data["id_permohonan"] ?>">Cek Status</a>
      </td>
    </tr>
  </table>
</form>

<?php
} 
?>

