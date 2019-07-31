<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $query      = mysql_query('SELECT max(id_pengumuman) as terakhir from tb_pengumuman');
  $data       = mysql_fetch_array($query);
  $lastID     = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 3);
  $nextNoUrut = $lastNoUrut + 1;
//dapatkan format tanggal hari ini
  $tanggal=date("dmy");
  $otomatisKode= "PU-".sprintf("%003s",$nextNoUrut)."/".$tanggal;
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>
  
  <h2 align="center">Input Data Pengumuman</h2>
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
       <td width="37%" height="28">ID Pengumuman</td>
       <td width="1%">:</td>
       <td width="62%"><input name="id_pengumuman" type="text" size="30" value="<?php echo $otomatisKode; ?>" readonly></td>
     </tr>
     <tr>
      <td width="37%" height="28">ID Nota</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="text" name="id_nota" id="tanggal"  readonly="readonly"/>
      </td>
    </tr>
    <tr>
      <td width="37%" height="28">ID Petugas</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="text" name="id_petugas" id="tanggal" readonly="readonly"/>
      </td>
    </tr>
    <tr>
      <td width="37%">NIM Alumni</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="hidden"  name="id_jaksa" size="30"  >
        <input type="text"  name="nm_jaksa" size="30"  readonly="readonly">
        <a href=# class="style1" onClick="window.open('menu_admin/pop/p_jaksa.php?in=p48&di=tambah', 'p34','menubar=0,toolbar=0,scrollbars=1,width=800,height=400,top=200,left=200')">Pilih</a>
      </td>
    </tr>
    <tr>
      <td width="37%" height="29">Jumlah</td>
      <td width="1%">:</td>
      <td width="62%">
        <input  name="jumlah" type="text" size="20" maxlength="15" readonly> 
      </td>
    </tr>
    <tr>
      <td width="37%">Verifikasi Legalisir</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="text"  name="verifikasi_legalisir" size="30"  >
      </td>
    </tr>
    <tr>
      <td width="37%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="62%">
        <input name="btnSimpan" type="submit" value="Simpan">
        <input name="btnBatal" type="reset" onclick="window.location.href='?page=tab_eksekusi'" value="Batal" />
      </td>
    </tr>
  </table>
</form>

<?php
if ($_POST['btnSimpan']=="Simpan") 
{ 
  $id_p48       = $_POST['id_p48'];
  $tgl_p48      = $_POST['tgl_p48'];
  $id_identitas = $_POST['id_identitas'];
  $tgl_hukum    = $_POST['tgl_hukum'];
  $untuk    = $_POST['untuk'];
  $id_jaksa     = $_POST['id_jaksa'];


  if ($id_p48==""||$tgl_p48==""||$id_identitas==""||$tgl_hukum==""||$untuk==""||$id_jaksa=="")
  {
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }
  else
  {
    $sql_insert ="INSERT INTO tb_p48 (id_p48,tgl_p48,id_identitas,tgl_hukum,untuk,id_jaksa)
    VALUES ('$id_p48','$tgl_p48','$id_identitas','$tgl_hukum','$untuk','$id_jaksa')";
    $query_insert=mysql_query($sql_insert) or die (mysql_error());
    echo "<script>alert('Data berhasil disimpan')</script>";
  }
    // echo"<meta http-equiv='refresh' content='0; url=?page=tambah_stok&kd_rbg=$kode__p31&Qt=$qt'>";
  echo"<meta http-equiv='refresh' content='0; url=?page=tab_eksekusi'>";
}
}