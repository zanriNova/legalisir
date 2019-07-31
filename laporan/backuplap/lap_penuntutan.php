

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#page1" data-toggle="tab">Data P16A</a></li>
        <li><a href="#page2" data-toggle="tab">Data T7</a></li>
        <li><a href="#page3" data-toggle="tab">Data BA18</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="page1">
          <?php include 'menu_admin/p16a/data_p16a.php';?>
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="page2">
          <?php include 'menu_admin/t7/data_t7.php';?>
        </div>
        <div class="tab-pane" id="page3">
          <?php include 'menu_admin/ba18/data_ba18.php';?>
        </div><!-- /.tab-pane -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
