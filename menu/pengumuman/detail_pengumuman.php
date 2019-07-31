<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $sql = mysql_query("SELECT * FROM tb_pengumuman p LEFT JOIN tb_alumni i 
        ON(p.nim_alumni=i.nim_alumni) LEFT join tb_nota j ON(j.id_nota=p.id_nota)
    WHERE id_pengumuman='".$_GET['Gid_pengumuman']."'");
  $data= mysql_fetch_array($sql);
  ?>

  <style type="text/css">
  caption {font-size:x-large}
  </style>

  <h5 align="left">Detail Pengumuman</h5>
  <br>

  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
    <table width="600" align="center" >
     <tr>
      <td colspan="3" align="center" class="line"></td>
    </tr>
    <tr>
      <td colspan="3"><br></td>
    </tr>
    <tr class="bgpengumuman">
      <td colspan="3">
        <?php $sql_cek = mysql_query ("SELECT p.nm_petugas FROM tb_nota n LEFT JOIN tb_petugas p 
          ON(n.id_petugas=p.id_petugas) WHERE id_nota='".$data["id_nota"]."'") or die (mysql_error());
        $hasilCek = mysql_fetch_array($sql_cek);
        echo $hasilCek['nm_petugas']==""? "Admin": $hasilCek['nm_petugas'];
        echo " - ".'<dr>Fakultas Teknik UMK</dr>'; 
        ?>
      </td>
    </tr>
    <tr>
      <td ><br></td>
    </tr>
    <tr>
      <td colspan="3" align="center">
        <p>Selamat proses ID Permohonan : <dr><?php echo $data["id_permohonan"]; ?></dr>
          legalisir atas Nama : <dr><?php echo $data["nm_alumni"] ?></dr> telah selesai. <br>
          Harap Segera diambil di Sekretariat Teknik UMK dengan petugas piket. <br>
        </p>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <p><b>Cetak Barcode / Nota : </b>
          <br>1. Klik Permohonan
          <br>2. Pilih Detail
          <br>3. Klik Cek Status
          <br>4. Print Barcode
        </p>
      </td>
    </tr>
    <tr class="tebal">
      <td colspan="3" height="28">Verifikasi Legalisir : <dr><?php echo $data['verifikasi_legalisir'] ?></dr></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
      <td colspan="2">Sekretariatan Fakultas Teknik UMK</td>
      <td class="kanan">Fakultas Teknik UMK</td>
    </tr>
    <tr>
     <td colspan="3">
      <input class="btn btn-default" name="btnBatal" type="reset" onclick="window.location.href='?page=data_pengumuman'" value="<<" />
     </td>
   </tr>
 </table>
</form>

<?php
} 
?>

