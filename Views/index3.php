<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/2a6970513c.js" crossorigin="anonymous"></script>
  
  <?php 
  include __DIR__ .'/head.php';
  ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php 
		  include __DIR__ .'/left.php';
		  ?>
      
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Gestion des projets</h3>
              </div>
            </div>
			<?php 
				if($Message != ''){?>
				<div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="proche"><span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                    </button>
                    <strong>
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"><?=$Message;?> </font>
						</font>
					</strong>
				</div>
			<?php }?>	  
            <div class="clearfix"></div>

            <div class="row">
     
         

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des contact</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <p>
						  
                            <div  style="font-size: 24px " >
                            
                            <a   class="fas fa-user-plus"   href="index3.php?Action=ajouter"> </a>
                             </div>
                          
                            
                            </p>
                        </tr>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>

                          <th>nomSociete</th>
                          <th>User</th>   
                          <th>date</th>
                          <th>comentaire</th>

                          <?php if($_SESSION['type'] == 1) { ?>  <th>modifier</th> <?php } ?>
                           <?php if($_SESSION['type'] == 1) { ?>  <th>Supprimer</th> <?php } ?>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
						foreach($rows as $row){
							
					  ?>
                        <tr>
                          <td><?php echo $row["nomSociete"]; ?></td>
                          <td><?php echo $row["nomUser"]; ?></td>
                          <td><?php echo $row["date"]; ?></td>
                          
                          <td><?php echo $row["comentaire"]; ?></td>
                          <?php if($_SESSION['type'] == 1) { ?>
                          <td><a  class="fas fa-user-edit"  href="index3.php?Action=update&id=<?php echo $row["id"]; ?>"></a></td>
              <td><a  class="fas fa-trash"  href="index3.php?Action=delete&id=<?php echo $row["id"]; ?>"></a></td>
              <?php }?>
          
                        <?php
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
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

	<?php 
		include __DIR__ . '/script.php';
	?>

  </body>
</html>