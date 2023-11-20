
<!-- <div class="form-group">
  <label for=""></label>
  <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">Help text</small>
</div> -->
<?php
        include "head.php";
        if($_SESSION['login'] == true){
          if($_SESSION['kedudukan'] == "admin" || $_SESSION['kedudukan'] == "superadmin"){
        ?>
        <!-- page content -->
        
        <div class="right_col" role="main">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buat Berita</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form method="POST" action="addberita.php" class="form-horizontal form-label-left">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="judul_berita" class="form-control" data-inputmask="'mask': '99/99/9999'">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Preview</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" name="preview" id="" placeholder="" class="form-control-file" aria-describedby="fileHelpId">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" name="buat" class="btn btn-success">Buat</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- /form input mask -->
                
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Berita</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 p-2 x_title row" style="background:lightgrey;border-radius:6px;max-height:120px;">
                            <img src="../foto/download.jpg" height="90px">
                            <a href="#" class="align-self-start mx-2">Berita</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "foot.php";
}else{
  header('Location: ../index.php?error=NoAccess');
  exit();
}
}else{
  header('Location: ../index.php?error=SessionEnd');
  exit();
}
?>