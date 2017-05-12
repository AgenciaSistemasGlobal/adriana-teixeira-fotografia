<?php
    $Albuns = new Albuns();
    $Fotos = new Fotos();
    $albuns = $Albuns->findAll();

    $albumUniq=false;
    if(!is_null($modulo2)) {
        $albumUniqFotos = $Fotos->findByAlbum(URL::getIdUri($modulo2));
        $albumUniq = $Albuns->find(URL::getIdUri($modulo2));
    }
?>

<?php if(!$albumUniq): ?>
    <section id="trabalhos" class="trabalhos-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="content-box">
                        <h2 class="wow fadeInUp">Trabalhos Realizados</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(!$albumUniq && !is_null($modulo2)): ?>
                        <!-- ID não encontrado -->
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h4 style="margin:0"><strong>Óh não!</strong> Albúm não encontrado</h4>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <?php foreach ($albuns as $album): ?>
                    <div class="col-md-4">
                        <div class="column"> 
                            <!-- Post-->
                            <div class="post-module"> 
                                <!-- Thumbnail-->
                                <div class="thumbnail">
                                    <div class="date transition">
                                        <a href="<?php echo URL::getBase() . 'trabalhos-realizados/' . $album['id'] . '-' . URL::removeAcentos($album['titulo'], '_') ?>">
                                            <div class="day">
                                                Ver Fotos
                                            </div>
                                        </a>
                                    </div>
                                    <img src="<?php echo URL::getBase() . 'server/uploads/' . $album['imagemFoto'] ?>" class="img-responsive" title="<?php echo $album['tituloFoto'] ?>" alt="<?php echo $album['tituloFoto'] ?>">
                                </div>
                                <!-- Post Content-->
                                <div class="post-content">
                                    <div class="category"><?php echo $album['nomeServico'] ?></div>
                                    <h1 class="title"><?php echo $album['titulo'] ?></h1>
                                    <p class="description"><?php echo $album['descricao'] ?></p>
                                    <div class="post-meta">
                                        <span class="timestamp"><i class="fa fa-calendar"></i> <?php echo $album['data'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="action-bottom">
                        <a href="./trabalhos-realizados" class="btn text-black" style="font-size: 16px!important">Veja Todos Nossos Trabalhos Realizados</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section id="album-uniq" class="trabalhos-section">
        <header class="paralax" style="background-image: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.1)), url('<?php echo URL::getBase() . "server/uploads/" . $albumUniq['imagemFoto'] ?>');">
            <div class="container">
                <h1><?php echo $albumUniq['titulo'] ?></h1>
                <h3><?php echo $albumUniq['descricao'] ?></h3>
            </div>
        </header>
        <nav class="breadcrumb caminho-internas">
            <div class="container">
                <a class="breadcrumb-item" href="<?php echo URL::getBase() ?>">Home</a>
                <a class="breadcrumb-item" href="<?php echo URL::getBase() . 'trabalhos-realizados' ?>">Trabalhos Realizados</a>
                <a class="pull-right btn btn-primary" href="<?php echo URL::getBase() . 'trabalhos-realizados' ?>"><i class="fa fa-long-arrow-left pull-left" aria-hidden="true"></i> Voltar</a>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Galeria de Fotos</h2>
                </div>
                <?php foreach ($albumUniqFotos as $_albumUniqFotos): ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="javascript:openModalZoom('<?php echo $_albumUniqFotos['id'] ?>')" class="thumbnail">
                            <img src="<?php echo URL::getBase() . "server/uploads/" . $_albumUniqFotos['imagem'] ?>" alt="<?php echo $_albumUniqFotos['titulo'] ?>" title="<?php echo $_albumUniqFotos['titulo'] ?>" class="img-responsive image-modal-zoom">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>
<!-- The Modal -->
<div id="modal-galeria-fotos" class="modal">
    <span class="close">&times;</span>
    <div id="carousel-fotos-album" class="carousel slide text-center" data-ride="carousel">

        <?php if(count($albumUniqFotos)>1): ?>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach ($albumUniqFotos as $key => $_albumUniqFotos): ?>
                    <li data-target="#carousel-fotos-album" id="idCapFoto<?php echo $_albumUniqFotos['id'] ?>" data-slide-to="<?php echo $key ?>"></li>
                <?php endforeach ?>
            </ol>
        <?php endif ?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach ($albumUniqFotos as $_key => $_albumUniqFotos): ?>
                <div id="idSlideFoto<?php echo $_albumUniqFotos['id'] ?>" class="item <?php if(!$_key) echo 'active' ?>">
                    <img src="<?php echo URL::getBase() . "server/uploads/" . $_albumUniqFotos['imagem'] ?>" alt="<?php echo $_albumUniqFotos['titulo'] ?>" title="<?php echo $_albumUniqFotos['titulo'] ?>" class="img-responsive" style="margin: 0 auto">

                    <div class="carousel-caption">
                        <h2 class="animated fadeInDown"><?php echo $_albumUniqFotos['titulo'] ?></h2>
                        <p class="animated fadeInDown"><?php echo $_albumUniqFotos['descricao'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <?php if(count($albumUniqFotos)>1): ?>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#carousel-fotos-album" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-fotos-album" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        <?php endif ?>
    </div>
</div>