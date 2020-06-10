<script src="https://kit.fontawesome.com/2a6970513c.js" crossorigin="anonymous"></script>
  <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title">
              <img src="./images/aa.jpeg" alt="Smiley face" height="42" width="42" class="img-circle"  >
			  <span class="font-italic">OpenTrace</span></a>
        
            </div>

            <div class="clearfix"></div>

         
			<br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Administration</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php 
					
                      if($_SESSION["type"] != 2) {?>
                      <li><a href="index.php">Users</a></li>

                      <li><a href="index2.php">Partenaires</a></li>
                      <li><a href="index4.php">Projets</a></li>
                      <li><a href="index3.php">Contact</a></li>
                      <li><a href="index4.php?Action=widget">widgets</a></li>
                      
                      <?php } 
                      else {
                        ?>
                      <li><a href="index4.php">Projets</a></li>
                      <?php 
                      }
                        ?>
                        
                    </ul>
                  </li>
                </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        
  <!-- top navigation -->
        <div class="top_nav">
      
            <div class="nav_menu">
               
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg"  class="font-italic"  alt=""> Bienvenue: <?php echo $_SESSION["login"];?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                     
                      <a class="dropdown-item" class="fas fa-sign-out-alt" href="login.php"  ><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                     
                    </div>
                  </li>
  
                </ul>
              </nav>
            </div>
          </div>
          
        <!-- /top navigation --><!-- Small modal -->
