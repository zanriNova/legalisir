<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $query      = mysql_query('SELECT max(id_permohonan) as terakhir from tb_permohonan');
  $data       = mysql_fetch_array($query);
  $lastID     = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 3);
  $nextNoUrut = $lastNoUrut + 1;
//dapatkan format tanggal hari ini
  $tanggal=date("d/m/y");
  $tanggal2=date("Y-m-d");
  $otomatisKode= "ID-".sprintf("%003s",$nextNoUrut).'/'.$tanggal;
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>
  
  <h2 align="center">Input Data Permohonan</h2>
<br>
  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
    <table width="700" align="center">
      <tr>
        <td colspan="3" align="center" class="line"></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
       <td width="37%" height="28">Nomor Permohonan</td>
       <td width="1%">:</td>
       <td width="62%"><input name="id_permohonan" type="text" size="30" value="<?php echo $otomatisKode; ?>" readonly></td>
    </tr>
    <tr>
      <td width="37%" height="28">NIM</td>
      <td width="1%">:</td>
      <td width="62%">
        <input  name="nim_alumni" value="<?php echo $_SESSION['SES_USER']; ?>" type="text" size="20" maxlength="15" readonly> 
      </td>
    </tr>
    <tr>
      <td width="37%" height="28">Tanggal Permohonan</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="date" name="tgl_permohonan" id="tanggal" value="<?php echo $tanggal2;?>" readonly/>
      </td>
    </tr>
     <tr>
    <td width="37%" height="29">Legalisir Untuk</td>
    <td width="1%">:</td>
    <td width="62%">
      <select name="hal" id="hal">
        <?php if ($_GET['hal']=="") {
          ?>
          <option value="-">-Pilih-</option>
          <?php
        }else{
          ?>
          <option value="<?php echo $_GET['hal']; ?>"><?php echo $_GET['hal']=="skl" ? "Surat Keterangan Lulus" : "Ijazah"; ?></option>
          <?php 
        }
        ?>
        <option value="ijazah">Ijazah</option>
        <option value="skl">Surat Keterangan Lulus</option>
      </select>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#hal').on('change', function(){
        var value = $(this).val();
        location.href='?page=tambah_permohonan&hal='+value;
      });
    });
    </script>
    </td>
    <?php if ($_GET['hal']=="ijazah") {?>
    <tr>
      <td width="37%" height="28">File</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="file" name="flIjazah" />
      </td>
    </tr>
      <?php
    } ?>
  </tr>
  <tr><td colspan="3" height="20px"></td></tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="62%">
      <input name="btnSimpan" type="submit" value="Simpan">
      <input name="btnBatal" type="reset" onclick="window.location.href='?page=data_permohonan'" value="Batal" />
    </td>
  </tr>
</table>
</form>

<?php
if ($_POST['btnSimpan']=="Simpan") 
{ 
   $tipe_file   = $_FILES['flIjazah']['type'];
    $nama_file   = $_FILES['flIjazah']['name']=="" ? "-" : $tgl.$_FILES['flIjazah']['name'];
    $lokasi_file = $_FILES['flIjazah']['tmp_name'];
    $direktori   = "ijazah/$nama_file"; 

  $id_permohonan  = $_POST['id_permohonan'];
  $tgl_permohonan = $_POST['tgl_permohonan'];
  $hal            = $_POST['hal'];
  $nim_alumni     = $_POST['nim_alumni'];
  if ($hal=="ijazah" && $nama_file=="-") {
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }else if ($id_permohonan==""||$tgl_permohonan==""||$hal==""||$nim_alumni==""){ 
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }
  else
  {
    $sql_insert ="INSERT INTO tb_permohonan (id_permohonan,tgl_permohonan,hal,nim_alumni,status,ijazah)
    VALUES ('$id_permohonan','$tgl_permohonan','$hal','$nim_alumni','Proses','$nama_file')";
    $query_insert=mysql_query($sql_insert) or die (mysql_error());
    if ($query_insert) {
      move_uploaded_file($lokasi_file,$direktori);
      $sql_insertNota =mysql_query("INSERT INTO tb_nota (id_permohonan,id_petugas,tgl_nota,jml_copy,biaya)
      VALUES ('$id_permohonan','-','0000-00-00','5','0')") or die (mysql_error());
    }
    echo "<script>alert('Data berhasil disimpan')</script>";
  }
   echo"<meta http-equiv='refresh' content='0; url=?page=detail_nota&hal=$hal&permohonan=$id_permohonan'>"; 
    // echo"<meta http-equiv='refresh' content='0; url=?page=tambah_stok&kd_rbg=$kode__p31&Qt=$qt'>";
}
}