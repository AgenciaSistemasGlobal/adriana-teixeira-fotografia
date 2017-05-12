<?php
    
    require "/server/Fotos.class.php";
    require "/server/Albuns.class.php";

    $Albuns = new Albuns();
    $albuns = $Albuns->findAll();

    $Fotos = new Fotos();
    $fotos = $Fotos->findAll();

    if($_POST) {
    	$Fotos->setDados(
    		$_POST['id_album'], 
    		$_POST['titulo'], 
    		$_POST['descricao'],
    		$_FILES['imagem']['name']
    	);

    	$target = "./server/uploads/" . basename($_FILES['imagem']['name']);
    	move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Fotos->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Fotos->editar($_GET['u']);
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
			<h2>Nova Foto</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<div class="col-md-10 col-md-offset-2">
						<img src="" alt="" id="imgPreviewNovaFoto" class="img-responsive thumbnail">
					</div>
				</div>

				<div class="form-group">
					<label for="inputId_album" class="col-sm-2 control-label">Albuns</label>
					<div class="col-sm-10">
						<select name="id_album" id="inputId_album" required class="form-control">
							<option value="" disabled selected>Selecione</option>
							<?php foreach ($albuns as $_album): ?>
								<option value="<?php echo $_album['id'] ?>"><?php echo $_album['titulo'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao">
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
					<div class="col-md-10">
						<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewNovaFoto" required>
						<p class="help-block">A imagem se ajustará automaticamente</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="cadastrar">Salvar</button>
						<a href="<?php echo URL::getBase() ?>adm/fotos" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$foto = $Fotos->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Fotos->delete($foto['id']);
			die('<script type="text/javascript">window.location.href="fotos";</script>');
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
			<h2>Detalhes da Foto</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($foto): ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<img id="imgPreviewEditarFoto" src="<?php echo URL::getBase() . 'server/uploads/' . $foto['imagem'] ?>" alt="<?php echo $foto['titulo'] ?>" title="<?php echo $foto['titulo'] ?>" class="img-responsive thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="inputId_album" class="col-sm-2 control-label">Album</label>
						<div class="col-sm-10">
							<select name="id_album" id="inputId_album" required class="form-control">
								<option value="" disabled>Selecione</option>
								<?php foreach ($albuns as $_album): ?>
									<option value="<?php echo $_album['id'] ?>" <?php echo $foto['id_album'] == $_album['id'] ? 'selected' : '' ?>><?php echo $_album['titulo'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" value="<?php echo $foto['titulo'] ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao">
								<?php echo $foto['descricao'] ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
						<div class="col-md-10">
							<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewEditarFoto">
							<p class="help-block">A imagem se ajustará automaticamente</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/fotos" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Foto não encontrada. <a href="<?php echo URL::getBase() ?>adm/fotos">Visualizar todas</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Fotos</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./fotos/novo" class="btn btn-primary">Nova Foto</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($fotos)): ?>
					<div class="row">
						<?php foreach ($fotos as $_foto): ?>
							<div class="col-md-4">
								<a href="./fotos?u=<?php echo $_foto['id'] ?>" title="<?php echo $_foto['titulo'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-image">
											<img src="<?php echo URL::getBase() . 'server/uploads/' . $_foto['imagem'] ?>" class="img-responsive" title="<?php echo $_foto['titulo'] ?>" alt="<?php echo $_foto['titulo'] ?>">
										</div>
										<div class="panel-body">
											<h4><?php echo $_foto['titulo'] ?></h4>
											<p><?php echo $_foto['descricao'] ?></p>
											<span class="label label-primary"><?php echo $_foto['nomeAlbum'] ?></span>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem fotos cadastrados, clique em <a href="./fotos/novo">Nova Foto</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>