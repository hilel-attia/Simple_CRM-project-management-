<?php
session_start();
$message="";
unset($_SESSION["login"]);
unset($_SESSION["password"]);
if(count($_POST)>0) 
{
	
	require_once __DIR__. '/Models/user.php' ;
	$user = new user($_POST);
	$row = $user->authentificat();

	if(count($row)==1) 
	{
        $_SESSION["id"] = $row[0]['id'];
		$_SESSION["login"] = $row[0]['login'];
		$_SESSION["password"] = $row[0]['password'];
		$_SESSION["nom"] = $row[0]['nom'];
		$_SESSION["type"] = $row[0]['type'];
		$_SESSION["partenaire"] = $row[0]['partenaire'];
		

		header("Location:index4.php");
	} else 
	{
		$message = "Invalid Username or Password!";
	}
}
	
?>
<!DOCTYPE html>

<html lang="en">
  <head>
  <script src="https://kit.fontawesome.com/2a6970513c.js" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INTRANET..EXTRANET</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="login.php">
              <h1>Login Form</h1>
              <div>
                <input name="login" type="text" class="form-control" autocomplete="off" placeholder="Username" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" autocomplete="off" placeholder="Password" required="" />
                      </div>
                      <div class="col-lg-3"></div>
                      <div class="col-lg-3">
                      <div class="input-group">
                      <input type="submit"   class="btn btn-secondary"  value="Log in" />
                      </div>
                      </div>
            

              <div class="clearfix"></div>

              
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>INTRANET..EXTRANET</h1>
                  <p>OpenTrace OPENBEE 2019-2020</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account <?=$message;?></h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              
                  <a type="button" class="btn btn-secondary" href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
