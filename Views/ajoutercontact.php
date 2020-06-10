<!DOCTYPE html>
<html lang="en">
  <?php 
  include __DIR__ .'/head.php';
  ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		<?php
		include __DIR__ . '/left.php';
		?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$_GET['Action'];?> un Contact</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
              
                  <div class="x_content">
                    <br />
                   
                    <form action="index3.php?Action=<?=$FormAction;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<input value="<?php echo $row["id"];?>" type="hidden" id="id" name="id" />
						<input value="<?=$FormAction;?>" type="hidden" id="Action" name="Action" />
                        <?php if($_SESSION['type'] != 3) { ?>
                            <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">partenaires</label>

                                        <div class="col-md-6 col-sm-6 ">
                                        <select name="idPartenaire" class="form-control" >
                                        <?php

                                        foreach($rownomSociete as $rowpartenaire)
                                        {?>
                                        <option <?php if($rowpartenaire['id']== $row["idPartenaire"]) echo 'selected';?> value='<?=$rowpartenaire['id'];?>' ><?=$rowpartenaire['nomSociete'];?></option>
                                        <?php }?>
                                        </select>
                                        </div>
                            </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">User</label>

                            <div class="col-md-6 col-sm-6 ">
                                <select name="idUser" class="form-control">
                                    <?php
                                    foreach($rownomUser as $rowuser)
                                    {?>
                                        <option <?php if($rowuser['id']== $row["idUser"]) echo 'selected';?> value='<?=$rowuser['id'];?>' ><?=$rowuser['nom'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <?php }  else { ?>

                            <input  name="idPartenaire" type="hidden"  value="<?=$_SESSION["partenaire"];?>" />
                            <input  name="idUser" type="hidden"  value="<?=$_SESSION["id"];?>" />

                            <?php }?>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">comentaire</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["comentaire"];?>" id="comentaire" name="comentaire" autocomplete="off" class="form-control" type="text" name="middle-name">
                        </div>
                      </div>


                      <div class="item form-group">
                      <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">date</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input value="<?php echo $row["date"];?>" id="date" name="date"   autocomplete="off" class="form-control" type="date" name="middle-name">
                      </div>
                      </div>
					  

                     
                  
                  



                  <div class="ln_solid"></div>
                  <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                  <a class="btn btn-primary" href="index3.php">Cancel</a>

                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                  </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

                  <!-- /page content -->

                  <?php
		include __DIR__ .'/footer.php';
		?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
