<?php
    require "/server/Banner.class.php";
    require "/server/Sobre.class.php";
    require "/server/Citacoes.class.php";
    require "/server/Servicos.class.php";
    require "/server/Contato.class.php";
    require "/server/Albuns.class.php";

    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Agência Digital Sistemas Global">

        <title>Adriana Teixeira Fotografia</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo URL::getBase() ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo URL::getBase() ?>css/scrolling-nav.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="<?php echo $modulo != 'home' ? 'internas' : '' ?>">
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=1364340600304232";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Navigation -->
        <nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll transition" href="#page-top">
                        <img src="<?php echo URL::getBase() ?>img/fotografia-adriana-teixeira-logotipo.png" class="img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="transition <?php echo $modulo == 'home' ? 'active' : '' ?>" href="<?php echo URL::getBase(); ?>">Home</a>
                        </li>
                        <li>
                            <a class="transition <?php echo $modulo == 'sobre' ? 'active' : '' ?>" href="<?php echo URL::getBase(); ?>sobre">Sobre</a>
                        </li>
                        <li>
                            <a class="transition <?php echo $modulo == 'trabalhos-realizados' ? 'active' : '' ?>" href="<?php echo URL::getBase(); ?>trabalhos-realizados">Trabalhos Realizados</a>
                        </li>
                        <li>
                            <a class="transition <?php echo $modulo == 'contato' ? 'active' : '' ?>" href="<?php echo URL::getBase(); ?>contato">Contato</a>
                        </li>
                        <li>
                            <a class="transition <?php echo $modulo == 'servicos' ? 'active' : '' ?>" href="<?php echo URL::getBase(); ?>servicos">Serviços</a>
                        </li>
                        <li>
                            <a href="<?php echo URL::getBase(); ?>contato#orcamento" class="btn btn-primary transition">Solicitar Orçamento</a>
                        </li>
                        <?php if(!empty($_SESSION['sudo_logado'])): ?>
                            <li>
                                <a href="./adm" class="btn btn-default transition">Entrar como <?php echo explode(" ",$_SESSION['sudo_nome'])[0] ?></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <nav id="socials-links">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-instagram transition" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-facebook transition" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter transition" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <?php
     
            if(file_exists("paginas/" . $modulo . ".php"))
                require "paginas/" . $modulo . ".php";
            else
                require "paginas/404.php";
        ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <h4>Navegue pelo site</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a class="page-scroll transition" href="#page-top">
                                    Home
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="page-scroll transition" href="#about">Sobre</a>
                            </li>
                            <li class="list-group-item">
                                <a class="page-scroll transition" href="#services">Trabalho Realizados</a>
                            </li>
                            <li class="list-group-item">
                                <a class="page-scroll transition" href="#contact">Contato</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <h4>Vamos conversar?</h4>
                        <ul class="list-group infos-contatos">
                            <li class="list-group-item">Av. Bernardino de Campos, 98</li>
                            <li class="list-group-item">info@meusite.com</li>
                            <li class="list-group-item">São Paulo, SP 12345-678</li>
                            <li class="list-group-item">Tel: (11) 3456-7890</li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <h4>Conecte-se a nós</h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
                            <a href="#" class="list-group-item"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a>
                            <a href="#" class="list-group-item"><i class="fa fa-pinterest-p" aria-hidden="true"></i>Pinterest</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="fb-page" data-href="https://www.facebook.com/FacebookBrasil/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FacebookBrasil/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FacebookBrasil/">Facebook</a></blockquote></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="pre-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-8 col-lg-8">
                                    <div>© 2017 Adriana Teixeira Fotografia. Todos os direitos reservados.</div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div>
                                        <a href="https://sistemasglobal.com.br">
                                            <img src="https://sistemasglobal.com.br/img/logotipo-criacao-de-sites.jpg" alt="Agência Digital Sistemas Global" title="Agência Digital Sistemas Global" class="img-responsive pull-right logo-footer grayscale">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <a class="page-scroll to-top" href="#page-top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>

        <!-- jQuery -->
        <script src="<?php echo URL::getBase() ?>js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo URL::getBase() ?>js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <!-- Scrolling Nav JavaScript -->
        <script src="<?php echo URL::getBase() ?>js/jquery.easing.min.js"></script>
        <script src="<?php echo URL::getBase() ?>js/scrolling-nav.js"></script>
    </body>
</html>