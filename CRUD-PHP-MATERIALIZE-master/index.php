<?php
	ob_start();
	session_start();
	require_once("controller/usuario.controller.php");
	if(isset($_GET['exit'])){
		unset($_SESSION['usuarioLogado']);
		unset($_SESSION['emailLogado']);
		unset($_SESSION['idLogado']);
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html>
    <head>

        <title> CRUD Usuários </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- ÍCONE BONITO DA ABA -->
        <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/2254/2254724.svg" />
        <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

         <!-- Place your kit's code here -->
        <script src="https://kit.fontawesome.com/5cb511dd4f.js" crossorigin="anonymous"></script>


        <!-- MATERIALIZE ICONS & FONTS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/index.css" />


    </head>
    <body>
        <nav>
            <div class="nav-wrapper black" >
            <a class="navbar-brand" href="index.php" id="navegacao">LOGO</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <?php
				if(isset($_SESSION['usuarioLogado'])){
					echo '<li>Usuário: '.$_SESSION['usuarioLogado'].'</li>';
					echo '<li><a href="index.php?page=cadastros">Cadastros</a></li>';
					echo '<li><a href="?exit">Sair</a></li>';				
				}else{
                    echo '<li><a class="btn white black-text" href="index.php?page=login">Entrar</a></li>';
                    echo '<li><a  href="index.php?page=cadastrar">Cadastre-se</a></li>';
                }
			  ?>
            </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <?php
                if(isset($_SESSION['usuarioLogado'])){
                    echo '<li>Usuário: '.$_SESSION['usuarioLogado'].'</li>';
                    echo '<li><a href="index.php?page=cadastros">Cadastros</a></li>';
                    echo '<li><a href="?sair.php">Sair</a></li>';
                }else{
                    echo '<li><a href="index.php?page=login">Entrar</a></li>';
                }
            ?>
        </ul>
        <div class="container">
		<?php
			$page= @$_GET['page'];
			$pag['content'] = 'conteudo.php';
			$pag['cadastros'] = 'cadastros.php';
			$pag['cadastrar'] = 'form_cad_usuario.php';
			$pag['update'] = 'form_updel.php';
			$pag['login'] = 'form_login.php';
    
      if(!empty($page) && file_exists($pag[$page])){
				
					include $pag[$page];
      
			}else{
				trim (include "conteudo.php");
      
    }
		
        ?>
         </div>
        <footer class="page-footer black">
          <div class="footer-copyright" id="copyrightID">
            <div class="container">
                Desenvolvido por <a href="#"> Maxwell Fernandes</a> © 2019 Copyright
            <a class="right" href="https://github.com/MaxxxF">&nbsp <i class="fab fa-github"></i></a>
            <a class="right" href="#!"><i class="fab fa-linkedin"></i></a>
 
            </div>
          </div>
        </footer>  
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
    //init sidenav bar
        $(document).ready(function(){
            M.AutoInit();
        });
    </script>
   </body>
</html>
