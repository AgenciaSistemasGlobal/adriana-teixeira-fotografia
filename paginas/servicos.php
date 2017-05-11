<?php
    $Servicos = new Servicos();
    $servicos = $Servicos->findAll();
?>
<!-- Services Section -->
<section id="servicos" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Nossos Serviços</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($servicos as $servico): ?>
                <div class="col-md-4 col-lg-4 card">
                    <a href="./servicos/<?php echo $servico['nome'] ?>">
                    <div class="thumbnail">
                        <header>
                            <img src="<?php echo URL::getBase() . 'server/uploads/' . $servico['imagem'] ?>" alt="<?php echo $servico['nome'] ?>" title="<?php echo $servico['nome'] ?>" class="img-responsive">
                        </header>
                        <div class="caption">
                            <h3><?php echo $servico['nome'] ?><small></small></h3>
                            <hr>        
                            <p><?php echo $servico['descricao'] ?></p>
                            <a href="./servicos/<?php echo $servico['nome'] ?>" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>