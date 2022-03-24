<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Etat Civil Burundi</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="horizontal-nav boxed skin-megna card-no-border">
    <!-- ============================================================== -->

       <?php


    try 
      {
        $con=new PDO('mysql:host=localhost;
              dbname=etat_civil;
              charset=utf8',
              'root',''
            );
      } 
      catch (Exception $e) 
      {
        echo $e -> getMessage();
      }


  ?>

  <?php



  if(isset($_POST['valider']))
      {
        //$login=trim($_POST['login']);
       // $pwd=trim($_POST['password']);

       // $rep=$con->prepare("select * FROM personnel p,cni c, fonction f where login=:login AND password=:password AND p.num_cni=c.num_cni AND p.id_fonction=f.id_fonction");
        $rep= $con ->prepare("select * from personnel p, fonction f  WHERE p.login=:login AND p.password=:password AND p.id_fonction=f.id_fonction AND nom_fonction='administrateur'");
        $rep->execute(array('login'=>$_POST['login'],'password'=>$_POST['password']));
 
          if ($data=$rep->fetch()) 
          {
            
                $_SESSION['login']=$data['login'];

                header('Location:accueil_Admin.php');                      
          }


          $rep= $con ->prepare("select * from personnel p, fonction f  WHERE p.login=:login AND p.password=:password AND p.id_fonction=f.id_fonction AND nom_fonction='officier'");
              $rep->execute(array('login'=>$_POST['login'],'password'=>$_POST['password']));
          if($data=$rep->fetch())
          {
                       
                $_SESSION['login']=$data['login'];

                header('Location:accueilOfficier.php');
            
          }
          $rep= $con ->prepare("select * from personnel p, fonction f  WHERE p.login=:login AND p.password=:password AND p.id_fonction=f.id_fonction AND nom_fonction='secretaire'");
              $rep->execute(array('login'=>$_POST['login'],'password'=>$_POST['password']));
          if($data=$rep->fetch())
          {
                       
                $_SESSION['login']=$data['login'];

                header('Location:accueilSecretaire.php');
            
          }

           else{ echo "Vos Donnees ne sont pas correctes";}
      }

?>
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Etat Civil Bdi</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="" method="POST">
                        <h3 class="box-title m-b-20">Authentification</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="login" placeholder="Nom d'utilisateur"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Mot de passe"> </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" name="valider" type="submit">Valider</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Voulez-vous faire une Déclaration ?<a href="accueil_User.php" class="text-info m-l-5"><b>Cliquez ici</b></a>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Retrouver votre Compte</h3>
                                <p class="text-muted">Enter votre numéro matricule! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Matricule"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>





    
</body>

</html>