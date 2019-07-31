<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
// 	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $query      = mysql_query('SELECT max(id_p16) as terakhir from tb_p16');
  $data       = mysql_fetch_array($query);
  $lastID     = $data['terakhir'];
  $lastNoUrut = substr($lastID, 6, 3);
  $nextNoUrut = $lastNoUrut + 1;
//dapatkan format tanggal hari ini
  $tanggal=date("d/m/y");
  $otomatisKode= "PRINT8-".sprintf("%003s",$nextNoUrut)."/O.3.18/Fu.".$tanggal;
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>
  
  <h2 align="center">Input Data P-48</h2>
<br>
  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
    <table width="700" align="center">
      <tr>
        <td colspan="3" align="center" style="background-color:green">P-48</td>
      </tr>
      <tr>
       <td width="37%" height="28">Nomor P-48</td>
       <td width="1%">:</td>
       <td width="62%"><input name="id_p48" type="text" size="30" value="<?php echo $otomatisKode; ?>" readonly></td>
    </tr>
    <tr>
      <td width="37%" height="28">Tanggal P-48</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="date" name="tgl_p48" id="tanggal"/>
      </td>
    </tr>
    <tr>
      <td width="37%" height="28">Tanggal Hukum</td>
      <td width="1%">:</td>
      <td width="62%">
        <input type="date" name="tgl_hukum" id="tanggal"/>
      </td>
    </tr>
    <tr>
     <td width="37%">Nama Tersangka</td>
     <td width="1%">:</td>
     <td width="62%">
      <input type="hidden" name="id_identitas" size="30" >
      <input type="text" name="nm_tersangka" size="30" readonly>
      <a href=# class="style1" onClick="window.open('menu_admin/pop/p_identitas.php?in=p48&di=tambah', 'p48','menubar=0,toolbar=0,scrollbars=1,width=800,height=400,top=200,left=200')">Pilih</a>
    </td>
  </tr>
  <tr>
    <td width="37%" height="28">Keperluan untuk</td>
    <td width="1%">:</td>
    <td width="62%">
      <textarea name="untuk" cols="50" rows="3"></textarea>            
    </td>
  </tr>
  <tr>
    <td height="27" colspan="3" align="center" style="background-color:green">Jaksa Penuntut Umum</td>
  </tr>
  <tr>
    <td width="37%">Nama Jaksa</td>
    <td width="1%">:</td>
    <td width="62%">
      <input type="hidden"  name="id_jaksa" size="30"  >
      <input type="text"  name="nm_jaksa" size="30"  readonly="readonly">
      <a href=# class="style1" onClick="window.open('menu_admin/pop/p_jaksa.php?in=p48&di=tambah', 'p34','menubar=0,toolbar=0,scrollbars=1,width=800,height=400,top=200,left=200')">Pilih</a>
    </td>
  </tr>
  <tr>
    <td width="37%" height="29">Pangkat/NIP</td>
    <td width="1%">:</td>
    <td width="62%">
      <input  name="pangkat" type="text" size="20" maxlength="15" readonly> 
      /
      <input  name="nip" type="text" size="25" readonly>
    </td>
  </tr>
  <tr>
    <td width="37%">Jabatan</td>
    <td width="1%">:</td>
    <td width="62%">
      <input type="text"  name="jabatan" size="30"  readonly="readonly">
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