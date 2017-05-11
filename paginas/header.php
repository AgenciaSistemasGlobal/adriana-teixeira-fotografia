<header id="carousel-header" class="carousel slide">
    
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-header" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-header" data-slide-to="1"></li>
        <li data-target="#carousel-header" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('<?php echo URL::getBase() ?>img/bg-primary.jpeg');"></div>
            <div class="carousel-caption">
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
                <h3 class="animated fadeInDown">Seja bem-vindo!</h3>
                <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                <h2 class="animated fadeIn">
                    <div class="detalhe-hr"></div>
                    <span>Fotografia</span>
                    <div class="detalhe-hr"></div>
                </h2>
                <img src="<?php echo URL::getBase() ?>img/global-swirl-bottom.png" class="img-responsive"></img>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('<?php echo URL::getBase() ?>img/bg-elephant.jpg');"></div>
            <div class="carousel-caption">
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
                <h3 class="animated fadeInDown">Lorem Ipsum</h3>
                <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                <h2 class="animated fadeIn">
                    <div class="detalhe-hr"></div>
                    <span>Fotografia</span>
                    <div class="detalhe-hr"></div>
                </h2>
                <img src="<?php echo URL::getBase() ?>img/global-swirl-bottom.png" class="img-responsive"></img>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('<?php echo URL::getBase() ?>img/bg-road.jpg');"></div>
            <div class="carousel-caption">
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
                <h3 class="animated fadeInDown">Lorem Ipsum</h3>
                <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                <h2 class="animated fadeIn">
                    <div class="detalhe-hr"></div>
                    <span>Fotografia</span>
                    <div class="detalhe-hr"></div>
                </h2>
                <img src="<?php echo URL::getBase() ?>img/global-swirl-bottom.png" class="img-responsive"></img>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#carousel-header" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-header" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>