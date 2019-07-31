<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  $idper=$_GET['Gid_permohonan'];
  $sql =mysql_query ("SELECT p.*,a.* FROM tb_alumni a LEFT JOIN tb_permohonan p ON(p.nim_alumni=a.nim_alumni) 
    WHERE id_permohonan='".$_GET['Gid_permohonan']."'") or die(mysql_error());
  $data= mysql_fetch_array($sql);
  ?>
  <style type="text/css">
  caption {font-size:x-large}
  </style>
  <h2 align="center">Ubah Data Permohonan</h2>
  <br>
  <form name="frm_permohonan" method="POST" action="" enctype="multipart/form-data">
    <table width="700" align="center">
      <tr>
        <td colspan="3" align="center" class="line"></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td width="39%" height="28">Nomor Permohonan</td>
        <td width="2%">:</td>
        <td width="59%">
          <input value="<?php echo $data['id_permohonan'] ?>" name="id_permohonan" type="text" size="30" readonly>
        </td>
      </tr>
      <tr>
        <td width="39%" height="28">NIM</td>
        <td width="2%">:</td>
        <td width="59%">
          <input value="<?php echo $data['nim_alumni'] ?>" name="nim_alumni" type="text" size="30" readonly>
        </td>
      </tr>
      <tr>
        <td width="39%" height="28">Nama Alumni</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="text" value="<?php echo $data['nm_alumni'] ?>" name="nm_alumni" <?php echo $_SESSION['SES_LEVEL']!='alumni'? 'readonly' :'readonly'; ?>/>
        </td>
      </tr>
      <tr>
        <td width="39%" height="28">Tanggal Permohonan</td>
        <td width="2%">:</td>
        <td width="59%">
          <input type="date" value="<?php echo $data['tgl_permohonan'] ?>" name="tgl_permohonan" <?php echo $_SESSION['SES_LEVEL']!='alumni'? 'readonly' :'readonly'; ?>/>
        </td>
      </tr>
      <tr>
        <td width="39%">Hal</td>
        <td width="2%">:</td>
        <td width="59%"> 
          <?php 
          if($_SESSION['SES_LEVEL']!='alumni'){
            echo '<input name="hal" value="'.$data['hal'].'" type="text" readonly/>';
            if($_GET['hal']=='skl'){
              echo '<a href="" data-toggle="modal" data-target="#cetak_skl"><i class="fa fa-print"></i> CETAK</a>';
              ?>
              <div class="modal fade" id="cetak_skl" role="dialog" aria-hidden="true">
                <div class="modal-dialog ctk">
                  <div class="modal-content">
                    <div class="modal-header nota tebal" >
                      <i class="fa fa-edit fa-3x fa-fw"></i> FORM CETAK SKL
                    </div>
                    <div id="printThis" class="modal-body">
                      <center>
                        <table>
                          <tr>
                            <td>No Surat</td>
                            <td>:</td>
                            <td><input type="text" name="no_surat" value="NO.1117/FT.UMK/A.52.361/IX/2016" size="34"></td>
                          </tr>
                          <tr>
                            <td>Bulan-Tahun</td>
                            <td>:</td>
                            <td><input type="text" name="bl_th"></td>
                          </tr>
                          <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><input type="text" name="nim" value="<?php echo $data['nim_alumni']; ?>" readonly></td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama" value="<?php echo $data['nm_alumni']; ?>" readonly></td>
                          </tr>
                          <tr>
                            <td>Progdi</td>
                            <td>:</td>
                            <td><input type="text" name="progdi" value="<?php echo $data['progdi']; ?>" readonly></td>
                          </tr>
                          <tr>
                            <td>IP</td>
                            <td>:</td>
                            <td><input type="text" name="ip"></td>
                          </tr>
                          <tr>
                            <td>Dekan</td>
                            <td>:</td>
                            <td><input type="text" name="dekan" value="Moh. Dahlan ST. MT." size="25"></td>
                          </tr>
                          <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><input type="text" name="nis" value="0610701000001141" size="16"></td>
                          </tr>
                        </table>
                      </center>
                    </div>
                    <div class="modal-footer">
                      <a href="" id="print_skl" class="btn btn-default"><i class="fa fa-print"></i>&nbsp;PRINT</a>
                      <script type="text/javascript">
                      $("#print_skl").on('click',function () {
                        var a =$('input[name="no_surat"]').val();
                        var b =$('input[name="bl_th"]').val();
                        var c =$('input[name="nim"]').val();
                        var d =$('input[name="nama"]').val();
                        var e =$('input[name="ip"]').val();
                        var f =$('input[name="dekan"]').val();
                        var g =$('input[name="nis"]').val();
                        var h =$('input[name="progdi"]').val();
                        if (a!=''&& b!=''&& c!=''&& d!=''&& e!=''&& f!=''&& g!='') {
                          window.open('laporan/surat_skl.php?no_surat='+a+'&bl_th='+b+'&nim='+c+'&nama='+d+'&ip='+e+'&dekan='+f+'&nis='+g+'&progdi='+h);
                        }else{
                          alert('Lengkapi Data Form Cetak SKL!!!');
                        }
                      });
                      </script>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }else{
            echo '<input type="hidden" value="'.$idper.'" id="iddata">';
            ?>
            <select name="hal" id="hal">
              <?php 
              if ($_GET['hal']=="") {
                ?>
                <option value="<?php echo $data['hal']=="skl" ? "skl" : "ijazah";?>"><?php echo $data['hal']=="skl" ? "Surat Keterangan Lulus" : "Ijazah";?></option>
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
                location.href='?page=ubah_permohonan&hal='+value+'&Gid_permohonan='+$('#iddata').val();
              });
            });
            </script>
            <?php
          } 
          ?>
        </td>
      </tr>
      <?php 
      if ($_GET['hal']=="ijazah") {
        if ($_SESSION['SES_LEVEL']=='alumni') {
          ?>
          <tr>
            <td width="37%" height="28">File</td>
            <td width="1%">:</td>
            <td width="62%">
              <input type="hidden" name="flIjazah2" value="<?php echo $data['ijazah']; ?>"/>
              <img src="ijazah/<?php if($data['ijazah']==""||$data['ijazah']=="-"){echo 'none.png';}else{ echo $data['ijazah'];}  ?>" class="ijasah">
              <input type="file" name="flIjazah"/>
            </td>
          </tr>
          <?php
        }else{
         ?>
         <tr>
          <td width="37%" height="28">File</td>
          <td width="1%">:</td>
          <td width="62%">
            <input type="hidden" name="flIjazah2" value="<?php echo $data['ijazah']; ?>"/>
            <img src="ijazah/<?php if($data['ijazah']==""||$data['ijazah']=="-"){echo 'none.png';}else{ echo $data['ijazah'];} ?>" class="ijasah">
          </td>
        </tr>
        <?php
      }
    }
    ?>
    <tr>
      <td width="39%">Status</td>
      <td width="2%">:</td>
      <td width="59%">
        <?php 
        if ($_SESSION['SES_LEVEL']!='alumni') {
          ?>
          <select name="status">
            <option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
            <option value="Proses">Proses</option>
            <option value="Selesai">Selesai</option>
          </select>
          <?php
        }else{
          echo '<input type="hidden" value="'.$data['status'].'" name="status">';
          echo $data['status'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td width="39%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td width="59%">
        <?php 
        if($_SESSION["SES_LEVEL"]=="alumni"){
          ?>
          <input name="btnUbah" type="submit" value="Ubah" class="btn btn-primary">
          <?php
        }else{
          ?>
          <a href="" data-toggle="modal" data-target="#myModalpermohonan" class="btn btn-primary">Simpan</a>
          <?php
        }
        ?>
        <input name="btnBatal" type="reset" onclick="window.location.href='?page=data_permohonan'" value="Batal" class="btn btn-primary"/>
      </td>
    </tr>
  </table>
  <div class="modal fade" id="myModalpermohonan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ctk">
      <div class="modal-content">
        <div class="modal-header nota tebal" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> Verifikasi Legalisir
        </div>
        <div id="printThis" class="modal-body">
          <center>
            <table>
              <tr>
                <td>Hasil verifikasi</td>
                <td>:</td>
                <td><input type="text" name="verifikasi_legalisir"></td>
              </tr>
              <tr>
                <td>Biaya</td>
                <td>:</td>
                <td><input type="text" name="biaya"></td>
              </tr>
            </table>
          </center>
        </div>
        <div class="modal-footer">
          <input name="btnUbah" type="submit" value="Ubah" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div>
</form>
<?php
if($_POST['btnUbah'] == "Ubah") {
  $id_permohonan        = $_REQUEST['id_permohonan'];
  $tgl_permohonan       = $_REQUEST['tgl_permohonan'];
  $hal                  = $_REQUEST['hal'];
  $nim_alumni           = $_REQUEST['nim_alumni'];
  $biaya                = $_REQUEST['biaya'];
  $verifikasi_legalisir = $_REQUEST['verifikasi_legalisir'];
  if($hal == "skl"){
    $nama_file ="-";
  }else{
    $tipe_file   = $_FILES['flIjazah']['type'];
    $nama_file   = $_FILES['flIjazah']['name']=="" ? $_POST['flIjazah2'] : $tgl.$_FILES['flIjazah']['name'];
    $lokasi_file = $_FILES['flIjazah']['tmp_name'];
    $direktori   = "ijazah/$nama_file"; 
  }
  if (($hal=="ijazah" && $nama_file=="-") || ($hal=="ijazah" && $nama_file=="")) {
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }else if ($id_permohonan==""|| $tgl_permohonan ==""|| $hal==""|| $nim_alumni ==""){ 
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }else if($_SESSION['SES_LEVEL']!='alumni' && ( $biaya==''|| $verifikasi_legalisir=='')){
    echo "<script>alert('Maaf Data Tidak Boleh Kosong!!!')</script>";exit;
  }
  else
  {
    $dataqr = array(
      'id' =>  $id_permohonan
      ,'nama'=> $_REQUEST['nm_alumni']
      ,'copy'=> 5
      ,'biaya'=> number_format($biaya,2,",",".")
      ,'st'=> $_REQUEST['status']
      );
    include 'phpqrcode/generateqrcode.php'; 
    $sql_update    = "UPDATE tb_permohonan set 
    tgl_permohonan = '$tgl_permohonan'
    ,nim_alumni    = '$nim_alumni'
    ,hal           = '$hal'
    ,status        = '".$_POST['status']."'
    ,ijazah        = '$nama_file'

    WHERE id_permohonan = '$id_permohonan' ";
    $query_update = mysql_query($sql_update) or die(mysql_error());
    if ($query_update)
    {
      move_uploaded_file($lokasi_file,$direktori);
      if($_POST["status"]=="Selesai"){
        $sql_insertNota =mysql_query("UPDATE tb_nota set 
          id_petugas = '".$_SESSION['SES_USER']."'
          ,biaya = '$biaya'
          ,tgl_nota = '".date('Y-m-d')."' WHERE id_permohonan='$id_permohonan' ") or die (mysql_error()); 
        if ($sql_insertNota) {
          $d1         = mysql_query("SELECT id_nota from tb_nota WHERE id_permohonan='$id_permohonan'")or die(mysql_error());
          $ids1       = mysql_fetch_array($d1);
          $d2         = mysql_query("SELECT max(id_pengumuman) as no from tb_pengumuman")or die(mysql_error());
          $ids2       = mysql_fetch_array($d2);
          $lastID     = $ids2['no'];
          $lastNoUrut = substr($lastID, 3, 3);
          $nextNoUrut = $lastNoUrut + 1;
          //dapatkan format tanggal hari ini
          $tanggal=date("dmy");
          $otomatisKode= "PU-".sprintf("%003s",$nextNoUrut)."/".$tanggal;

          $sql_insertVerifikasi ="INSERT INTO tb_pengumuman (id_pengumuman,id_nota,nim_alumni,verifikasi_legalisir)
          VALUES ('$otomatisKode','".$ids1["id_nota"]."','$nim_alumni','$verifikasi_legalisir')";
          $query_insert=mysql_query($sql_insertVerifikasi) or die (mysql_error());
          include 'kirim-email/email.php';
        }
      }
      echo"<script> alert ('Ubah Data Berhasil !')</script>";
      echo"<meta http-equiv='refresh' content='0; url=?page=detail_nota&hal=$hal&permohonan=$id_permohonan'>";
        // echo"<meta http-equiv='refresh' content='0; url=?page=data_permohonan'>";
    } 
  }
} 
} 
