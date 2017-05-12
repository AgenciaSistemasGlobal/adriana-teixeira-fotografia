<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 contato">
                <h2 class="wow fadeInDown"><?php echo $modulo2=="orcamento" ? "Solicitação de Orçamento" : "Vamos Conversar" ?></h2>
                <?php
                    require '/server/PHPMailerAutoload.php';

                    $mail = new PHPMailer;

                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'muriloeduardoooooo@gmail.com';                 // SMTP username
                    $mail->Password = 'liloeduardo0202';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to

                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

                        $mail->setFrom($_POST['email'], $_POST['name']);
                        $mail->addReplyTo($_POST['email'], $_POST['name']);

                        /*$mail->addAddress('adriana_teix@hotmail.com', 'Adriana Teixeira')*/
                        $mail->addAddress('murilosantoseduardo@gmail.com', 'Murilo Eduardo dos Santos');
                        $mail->addAddress('drigo_reis@hotmail.com', 'Rodrigo Reis');
                        

                        $mail->isHTML(true);                                  // Set email format to HTML

                        $mail->Subject = 'Oba! Nova mensagem do site';

                        $tipoContato = $modulo2=="orcamento" ? "Orçamento": "Contato";
                        $mail->Body    = '<table>
                                <thead>
                                    <tr>
                                        <td>Cliente Solicitando <strong>' . $tipoContato . '</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nome do cliente:</td>
                                        <td>' . $_POST['name'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Email do cliente:</td>
                                        <td>' . $_POST['email'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Mensagem do cliente:</td>
                                        <td>' . $_POST['message'] . '</td>
                                    </tr>
                                </tbody>
                            </table>';


                        if(!$mail->send()) {
                            echo '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Ó não!</strong> Mensagem não foi enviada.
                                </div>';
                        } else {
                            echo '<div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Agradecemos seu contato!</strong> Mensagem enviada corretamente.
                                </div>';
                        }
                    }
                ?>
                <form class="form-horizontal" action="" method="post">
                    <!-- Name input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Seu nome" class="form-control" required>
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="email" name="email" type="text" placeholder="Seu email" class="form-control" required>
                        </div>
                    </div>

                    <!-- Message body -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" id="message" name="message" placeholder="Porfavor digite sua mensagem aqui..." rows="5" required><?php if($modulo2=="orcamento") echo "Eu desejo receber um orçamento" ?></textarea>
                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg" name="enviarMensagem">Enviar Mensagem<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 bg-metade" style="background-image: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.1)), url('<?php echo URL::getBase() . "server/uploads/" . $contato['imagem'] ?>');">
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive wow fadeInDown"></img>
                <ul class="infos-contatos">
                    <?php if($contato['telefone']): ?>
                        <li><?php echo $contato['telefone'] ?></li>
                    <?php endif ?>
                    <?php if($contato['celular']): ?>
                        <li><?php echo $contato['celular'] ?></li>
                    <?php endif ?>
                    <?php if($contato['email']): ?>
                        <li><?php echo $contato['email'] ?></li>
                    <?php endif ?>
                    <?php if($contato['endereco']): ?>
                        <li><?php echo $contato['endereco'] . " - " . $contato['cidade'] ?></li>
                    <?php endif ?>
                </ul>
                <img src="<?php echo URL::getBase() ?>img/global-swirl-top.png" class="img-responsive wow fadeInUp"></img>
            </div>
        </div>
    </div>
</section>