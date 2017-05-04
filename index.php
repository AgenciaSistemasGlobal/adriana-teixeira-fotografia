<!DOCTYPE html>
<html lang="pt-BR">

<?php include "head.php" ?>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=1364340600304232";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php include "navs.php" ?>

    <header id="carousel-header" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('./img/bg-primary.jpeg');"></div>
                <div class="carousel-caption">
                    <img src="./img/ramos-de-oliveira.png" class="img-responsive"></img>
                    <h3 class="animated fadeInDown">Lorem Ipsum</h3>
                    <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                    <h2 class="animated fadeIn">
                        <div class="detalhe-hr"></div>
                        <span>Fotografia</span>
                        <div class="detalhe-hr"></div>
                    </h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('./img/bg-elephant.jpg');"></div>
                <div class="carousel-caption">
                    <img src="./img/ramos-de-oliveira.png" class="img-responsive"></img>
                    <h3 class="animated fadeInDown">Lorem Ipsum</h3>
                    <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                    <h2 class="animated fadeIn">
                        <div class="detalhe-hr"></div>
                        <span>Fotografia</span>
                        <div class="detalhe-hr"></div>
                    </h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0)), url('./img/bg-road.jpg');"></div>
                <div class="carousel-caption">
                    <img src="./img/ramos-de-oliveira.png" class="img-responsive"></img>
                    <h3 class="animated fadeInDown">Lorem Ipsum</h3>
                    <h1 class="animated fadeInUp">Adriana Teixeira</h1>
                    <h2 class="animated fadeIn">
                        <div class="detalhe-hr"></div>
                        <span>Fotografia</span>
                        <div class="detalhe-hr"></div>
                    </h2>
                </div>
            </div>
        </div>
    </header>
    
    <?php include "sobre-section.php" ?>
    
    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/fashion" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/transport" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/city" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/food" alt="" class="img-responsive">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/city" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/food" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/fashion" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/transport" alt="" class="img-responsive">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/food" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/city" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/transport" alt="" class="img-responsive">
                </div>
                <div class="col-lg-3">
                    <img src="http://lorempixel.com/400/200/fashion" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="frase" class="frase-section">
        <div class="container-fluid">
            <h3>"Capturando os momentos de hoje, que vão supreender seu coração amanhã."</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ante erat, condimentum a orci ac, accumsan vulputate ante. Maecenas id velit tempus arcu luctus sagittis. Donec at porttitor est. Vivamus sit amet ligula in neque laoreet gravida.</p>
            <a href="#" class="btn btn-default btn-large">Faça um Contato</a>
        </div>
    </section>
    <?php include "contato-section.php" ?>
    <?php include "footer.php" ?>
</body>

</html>