<?php
	require "/server/Conexao.class.php";
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
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-10">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="<?php echo URL::getBase() ?>adm">Gerenciador de Conteúdo</a></h1>
	              </div>
	           </div>
	           <!-- <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div> -->
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minha Conta <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Perfil</a></li>
	                          <li><a href="login.html">Sair</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <!-- <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         Sub menu
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?php echo URL::getBase() ?>adm/banner-principal"><i class="glyphicon glyphicon-tasks"></i> Banner Principal</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/sobre"><i class="glyphicon glyphicon-tasks"></i> Sobre</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/trabalhos-realizados"><i class="glyphicon glyphicon-tasks"></i> Trabalhos Realizados</a></li>
                    <li><a href="<?php echo URL::getBase() ?>adm/contato"><i class="glyphicon glyphicon-tasks"></i> Contato</a></li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<?php
		     
		        if(file_exists("./paginas/adm/paginas/" . $modulo2 . ".php"))
		            require "./paginas/adm/paginas/" . $modulo2 . ".php";
		        else
		            require "./paginas/adm/paginas/404.php";
		    ?>
		  </div>
		</div>
    </div>

	<footer>
		<div class="container">
			<div class="copy text-center">
				Copyright 2014 <a href='#'>Website</a>
			</div>
		</div>
	</footer>

    <link rel="stylesheet" type="text/css" href="<?php echo URL::getBase() ?>paginas/adm/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo URL::getBase() ?>paginas/adm/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo URL::getBase() ?>paginas/adm/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo URL::getBase() ?>paginas/adm/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="<?php echo URL::getBase() ?>paginas/adm/vendors/ckeditor/ckeditor.js"></script>
    <script src="<?php echo URL::getBase() ?>paginas/adm/vendors/ckeditor/adapters/jquery.js"></script>

    <script src="<?php echo URL::getBase() ?>paginas/adm/vendors/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

    <script src="<?php echo URL::getBase() ?>paginas/adm/js/custom.js"></script>
    <script src="<?php echo URL::getBase() ?>paginas/adm/js/editors.js"></script>
  </body>
</html>