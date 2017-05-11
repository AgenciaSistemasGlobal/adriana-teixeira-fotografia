<?php
    $Albuns = new Albuns();
    $albuns = $Albuns->findAll();
?>
<!-- Services Section -->
<section id="trabalhos" class="trabalhos-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="content-box">
                    <h2>Trabalhos Realizados</h2>
                </div>
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
                                    <a href="./trabalhos-realizados/<?php echo $album['titulo'] ?>">
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