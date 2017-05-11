<?php
    $Contato = new Contato();
    $contato = $Contato->find();
?>
<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 contato">
                <h2>Vamos Conversar</h2>
                <form class="form-horizontal" action="" method="post">
                    <!-- Name input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Seu nome" class="form-control">
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="email" name="email" type="text" placeholder="Seu email" class="form-control">
                        </div>
                    </div>

                    <!-- Message body -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" id="message" name="message" placeholder="Porfavor digite sua mensagem aqui..." rows="5"></textarea>
                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 bg-metade" style="background-image: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.1)), url('<?php echo URL::getBase() . "server/uploads/" . $contato['imagem'] ?>');">
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
                <ul class="infos-contatos">
                    <li>Av. Bernardino de Campos, 98</li>
                    <li>info@meusite.com</li>
                    <li>São Paulo, SP 12345-678</li>
                    <li>Tel: (11) 3456-7890</li>
                </ul>
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive"></img>
            </div>
        </div>
    </div>
</section>