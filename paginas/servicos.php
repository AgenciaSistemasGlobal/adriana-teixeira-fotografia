<?php
    $Servicos = new Servicos();
    $Albuns = new Albuns();
    $servicos = $Servicos->findAll();

    $servicoUniq=false;
    if(!is_null($modulo2)) {
        $servicoUniq = $Servicos->find(URL::getIdUri($modulo2));
        $albunsByServico = $Albuns->findByServicos(URL::getIdUri($modulo2));
    }
?>
<?php if(!$servicoUniq): ?>
    <section id="servicos" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="wow fadeInUp">Nossos Serviços</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($servicos as $servico): ?>
                    <div class="col-md-4 col-lg-4 card">
                        <a href="<?php echo URL::getBase() . 'servicos/' . $servico['id'] . '-' . URL::removeAcentos($servico['nome'], '_') ?>">
                            <div class="thumbnail">
                                <header>
                                    <img src="<?php echo URL::getBase() . 'server/thumb.php?img=' . $servico['imagem'] . '&width=360&height=200' ?>" title="<?php echo $servico['nome'] ?>" class="img-responsive">
                                </header>
                                <div class="caption">
                                    <h3><?php echo $servico['nome'] ?><small></small></h3>
                                    <hr>
                                    <article class="limiter">
                                        <?php echo $servico['descricao'] ?>
                                    </article>
                                    <a href="<?php echo URL::getBase() . 'servicos/' . $servico['id'] . '-' . URL::removeAcentos($servico['nome'], '_') ?>" class="btn btn-primary transition">Saiba Mais</a>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section id="servico-uniq" class="services-section">
        <header class="paralax" style="background-image: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.1)), url('<?php echo URL::getBase() . "server/uploads/" . $servicoUniq['imagem'] ?>');">
            <div class="container">
                <h1><?php echo $servicoUniq['nome'] ?></h1>
            </div>
        </header>
        <nav class="breadcrumb caminho-internas">
            <div class="container">
                <a class="breadcrumb-item" href="<?php echo URL::getBase() ?>">Home</a>
                <a class="breadcrumb-item" href="<?php echo URL::getBase() . 'servicos' ?>">Serviços</a>
                <span class="breadcrumb-item active"><?php echo $servicoUniq['nome'] ?></span>
                <a class="pull-right btn btn-primary" href="<?php echo URL::getBase() . 'servicos' ?>"><i class="fa fa-long-arrow-left pull-left" aria-hidden="true"></i> Voltar</a>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <article>
                        <?php echo $servicoUniq['descricao'] ?>
                    </article>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>Trabalho<?php echo count($albunsByServico)>1 ? "s" : "" ?> Realizado<?php echo count($albunsByServico)>1 ? "s" : "" ?> Sobre <?php echo $servicoUniq['nome'] ?></h2>
                    </div>
                </div>
                <?php foreach ($albunsByServico as $album): ?>
                    <div class="col-md-4">
                        <div class="column"> 
                            <!-- Post-->
                            <div class="post-module"> 
                                <!-- Thumbnail-->
                                <div class="thumbnail">
                                    <?php if(!is_null($album['imagemFoto'])): ?>
                                        <div class="date transition">
                                            <a href="<?php echo URL::getBase() . 'trabalhos-realizados/' . $album['id'] . '-' . URL::removeAcentos($album['titulo'], '_') ?>">
                                                <div class="day">
                                                    Ver Fotos
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                    <img src="<?php echo URL::getBase() . 'server/thumb.php?img=' . (!is_null($album['imagemFoto']) ? $album['imagemFoto'] : 'nophoto-custom.jpg') . '&width=360&height=200' ?>" class="img-responsive" title="<?php echo $album['titulo'] ?>" alt="<?php echo $album['titulo'] ?>">
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
        </div>
    </section>
<?php endif ?>