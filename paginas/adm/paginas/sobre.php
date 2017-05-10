<?php
    
    require "/server/Sobre.class.php";

    $Sobre = new Sobre();

    $sobre = $Sobre->find();

    $retornoEditar = null;
    if(isset($_POST['submit'])) {

    	$target = "./server/uploads/" . basename($_FILES['imagem']['name']);

    	$Sobre->setDados($_POST['titulo'], $_FILES['imagem']['name'], $_POST['texto']);
    	
    	$retornoEditar = $Sobre->editar();

    	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {

    		$sobre = $Sobre->find();
    	}
    }
?>
<div class="row">
	<div class="col-md-12">
		<?php if($retornoEditar): ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Sucesso!</strong> Os dados foram alterados.
			</div>
		<?php endif ?>
		<div class="content-box-large panel">
			<div style="margin-top: 0" class="page-header">
				<h1>Sobre</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<img src="<?php echo URL::getBase() . 'server/uploads/' . $sobre['imagem'] ?>" alt="<?php echo $sobre['titulo'] ?>" title="<?php echo $sobre['titulo'] ?>" class="img-responsive thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" value="<?php echo $sobre['titulo'] ?>" name="titulo" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
						<div class="col-md-10">
							<input type="file" class="btn btn-default" id="inputImagem" name="imagem">
							<p class="help-block">A imagem se ajustará automaticamente</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputTexto">Texto</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Texto" name="texto" id="inputTexto" required>
								<?php echo $sobre['texto'] ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="submit">Salvar</button>
							<a href="<?php echo URL::getBase() ?>adm" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>