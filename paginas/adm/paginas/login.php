<?php

	if(isset($_POST) && !empty($_POST)) {
		$login = $_POST['email'];
		$senha = $_POST['senha'];
	}
	 
	if(isset($_POST['remember'])){
	    $remember = $_POST['remember'];
	}

	$respostaLogin=NULL;
	if (!empty($login) && !empty($senha)) {
	 
	    $l = new Login;
	    $l->setLogin($login);
	    $l->setSenha(md5($senha));
	 
	    if(isset($remember) && $remember == "on"){
	        $l->setRemember();
	    }

	    if($l->logar()){
	        $respostaLogin=1;
	        header("Location: " . URL::getBase() . "adm");
	    }else{
	        $respostaLogin=0;
	    }
	}
?>
<div class="page-content container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-wrapper">
				<?php if(!is_null($respostaLogin)): ?>
					<div class="alert alert-<?php echo $respostaLogin ? 'success' : 'danger' ?>">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php echo $respostaLogin ? 'Login efetuado com sucesso!' : 'E-mail e/ou senha incorretos' ?>
					</div>
				<?php endif ?>
		        <div class="box">
		            <div class="content-wrap">
		                <h6>Entrar</h6>
		                <form action="" method="post">
			                <input class="form-control" type="text" placeholder="E-mail" name="email" required>
			                <input class="form-control" type="password" placeholder="Senha" name="senha" required>
							<div class="checkbox text-left">
								<label><input type="checkbox" name="remember"> Permanecer logado</label>
							</div>
			                <div class="action">
			                    <input type="submit" value="Login" class="btn btn-primary signup form-control">
			                </div>
		                </form>      
		            </div>
		        </div>
		        <br>
		        <a href="<?php echo URL::getBase() ?>" class="">Ir Para o Site</a>
		    </div>
		</div>
	</div>
</div>