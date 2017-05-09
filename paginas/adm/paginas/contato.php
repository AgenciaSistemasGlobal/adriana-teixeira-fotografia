<div class="row">
	<div class="col-lg-12">
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
						<label class="col-sm-2 control-label" for="inputTexto">Texto</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Textarea" rows="10" name="texto" id="inputTexto" required>
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