<!DOCTYPE html>
<html>
<head>
    <title>Scanner demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    .scanner-laser{
        position: absolute;
        margin: 40px;
        height: 30px;
        width: 30px;
    }
    .laser-leftTop{
        top: 0;
        left: 0;
        border-top: solid red 5px;
        border-left: solid red 5px;
    }
    .laser-leftBottom{
        bottom: 0;
        left: 0;
        border-bottom: solid red 5px;
        border-left: solid red 5px;
    }
    .laser-rightTop{
        top: 0;
        right: 0;
        border-top: solid red 5px;
        border-right: solid red 5px;
    }
    .laser-rightBottom{
        bottom: 0;
        right: 0;
        border-bottom: solid red 5px;
        border-right: solid red 5px;
    }
    </style>
</head>
<body>
    <div class="page-header">
        <h1 style="margin-left:10px;">QR-CODE LEGALISIR UMK<br></h1>

    </div>
    <div id="QR-Code" class="container" style="width:100%">
        <div class="panel panel-primary">
            <div class="panel-heading" style="display: inline-block;width: 100%;">
                <a class="btn btn-primary" style="float:left" href="../">HOME</a>
                <div style="width:80%;float:left;margin-top: 5px;margin-bottom: 5px;text-align: center;">
                    <!-- <select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select> -->
                    <!-- <button id="save" data-toggle="tooltip" title="Image shoot" type="button" class="btn btn-info btn-sm disabled"><span class="glyphicon glyphicon-picture"></span></button> -->
                    <button id="play" data-toggle="tooltip" title="Play" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></button>
                    <button id="stop" data-toggle="tooltip" title="Stop" type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12" style="text-align: center;">
                    <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas id="qr-canvas" width="320" height="240"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="result" class="thumbnail">
                            <div class="well" style="position: relative;display: inline-block;">
                                <img id="scanned-img" src="" width="320" height="240">
                            </div>
                            <div class="caption">
                                <h3>Scanned result</h3>
                                <p id="scanned-QR"></p>
                                <br>
                                <div class="btn btn-primary" id="cek_qr">CEK</div>
                                <div class="btn btn-primary" id="ref">CLEAR</div>
                                <br>
                                <div class="hasil">
                                    <p id="isiqr"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="well hide" style="position: relative;" >
                        <label id="zoom-value" width="100">Zoom: 2</label>
                        <input type="range" id="zoom" value="20" min="10" max="30" onchange="Page.changeZoom();"/>
                        <label id="brightness-value" width="100">Brightness: 0</label>
                        <input type="range" id="brightness" value="0" min="0" max="128" onchange="Page.changeBrightness();"/>
                        <label id="contrast-value" width="100">Contrast: 0</label>
                        <input type="range" id="contrast" value="0" min="0" max="64" onchange="Page.changeContrast();"/>
                        <label id="threshold-value" width="100">Threshold: 0</label>
                        <input type="range" id="threshold" value="0" min="0" max="512" onchange="Page.changeThreshold();"/>
                        <label id="sharpness-value" width="100">Sharpness: off</label>
                        <input type="checkbox" id="sharpness" onchange="Page.changeSharpness();"/>
                        <label id="grayscale-value" width="100">grayscale: off</label>
                        <input type="checkbox" id="grayscale" onchange="Page.changeGrayscale();"/>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/WebCodeCam.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>
<style type="text/css">
.well.hide{
    display: none;
}
.hasil{
    padding-top: 10px;
    text-align: left;
}
.panel-primary>.panel-heading {
    background-color: #ddd !important;
}
</style>
<script type="text/javascript">
$(document).ready(function () {
    $("#cek_qr").on('click',function () {
        var myArray = $("#scanned-QR").html().split('_');
        var id    = myArray[0];
        var nm_al = myArray[1];
        var cp    = myArray[2];
        var biaya = myArray[3];
        var st = myArray[4];
       $("#isiqr").html("<table align='center' >"+
        "<tr><td width='100px'>Status Legalisir</td><td></td><td style='font-weight:900'>"+st+"</td></tr>"+
        "<tr><td width='100px'><td><br></td></tr>"+
        "<tr><td width='100px'>ID</td><td>:</td><td>"+id+"</td></tr>"+
        "<tr><td>Nama Alumni</td><td>:</td><td>"+nm_al+"</td></tr>"+
        "<tr><td>Jumlah Copy</td><td>:</td><td>"+cp+" Lembar</td></tr>"+
        "<tr><td>Biaya</td><td>:</td><td>Rp. "+biaya+"</td></tr>"+
        "</table>");
    });
    $("#ref").on('click',function () {
    window.location.href='index.php';
    });
    
})
</script>