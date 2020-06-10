<!DOCTYPE html>
<html lang="en">
<head><script src="https://kit.fontawesome.com/2a6970513c.js" crossorigin="anonymous"></script></head>

  <?php 
  include __DIR__ .'/head.php';
  ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php 
		  include __DIR__ .'/left.php';
		  ?>
<!--       
        page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Gestion des projets</h2>
                
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
                    <h2>Liste des Tiers</h2>
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
                                  <?php if($_SESSION['type'] == 1) { ?>
                                  <div  style="font-size: 24px " text-align:right; >
                                  <a    class="fas fa-user-plus"    href="index.php?Action=ajouter"> </a>
                                  </div>
                                  <?php }?>
                                  </div>
                                  </div>
                      
                        </tr>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>email</th>
                          <th>telephone</th>
                          <th>Adresse</th>
                          <th>type</th>
                          <th>login</th>
						              <th>Modifier</th>
                          <?php if($_SESSION['type'] == 1) { ?>  <th>Supprimer</th> <?php } ?>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
						foreach($rows as $row){
							
					  ?>
                        <tr>
                          <td><?php echo $row["nom"]; ?></td>
                          <td><?php echo $row["email"]; ?></td>
                          <td><?php echo $row["telephone"]; ?></td>
                          <td><?php echo $row["adresse"]; ?></td>
                          <td><?php echo $row["nomtype"]; ?></td>
                          <td><?php echo $row["login"]; ?></td>
                          <td ><a  class="fas fa-user-edit"   href="index.php?Action=update&id=<?php  echo $row["id"]; ?>"></a></td>
                          <?php if($_SESSION['type'] == 1) { ?>
                          <td><a  class="fas fa-trash"  href="index.php?Action=delete&id=<?php echo $row["id"]; ?>"></a></td>
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