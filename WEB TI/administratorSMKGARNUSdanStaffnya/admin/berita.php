
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
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buat Berita</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left">

                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                        </div>
                      </div>
								<div class="clearfix"></div>
							</div>
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Isi</label>
							<div class="x_content">
								<div id="alerts"></div>
								<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
										<ul class="dropdown-menu">
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li>
												<a data-edit="fontSize 5">
													<p style="font-size:17px">Huge</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 3">
													<p style="font-size:14px">Normal</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 1">
													<p style="font-size:11px">Small</p>
												</a>
											</li>
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
										<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
										<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
										<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
										<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
										<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
										<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
										<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
										<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
										<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
										<div class="dropdown-menu input-append">
											<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
											<button class="btn" type="button">Add</button>
										</div>
										<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
										<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
										<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
									</div>
								</div>

								<div id="editor-one" class="editor-wrapper"></div>

								<textarea name="descr" id="descr" style="display:none;"></textarea>

								<br />
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tag</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask' : '9999-9999-9999-9999'">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Lampiran</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" name="" id="" placeholder="" class="form-control-file" aria-describedby="fileHelpId">
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- /form input mask -->
                
                <!-- end of weather widget -->
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