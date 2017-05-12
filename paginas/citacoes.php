<?php
    $Citacoes = new Citacoes();
    $citacoes = $Citacoes->findAll();
?>
<!-- Contact Section -->
<section id="frase" class="frase-section paralax">
    <div class="container-fluid">
        <div id="carousel-citacoes" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <?php foreach ($citacoes as $key => $citacao): ?>
                    <div class="item <?php if(!$key) echo 'active' ?>">
                        <div class="col-lg-6 col-lg-offset-3">
                            <h2 class="animated fadeInDown"><?php echo $citacao['titulo'] ?></h2>
                            <h4 class="animated fadeInUp"><?php echo $citacao['descricao'] ?></h4>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <?php if(count($citacoes)>1): ?>
                <a class="left carousel-control" href="#carousel-citacoes" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-citacoes" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            <?php endif ?>

            <?php if(count($citacoes)>1): ?>
                <ol class="carousel-indicators">
                    <?php foreach ($citacoes as $key => $citacao): ?>
                        <li data-target="#carousel-citacoes" data-slide-to="<?php echo $key ?>" class="<?php if(!$key) echo 'active' ?>"></li>
                    <?php endforeach ?>
                </ol>
            <?php endif ?>
        </div>
        
        <div class="action-bottom text-center">
            <a href="<?php echo URL::getBase() ?>contato" class="btn btn-default btn-lg transition">Faça um Contato Conosco<i class="fa fa-phone" aria-hidden="true"></i></a>
        </div>
    </div>
</section>s