<?php
    
    require "/server/Banner.class.php";

    $Banner = new Banner();
    $banner = $Banner->findAll();

    if($_POST) {

    	$Banner->setDados(
    		$_POST['titulo'], 
    		$_POST['sub_titulo'], 
    		$_POST['descricao'],
    		$_FILES['imagem']['name']
    	);

    	$target = "./server/uploads/" . basename($_FILES['imagem']['name']);
    	move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Banner->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Banner->editar($_GET['u']);
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
			<h2>Novo Slide</h2>
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
					<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputSubTitulo" class="col-sm-2 control-label">Sub Titulo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSubTitulo" placeholder="Sub Titulo" name="sub_titulo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao" required>
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
						<a href="<?php echo URL::getBase() ?>adm/banner" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$slide = $Banner->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Banner->delete($slide['id']);
			die('<script type="text/javascript">window.location.href="banner";</script>');
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
			<h2>Detalhes do Slide</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($slide): ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<img id="imgPreviewEditarSlide" src="<?php echo URL::getBase() . 'server/uploads/' . $slide['imagem'] ?>" alt="<?php echo $slide['titulo'] ?>" title="<?php echo $slide['titulo'] ?>" class="img-responsive thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" value="<?php echo $slide['titulo'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputSubTitulo" class="col-sm-2 control-label">Sub Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSubTitulo" placeholder="Sub Titulo" name="sub_titulo" value="<?php echo $slide['sub_titulo'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao" required>
								<?php echo $slide['descricao'] ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
						<div class="col-md-10">
							<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewEditarSlide">
							<p class="help-block">A imagem se ajustará automaticamente</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/banner" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Slide não encontrado. <a href="<?php echo URL::getBase() ?>adm/banner">Visualizar todos</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Banner</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./banner/novo" class="btn btn-primary">Novo Slide</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($banner)): ?>
					<div class="row">
						<?php foreach ($banner as $_foto): ?>
							<div class="col-md-4">
								<a href="./banner?u=<?php echo $_foto['id'] ?>" title="<?php echo $_foto['titulo'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-image">
											<img src="<?php echo URL::getBase() . 'server/uploads/' . $_foto['imagem'] ?>" class="img-responsive" title="<?php echo $_foto['titulo'] ?>" alt="<?php echo $_foto['titulo'] ?>">
										</div>
										<div class="panel-body">
											<h4><?php echo $_foto['titulo'] ?></h4>
											<h5><?php echo $_foto['sub_titulo'] ?></h5>
											<p><?php echo $_foto['descricao'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem slides cadastrados, clique em <a href="./banner/novo">Novo Slide</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>