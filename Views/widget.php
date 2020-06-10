<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> OpenTrace</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

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
                <h3>Statistique</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div text-align:center; class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                   
                    <div class="row">


                      <div  class="col-md-60   widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Nombre de Projets par partenaire</h2>
                           
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <ul class="verticle_bars list-inline" style="display: flex;">
							  
							<?php 
							$i=-1;
							foreach ( $Partenaires as $partenaire ){
							$i++;
							
								
								?>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-<?php echo $bars[$i%4]; ?>" role="progressbar" data-transitiongoal="<?php echo $partenaire['total']*100/$Total?>"></div>
                                  </div>
                                </li>
								
							<?php } ?>
                              </ul>
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
							<?php 
							$i=-1;
							foreach ( $Partenaires as $partenaire ){
							$i++;
							
								
								?>
                              <li>
                                <p>
								
                                  <span class="icon"><i class="fa fa-square <?php echo $colors[$i%4]; ?>"></i></span> <span class="name"><?php echo $partenaire['nomSociete']; ?></span>
                                </p>
                              </li>
							<?php } ?>
                            </ul>

                          </div>
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

        <!-- footer content -->
        <?php
		include __DIR__ .'/footer.php';
		?>
     




    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>    
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>