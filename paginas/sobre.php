<!-- About Section -->
<section id="about" class="about-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 bg-metade" style="background-image: url('<?php echo URL::getBase() ?>img/bg-quem-sou.jpg');"></div>
            <div class="col-lg-6 quem-sou-content">
                <h2>Quem sou</h2>
                <p>
                    Sou um parágrafo. Clique aqui para editar e adicionar o seu próprio texto. É fácil! Basta clicar em "Editar Texto" ou clicar duas vezes sobre mim e você poderá adicionar o seu próprio conteúdo e trocar fontes. Sinta-se à vontade para arrastar-me e soltar em qualquer lugar em sua página. Sou um ótimo lugar para você contar sua história e permitir que seus clientes saibam um pouco mais sobre você. 
                </p>
                <p>
                    Este é um ótimo espaço para escrever um texto longo sobre a sua empresa e seus serviços. Você pode usar esse espaço para entrar em detalhes sobre a sua empresa.
                </p>
                <p>
                    Fale sobre a sua equipe e sobre os serviços prestados por você. Conte aos seus visitantes sobre como teve a idéia de iniciar o seu negócio e o que o torna diferente de seus competidores. Faça com que sua empresa se destaque e mostre quem você é.
                </p>
                <br>
                <?php if($modulo = "home"): ?>
                    <a href="<?php echo URL::getBase() ?>sobre" class="btn btn-primary btn-lg">Conheça-me melhor<i class="fa fa-heart" aria-hidden="true"></i></a>
                <?php else: ?>
                    <a href="<?php echo URL::getBase() ?>contato" class="btn btn-primary btn-lg">Faça um contato<i class="fa fa-phone" aria-hidden="true"></i></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>