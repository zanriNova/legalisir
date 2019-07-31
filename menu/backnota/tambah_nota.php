<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $query      = mysql_query('SELECT max(id_nota) as terakhir from tb_jns_nota');
  $data       = mysql_fetch_array($query);
  $lastID     = $data['terakhir'];
  $lastNoUrut = substr($lastID, 2, 3);
  $nextNoUrut = $lastNoUrut + 1;
//dapatkan format tanggal hari ini
  $tanggal=date("d/m/y");
  $otomatisKode= "N-".sprintf("%003s",$nextNoUrut).'-'.$tanggal;
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>
  
  <h2 align="center">Input Data Jenis Nota</h2>
<br>
  <form name="frm_jns_nota" method="post" action="" enctype="multipart/form-data">
    <table width="700" align="center">
      <tr>
        <td colspan="3" align="center" style="background-color:green">Nota</td>
      </tr>
      <tr>
       <td width="37%" height="28">Nomor Nota</td>
       <td width="1%">:</td>
       <td width="62%"><input name="id_nota" type="text" size="30" value="<?php echo $otomatisKode; ?>" readonly></td>
    </tr>
    <tr>
     <td width="37%">Nama Nota</td>
     <td width="1%">:</td>
     <td width="62%">
      <input type="text" name="nm_nota" size="30" >
    </td>
  </tr>
  <tr>
    <td width="37%" height="29">Jumlah Copy</td>
    <td width="1%">:</td>
    <td width="62%">
      <input  name="jml_copy" type="text" size="20" maxlength="15" > 
    </td>
  </tr>
  <tr>
    <td width="37%">Biaya</td>
    <td width="1%">:</td>
    <td width="62%">
      <input type="text"  name="biaya" size="30" >
    </td>
  </tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="62%">
      <input name="btnSimpan" type="submit" value="Simpan">
      <input name="btnBatal" type="reset" onclick="window.location.href='?page=data_nota'" value="Batal" />
    </td>
  </tr>
</table>
</form>

<?php
if ($_POST['btnSimpan']=="Simpan") 
{ 
  $id_nota  = $_POST['id_nota'];
  $nm_nota  = $_POST['nm_nota'];
  $jml_copy = $_POST['jml_copy'];
  $biaya    = $_POST['biaya'];


  if ($id_nota==""||$nm_nota==""||$jml_copy==""||$biaya=="")
  {
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }
  else
  {
    $sql_insert ="INSERT INTO tb_jns_nota (id_nota,nm_nota,jml_copy,biaya)
    VALUES ('$id_nota','$nm_nota','$jml_copy','$biaya')";
    $query_insert=mysql_query($sql_insert) or die (mysql_error());
    echo "<script>alert('Data berhasil disimpan')</script>";
  }
    // echo"<meta http-equiv='refresh' content='0; url=?page=tambah_stok&kd_rbg=$kode__p31&Qt=$qt'>";
  echo"<meta http-equiv='refresh' content='0; url=?page=data_nota'>";
}
}