<?php
    $Sobre = new Sobre();
    $sobre = $Sobre->find();
?>
<!-- About Section -->
<section id="about" class="about-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 bg-metade" style="background-image: url('<?php echo URL::getBase() . "server/uploads/" . $sobre['imagem'] ?>');"></div>
            <div class="col-lg-6 col-md-6 quem-sou-content">
                <h2 class="wow fadeInDown"><?php echo $sobre['titulo'] ?></h2>
                <p><?php echo $sobre['texto'] ?></p>

                <div class="action-bottom wow fadeInUp">
                    <?php if($modulo = "home"): ?>
                        <a href="<?php echo URL::getBase() ?>sobre" class="btn btn-primary transition btn-lg">Conheça-me Melhor<i class="fa fa-heart" aria-hidden="true"></i></a>
                    <?php else: ?>
                        <a href="<?php echo URL::getBase() ?>contato" class="btn btn-primary transition btn-lg">Faça um Contato<i class="fa fa-phone" aria-hidden="true"></i></a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>