<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">LOGIN</a></li>
          <li><a data-toggle="tab" href="#menu1">REGISTRASI</a></li>
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <?php include 'login.php'; ?>
          </div>
          <div id="menu1" class="tab-pane fade">
            <?php include 'registrasi.php'; ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

