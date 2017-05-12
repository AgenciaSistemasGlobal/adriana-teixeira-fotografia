<?php
    
    require "server/Albuns.class.php";
    require "server/Servicos.class.php";
    require "server/Fotos.class.php";

    $Albuns = new Albuns();
    $albuns = $Albuns->findAll();

    $Servicos = new Servicos();
    $servicos = $Servicos->findAll();

    $Fotos = new Fotos();

    if($_POST) {
    	$Albuns->setDados(
    		$_POST['id_servico'], 
    		$_POST['titulo'], 
    		$_POST['descricao'],
    		$_POST['data']
    	);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Albuns->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Albuns->editar($_GET['u']);
    }
?>

<?php if($modulo3 == "novo"): ?>
	
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Novo Album</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<?php if($retornoCadastrar): ?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Sucesso!</strong> Os dados foram cadastrados.
					</div>
				<?php endif ?>

				<div class="form-group">
					<label for="inputId_servico" class="col-sm-2 control-label">Serviço</label>
					<div class="col-sm-10">
						<select name="id_servico" id="inputId_servico" required class="form-control">
							<option value="" disabled selected>Selecione</option>
							<?php foreach ($servicos as $_servico): ?>
								<option value="<?php echo $_servico['id'] ?>"><?php echo $_servico['nome'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputData" class="col-sm-2 control-label">Data da Realização</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="inputData" placeholder="Data" name="data" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="cadastrar">Salvar</button>
						<a href="<?php echo URL::getBase() ?>adm/albuns" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$album = $Albuns->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Albuns->delete($album['id']);
			die('<script type="text/javascript">window.location.href="albuns";</script>');
		}
?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Detalhes do Album</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($album): ?>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<?php if($retornoEditar): ?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Sucesso!</strong> Os dados foram alterados.
						</div>
					<?php endif ?>

					<div class="form-group">
						<label for="inputId_servico" class="col-sm-2 control-label">Serviço</label>
						<div class="col-sm-10">
							<select name="id_servico" id="inputId_servico" required class="form-control">
								<option value="" disabled>Selecione</option>
								<?php foreach ($servicos as $_servico): ?>
									<option value="<?php echo $_servico['id'] ?>" <?php echo $album['id_servico'] == $_servico['id'] ? 'selected' : '' ?>><?php echo $_servico['nome'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" value="<?php echo $album['titulo'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao" required><?php echo $album['descricao'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="inputData" class="col-sm-2 control-label">Data da Realização</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="inputData" placeholder="Data" name="data" value="<?php echo $album['data'] ?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/albuns" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Album não encontrado. <a href="<?php echo URL::getBase() ?>adm/albuns">Visualizar todos</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Albuns</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./albuns/novo" class="btn btn-primary">Novo Album</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($albuns)): ?>
					<div class="row">
						<?php foreach ($albuns as $_album): ?>
							<?php $fotoByAlbum = $Fotos->findByAlbum($_album['id'])[0] ?>
							<div class="col-md-4">
								<a href="./albuns?u=<?php echo $_album['id'] ?>" title="<?php echo $_album['titulo'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-image">
											<img src="<?php echo URL::getBase() . 'server/uploads/' . (empty($fotoByAlbum['imagem']) ? 'nophoto.svg' : $fotoByAlbum['imagem']) ?>" class="img-responsive" title="<?php echo $fotoByAlbum['titulo'] ?>" alt="<?php echo $fotoByAlbum['titulo'] ?>">
										</div>
										<div class="panel-body">
											<a href="?u=<?php echo $_album['id'] ?>&del=1" class="btn btn-danger pull-right">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</a>
											<h4><?php echo $_album['titulo'] ?></h4>
											<p><?php echo $_album['descricao'] ?></p>
											<span class="label label-primary"><?php echo $Servicos->find($_album['id_servico'])['nome'] ?></span>
											<span class="label label-success"><?php echo $_album['data'] ?></span>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem albuns cadastrados, clique em <a href="./albuns/novo">Novo Album</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>