<?php
    $Banner = new Banner();
    $slides = $Banner->findAll();
?>
<header id="carousel-header" class="carousel slide">
    
    <?php if(count($slides)>1): ?>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($slides as $_key => $_slide): ?>
                <li data-target="#carousel-header" data-slide-to="<?php echo $_key ?>" class="<?php if(!$_key) echo 'active' ?>"></li>
            <?php endforeach ?>
        </ol>
    <?php endif ?>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        
        <?php foreach ($slides as $key => $slide): ?>
            <div class="item lazy-load <?php if(!$key) echo 'active' ?>">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('<?php echo URL::getBase() . "server/uploads/" . $slide['imagem'] ?>');"></div>
                <div class="carousel-caption">
                    <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
                    <h3 class="animated fadeInDown"><?php echo $slide['titulo'] ?></h3>
                    <h1 class="animated fadeInUp"><?php echo $slide['sub_titulo'] ?></h1>
                    <h2 class="animated fadeIn">
                        <div class="detalhe-hr"></div>
                        <span><?php echo $slide['descricao'] ?></span>
                        <div class="detalhe-hr"></div>
                    </h2>
                    <img src="<?php echo URL::getBase() ?>img/global-swirl-bottom.png" class="img-responsive"></img>
                </div>
            </div>
        <?php endforeach ?>

        <?php if(count($slides)>1): ?>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#carousel-header" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-header" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        <?php endif ?>
    </div>
</header>