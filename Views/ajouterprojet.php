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
                <h3><?=$_GET['Action'];?> un Projet</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
            
                  <div class="x_content"> 
                    <br />
                    <form action="index4.php?Action=<?=$FormAction;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<input value="<?php echo $row["id"];?>" type="hidden" id="id" name="id" />
						<input value="<?=$FormAction;?>" type="hidden" id="Action" name="Action" />
                       
    
          
            <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">partenaires</label>

                            <div class="col-md-6 col-sm-6 ">
                            <select name="idPartenaire" class="form-control">
                            <?php
                            foreach($rownomSociete as $rowpartenaire)
                            {?>
                            <option <?php if($rowpartenaire['id']== $row["idPartenaire"]) echo 'selected';?> value='<?=$rowpartenaire['id'];?>' ><?=$rowpartenaire['nomSociete'];?></option>
                            <?php }?>
                            </select>
                            </div>
                    </div>


                    <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">pays</label>

                            <div class="col-md-6 col-sm-6 ">
                            <select name="pays" class="form-control">
                            <?php
                            foreach($rowspays as $rowpays)
                            {?>
                            <option <?php if($rowpays['id']== $row["nomPays"]) echo 'selected';?> value='<?=$rowpays['id'];?>' ><?=$rowpays['nom'];?></option>
                            <?php }?>
                            </select>
                            </div>
                    </div>


                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">nomProjet</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["nomProjet"];?>" id="nomProjet" name="nomProjet" autocomplete="off" class="form-control" type="text" name="middle-name">
                          </div>
                    </div> 



                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> nomContact <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $row["nomContact"];?>" type="text" id="nomContact" name="nomContact" required="required" autocomplete="off" class="form-control ">
                            </div>
                    </div>





                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">montant</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["montant"];?>" id="montant" name="montant"  autocomplete="off" class="form-control" type="number" name="middle-name">
                          </div>
                    </div>


                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">commentaire</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["commentaire"];?>" id="commentaire" name="commentaire" autocomplete="off" class="form-control" type="text" name="middle-name">
                          </div>
                    </div>

                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">remise</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["remise"];?>" id="remise" name="remise" autocomplete="off" class="form-control" type="text" name="middle-name">
                          </div>
                    </div>

                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">facture</label>
                          <div class="col-md-6 col-sm-6 ">
                          Oui : <input type="radio" class="flat" name="facture" id="facture" value="1" <?php if($row["facture"]) echo 'checked="checked"';?>  required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                     Non :  <input type="radio" class="flat" name="facture" id="facture" value="0"  <?php if(!$row["facture"]) echo 'checked="checked"';?> required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;">
                          </div>
                    </div>

                    <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">pieceJointe</label>
                            <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $row["pieceJointe"];?>" id="pieceJointe" name="pieceJointe" autocomplete="off" class="form-control" type="file" name="middle-name">
                            </div>
                    </div>

                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">dateFacture</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["dateFacture"];?>" id="dateFacture" name="dateFacture" autocomplete="off" class="form-control" type="date" name="middle-name">
                          </div>
                    </div>



                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">bandeCommande</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["bandeCommande"];?>" id="bandeCommande" name="bandeCommande" autocomplete="off" class="form-control" type="file" name="middle-name">
                          </div>
                    </div>

                    <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">dateCommande</label>
                          <div class="col-md-6 col-sm-6 ">
                          <input value="<?php echo $row["dateCommande"];?>" id="dateCommande" name="dateCommande" autocomplete="off" class="form-control" type="date" name="middle-name">
                          </div>
                    </div>


                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">statut<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                            <select name="statut" class="form-control">
                            <?php
                            foreach($rowsstatut as $rowstatut)
                            {?>
                            <option <?php if($rowstatut['id'] == $row["nomStatut"]) echo 'selected';?> value='<?=$rowstatut['id'];?>' ><?=$rowstatut['nom'];?></option>
                            <?php }?>
                            </select>
                            </div>
                    </div>



                  <div class="ln_solid"></div>
                  <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                  <a class="btn btn-primary" href="index4.php">Cancel</a>

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
