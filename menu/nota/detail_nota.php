<?php
// session_start();
// if (isset($_SESSION['SES_USER'])=="")
// {
//   echo"<meta http-equiv='refresh' content='0;url=index.php'>";
// }
// else 
{ 
  include 'koneksi.php';
  setlocale(LC_MONETARY,"en_US");

  $sql = mysql_query("SELECT * FROM tb_nota n Left Join tb_permohonan p on(n.id_permohonan=p.id_permohonan)
    WHERE p.id_permohonan='".$_GET['permohonan']."'") or die(mysql_error());
  $data= mysql_fetch_array($sql);
  $sql2 = mysql_query("SELECT * FROM tb_alumni WHERE nim_alumni='".$data['nim_alumni']."'") or die(mysql_error());
  $data2= mysql_fetch_array($sql2);
  // function cur(a){

  // }
  ?>

  <style type="text/css">
  caption {font-size:x-large}

  @media screen {
    #printSection {
      display: none;
    }
  }
  @media print {
    body * {
      visibility:hidden;
    }
    #printSection, #printSection * {
      visibility:visible;
    }
    #printSection {
      position:absolute;
      left:0;
      top:0;
    }
  }
  </style>

  <h2 align="center">Detail Nota</h2>
  <br>

  <form name="frm_p48" method="post" action="" enctype="multipart/form-data">
    <div id="tglNota">
     <table width="600" align="center">
       <tr>
        <td class="line" colspan="3"></td>
      </tr>
      <tr><td><br></td></tr>
      <tr class="tebal">
        <td> Tanggal : <?php echo date("Y-m-d"); ?></td>
        <td> Status Permohonan : 
          <?php 
          echo $data['status']=="Proses" ? $data['status'] : '<font color="#10b715">'.$data['status'];
          if ($data['status']=="Selesai") {
            echo "  ( ".$data["tgl_nota"]." )";
          }
          ?>
        </td>
      </tr>
      <tr><td><br></td></tr>
    </table>
  </div>
  <?php 
  if($_GET["hal"]=="ijazah"){
    ?>
    <div class="notas">
      <table  width="600" align="center" border="1" class="strip">
        <tr align="center" class="tebal header2"><td colspan="2"> Permohonan Legalisir Ijazah</td></tr>
        <!-- <tr>
          <td width="46%" height="28">Id Nota</td>
          <td width="52%"><?php  ?>
          </td>
        </tr> -->
        <tr>
          <td width="46%" height="28">Id Permohonan</td>
          <td width="52%"><?php echo $data['id_permohonan'] ?>
          </td>
        </tr>
        <tr>
          <td width="46%" height="28">Nama Pemohon</td>
          <td width="52%"><?php echo $data2['nm_alumni'] ?>
          </td>
        </tr>
        <tr>
          <td width="46%" height="28">Jumlah Copy</td>
          <td width="52%"><?php echo $data['jml_copy']." Lembar"; ?>
          </td>
        </tr>
        <?php
        if($data['status']=='Proses'){
        }else{
          ?>
          <tr class="tebal">
            <td width="46%">Biaya</td>
            <td width="52%"><?php 
            echo "Rp.".number_format($data['biaya'],2,",","."); 
            ?>
          </td>
        </tr>
        <?php 
      }
      ?>
      </table>
    </div>
    <?php
  }else if($_GET["hal"]=="skl"){
    ?>
    <div class="notas">
      <table  width="600" align="center" border="1" class="strip">
        <tr align="center" class="tebal header"><td colspan="2"> Permohonan Legalisir Surat Keterangan Lulus </td></tr>
        <!-- <tr>
          <td width="46%" height="28">Id Nota</td>
          <td width="52%"><?php  ?>
          </td>
        </tr> -->
        <tr>
          <td width="46%" height="28">Id Permohonan</td>
          <td width="52%"><?php echo $data['id_permohonan'] ?>
          </td>
        </tr>
        <tr>
          <td width="46%" height="28">Nama Pemohon</td>
          <td width="52%"><?php echo $data2['nm_alumni'] ?>
          </td>
        </tr>
        <tr>
          <td width="46%" height="28">Jumlah Copy</td>
          <td width="52%"><?php echo $data['jml_copy']." Lembar"; ?>
          </td>
        </tr>
        <?php 
        if($data['status']=='Proses'){
        }else{
          ?>
          <tr class="tebal">
            <td width="46%">Biaya</td>
            <td width="52%"><?php 
              echo "Rp.".number_format($data['biaya'],2,",",".");
              ?>
            </td>
          </tr>
          <?php
        }
         ?>
      </table>
    </div>
    <?php
  } 
  $dataqr = array(
    'id' =>  $data['id_permohonan']
  ,'nama'=> $data2['nm_alumni']
  ,'copy'=> $data['jml_copy']
  ,'biaya'=> number_format($data['biaya'],2,",",".")
  ,'st'=> $data['status']
   );
  ?>

  <hr>
  <table width="100%">
    <tr>
     <td width="52%" colspan="3">
      <?php if ($_GET["nota"]=="1"){?>
      <input class="btn btn-default" name="btnBatal" type="reset" onclick="window.location.href='?page=data_nota'" value="<<" />
      <?php }else{ ?>
      <input class="btn btn-default" name="btnBatal" type="reset" onclick="window.location.href='?page=data_permohonan'" value="<<" />
      <?php }?>
    </td>
    <td align="right">
      <!-- <a href="jcode/code?id=<?php ?>&nota=1" class="btn btn-success"> -->
      <a href="phpqrcode/generateqrcode.php?id=<?php echo implode($dataqr, '_'); ?>&nota=1" class="btn btn-success">
        <i class="fa fa-print"></i> &nbsp;Barcode
      </a>
      <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal2" id="prev-nota">
        <i class="fa fa-print"></i> &nbsp;PREVIEW
      </a>
    </td>
  </tr>
</table>
</form>
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ctk">
    <div class="modal-content modal-lg">
      <div class="modal-header nota">
        <h2 align="center">Detail Nota</h2>
      </div>
      <div id="printThis" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" id="Print" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  $("#prev-nota").click(function(){
    var a = $("#tglNota").html();
    var b = $(".notas").html();
    $("#printThis").html(a+b);
  });
});
document.getElementById("Print").onclick = function () {
  printElement(document.getElementById("printThis"));
};
function printElement(elem) {
  var domClone = elem.cloneNode(true);
  var $printSection = document.getElementById("printSection");
  if (!$printSection) {
    var $printSection = document.createElement("div");
    $printSection.id = "printSection";
    document.body.appendChild($printSection);
  }
  $printSection.innerHTML = "";
  $printSection.appendChild(domClone);
  window.print();
}
</script>
<?php
} 
?>

