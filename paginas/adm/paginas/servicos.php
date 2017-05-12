<?php
    
    require "/server/Servicos.class.php";

    $Servicos = new Servicos();

    $servicos = $Servicos->findAll();

    if($_POST) {
    	$Servicos->setDados(
    		$_POST['nome'], 
    		$_POST['descricao'], 
    		$_FILES['imagem']['name']
    	);

    	$target = "./server/uploads/" . basename($_FILES['imagem']['name']);
    	move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Servicos->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Servicos->editar($_GET['u']);
    }
?>

<?php if($modulo3 == "novo"): ?>
	<?php if($retornoCadastrar): ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Sucesso!</strong> Os dados foram cadastrados.
		</div>
	<?php endif ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Novo Serviço</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					
				<div class="form-group">
					<div class="col-md-10 col-md-offset-2">
						<img src="" alt="" id="imgPreviewNovoServico" class="img-responsive thumbnail">
					</div>
				</div>

				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="ckeditor_full">Descrição</label>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Descrição" name="descricao" id="ckeditor_full" required>
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
					<div class="col-md-10">
						<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewNovoServico">
						<p class="help-block">A imagem se ajustará automaticamente</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="cadastrar">Salvar</button>
						<a href="<?php echo URL::getBase() ?>adm/servicos" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$servico = $Servicos->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Servicos->delete($servico['id']);
			die('<script type="text/javascript">window.location.href="servicos";</script>');
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
			<h2>Detalhes do Serviço</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($servico): ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<img id="imgPreviewEditarServico" src="<?php echo URL::getBase() . 'server/uploads/' . $servico['imagem'] ?>" alt="<?php echo $servico['nome'] ?>" title="<?php echo $servico['nome'] ?>" class="img-responsive thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="<?php echo $servico['nome'] ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="ckeditor_full">Descrição</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Descrição" name="descricao" id="ckeditor_full" required>
								<?php echo $servico['descricao'] ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
						<div class="col-md-10">
							<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewEditarServico">
							<p class="help-block">A imagem se ajustará automaticamente</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/servicos" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Serviço não encontrado. <a href="<?php echo URL::getBase() ?>adm/servicos">Visualizar todos</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Serviços</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./servicos/novo" class="btn btn-primary">Novo Serviço</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($servicos)): ?>
					<div class="row">
						<?php foreach ($servicos as $_servico): ?>
							<div class="col-md-4">
								<a href="./servicos?u=<?php echo $_servico['id'] ?>" title="<?php echo $_servico['nome'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-image">
											<img src="<?php echo URL::getBase() . 'server/uploads/' . $_servico['imagem'] ?>" class="img-responsive" title="<?php echo $_servico['nome'] ?>" alt="<?php echo $_servico['nome'] ?>">
										</div>
										<div class="panel-body">
											<h4><?php echo $_servico['nome'] ?></h4>
											<p><?php echo $_servico['descricao'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem serviços cadastrados, clique em <a href="./servicos/novo">Novo Serviço</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>