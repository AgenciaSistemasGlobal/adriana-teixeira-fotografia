<?php
	require "/server/Conexao.class.php";
  require "/server/Login.class.php";

  session_start();

  if(isset($_GET['logout']) && $_GET['logout']) Login::logout(URL::getBase());
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>

  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrador do Site - Adriana Teixeira Fotografia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo URL::getBase() ?>paginas/adm/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo URL::getBase() ?>paginas/adm/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php if($modulo2 != "login" && !empty($_SESSION['sudo_logado'])): ?>
      <div class="header">
       <div class="col-md-10">
          <!-- Logo -->
          <div class="logo">
             <h1><a href="<?php echo URL::getBase() ?>adm">Gerenciador de Conteúdo</a></h1>
          </div>
       </div>
       <div class="col-md-2">
          <div class="navbar navbar-inverse" role="banner">
              <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minha Conta <b class="caret"></b></a>
                    <ul class="dropdown-menu animated fadeInUp">
                      <li><a href="<?php echo URL::getBase() ?>adm/perfil">Perfil</a></li>
                      <li><a href="?logout=1">Sair</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
          </div>
       </div>
      </div>
    <?php endif ?>

    <?php if($modulo2 != "login" && !empty($_SESSION['sudo_logado'])): ?>
      <div class="page-content">
      	<div class="row">
  		    <div class="col-md-2">
  		  	<div class="sidebar content-box" style="display: block;">
                  <ul class="nav">
                    <li class="submenu <?php if($modulo2 == 'albuns' || $modulo2 == 'fotos') echo 'open' ?>">
                         <a href="<?php echo URL::getBase() ?>adm/fotos">
                            <i class="glyphicon glyphicon-camera"></i> Trabalhos
                            <span class="caret pull-right"></span>
                         </a>
                         <ul>
                            <li><a href="<?php echo URL::getBase() ?>adm/albuns">Albuns</a></li>
                            <li><a href="<?php echo URL::getBase() ?>adm/fotos">Fotos</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo URL::getBase() ?>adm/banner"><i class="glyphicon glyphicon-hd-video"></i> Banner</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/sobre"><i class="glyphicon glyphicon-align-left"></i> Sobre</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/contato"><i class="glyphicon glyphicon-earphone"></i> Contato</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/servicos"><i class="glyphicon glyphicon-wrench"></i> Servicos</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/clientes"><i class="glyphicon glyphicon-user"></i> Clientes</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/citacoes"><i class="glyphicon glyphicon-tags"></i> Citações</a></li>
                  </ul>
           </div>
  		  </div>
  		  <div class="col-md-10">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL::getBase() ?>adm">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL::getBase() . 'adm/' . $modulo2 ?>"><?php echo $modulo2 ?></a></li>
            <?php if(isset($_GET['u'])): ?>
              <li class="breadcrumb-item active"><?php echo $_GET['u'] ?></li>
            <?php endif ?>
          </ol>
  		  	<?php
  		     
  		        if(file_exists("./paginas/adm/paginas/" . $modulo2 . ".php"))
  		            require "./paginas/adm/paginas/" . $modulo2 . ".php";
  		        else
  		            require "./paginas/adm/paginas/404.php";
  		    ?>
  		  </div>
  		</div>
      </div>
    <?php endif ?>

	<?php if($modulo2 != "login" && !empty($_SESSION['sudo_logado'])): ?>
    <footer>
      <div class="container-fluid">
          <div class="row copy">
            <div class="col-md-12">
              <div class="col-md-8">
                  <div>© 2017 Adriana Teixeira Fotografia. Todos os direitos reservados.</div>
              </div>
              <div class="col-md-4 text-right">
                  <div>Só podia ser Sistemas Global</div>
              </div>
            </div>
          </div>
      </div>
  	</footer>
  <?php endif ?>

  <?php
    if($modulo2 == "login" || empty($_SESSION['sudo_logado'])) {
      require "./paginas/adm/paginas/login.php";
    }
  ?>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo URL::getBase() ?>paginas/adm/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo URL::getBase() ?>paginas/adm/js/custom.js"></script>
  </body>
</html>