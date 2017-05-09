<?php
    
    require "/server/Sobre.class.php";

    $Sobre = new Sobre();

    $sobre = $Sobre->find();

    $retornoEditar = null;
    if(!empty($_POST)) {
    	
    	$editarTitulo = $_POST['titulo'] ? $_POST['titulo'] : '';
    	$editarImagem = $_POST['imagem'] ? $_POST['imagem'] : '';
    	$editarTexto = $_POST['texto'] ? $_POST['texto'] : '';

    	$Sobre->setDados($editarTitulo, $editarImagem, $editarTexto);
    	
    	$retornoEditar = $Sobre->editar();

    	$sobre = $Sobre->find();
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
		<div class="content-box-large">
			<div class="panel-heading">
				<div class="panel-title">Sobre</div>
				<!-- <div class="panel-options">
					<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
				</div> -->
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Email" value="<?php echo $sobre['titulo'] ?>" name="titulo" required>
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
						<label class="col-sm-2 control-label" for="ckeditor_full">Texto</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Textarea" rows="10" name="texto" id="ckeditor_full" required>
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