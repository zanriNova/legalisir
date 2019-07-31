<?php
session_start();
if (!isset($SES_USER)=="")
{
  echo"<meta http-equiv='refresh' content='0;url=index.php'>";
}
else 
{ 
?>
<html>
<title>Legalisir</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font1.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel='stylesheet' href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<body class="w3-theme-l5">
  <!-- Navbar -->
  <div class="container">
    <div class="w3-top">
      <ul class="w3-navbar w3-theme-d2 w3-left-align ">
        <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
          <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        </li>
        <li>
          <a href="#" class="w3-padding-large w3-theme-d4">
            <img src="img/ft-umk.gif" alt="" width="35px" class="lgumk">
          </a>
        </li>
        <li>
          <div class="marquee">
            <marquee behavior="center" direction="1"><h5>APLIKASI LEGALISIR ONLINE ALUMNI DI FAKULTAS TEKNIK UNIVERSITAS MURIA KUDUS</h5></marquee>
          </div>
        </li>
        <li class="w3-hide-small w3-right">
          <?php
          if (!empty($_SESSION['SES_USER'])){
            ?>
            <a href="logout.php" class="w3-padding-large w3-hover-white" >LOGOUT&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
            <?php
          }else{
            ?>
            <a href="#" class="w3-padding-large w3-hover-white" data-toggle="modal" data-target="#myModal">LOGIN &nbsp;&nbsp;<i class="fa fa-sign-in"></i></a>
            <?php
          }
          ?>
        </li>
      </ul>
      <div class="hborder1"></div>
      <?php include 'logreg.php'; ?>
    </div>
    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
      <!-- The Grid -->
      <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
          <!-- Profile -->
          <?php 
          if ($_SESSION['SES_USER']!=""){
            include 'profil.php';
          }else{
            include 'public_left.php';
          }
          ?>
          <!-- Interests -->
          <div class="tag">
          </div>
          <br>
        </div>
        <!-- Middle Column -->
        <div class="w3-col m9">
          <?php 
          if ($_SESSION['SES_USER']!=""){
            echo "<div class='content1'>";
            include 'page_menu.php';
            echo "</div>";
          }else{
            ?>
            
             <?php 
             echo  '<center><div class="w3-col m6" >';
             include 'home.php';
             echo '</center>';
             include 'hcontent.php'; 
             ?>
            
            <?php
          }
          ?>
          <!-- End Middle Column -->
        </div>
        <!-- Right Column -->
        <!-- End Right Column -->
      </div>
      <!-- End Grid -->
    </div>
    <!-- End Page Container -->
    <br>
    <!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-10">
      <center><h6>APLIKASI LEGALISIR ONLINE ALUMNI DI FAKULTAS TEKNIK UNIVERSITAS MURIA KUDUS</h6></center>
    </footer>
    <script type="text/javascript" src="js/custom.js"></script>
  </div>
</body>
</html>
<?php 
}
?>
