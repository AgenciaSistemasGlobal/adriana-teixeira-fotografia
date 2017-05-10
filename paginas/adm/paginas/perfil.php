<?php
    
    require "/server/Usuarios.class.php";

    $Usuarios = new Usuarios();
    $usuarios = $Usuarios->findAll();
    $usuario = $Usuarios->find(1);

    if($_POST) {
    	$Usuarios->setDados(
    		$_POST['nome'], 
    		$_POST['email'],
    		$_POST['senha']
    	);
    }

    $retornoEditar="";
    if(isset($_POST['editar'])) {

    	$retornoEditar = $Usuarios->editar($usuario['id']);
    }
?>

<?php if($retornoEditar): ?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Sucesso!</strong> Os dados foram alterados.
	</div>
<?php endif ?>
<div class="content-box-large">
	<div style="margin-top: 0" class="page-header">
		<h2>Perfil</h2>
	</div>
	<div class="panel-body">
		<!-- Content -->
		<?php if($usuario): ?>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" placeholder="Seu Nome" name="nome" value="<?php echo $usuario['nome'] ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" placeholder="Seu E-mail" name="email" value="<?php echo $usuario['email'] ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputSenha" placeholder="Sua Senha" name="senha">
						<p class="help-block">Deixe em branco para continuar com a mesma senha</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="editar">Editar</button>
						<a href="<?php echo URL::getBase() ?>adm/servicos" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		<?php endif ?>
	</div>
</div>