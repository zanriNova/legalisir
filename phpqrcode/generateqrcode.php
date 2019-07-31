<?php 
// include 'koneksi.php';
if ($_GET['nota']==1) {
  $_REQUEST['data']=$_GET['id'];
  $lokasi = 'temp/'; 
}else{
  $_REQUEST['data']=implode($dataqr,'_');
  $lokasi = 'phpqrcode/temp/';
}

isset($_REQUEST['data'])? htmlspecialchars($_REQUEST['data']) :'No Data :)';
    //set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //html PNG location prefix
$PNG_WEB_DIR = $lokasi;
include "qrlib.php";    
    //ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
  mkdir($PNG_TEMP_DIR);
$filename = $PNG_TEMP_DIR.'test.png';
    //processing form input
    //remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
  $errorCorrectionLevel = $_REQUEST['level'];    
$matrixPointSize = 4;
if (isset($_REQUEST['size']))
  $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
if (isset($_REQUEST['data'])) { 
        //it's very important!
  if (trim($_REQUEST['data']) == '')
    die('data cannot be empty! <a href="?">back</a>');
        // user data
  $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
  QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
} else {    
        //default data
  echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
  QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
}    
$nm_qr = $PNG_WEB_DIR.basename($filename);
if ($_GET['nota']==1) {
  ?>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <div class="qrcodes"><hr><center><img src="<?php echo $nm_qr?>"/></center><hr/></div>
  <div class="tengah">
    <!-- <a href="dataURL" target="_blank" download="image.png">doenload</a> -->
    <!-- <a href="../?page=data_permohonan" class="btn btn-primary"><< BACK</a> -->
  </div>
  <br> 
  <style type="text/css">
  .qrcodes {margin-top:100px;}
  .tengah{
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  img {
    width: 300px;
    height: 300px;
  }
  .qrcodes hr{
    width: 300px;
  }
  </style>
  <?php
} 
?>