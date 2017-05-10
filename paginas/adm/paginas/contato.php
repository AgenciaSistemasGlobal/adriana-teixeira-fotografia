<?php
    
    require "/server/Contato.class.php";

    $Contato = new Contato();

    $contato = $Contato->find();

    $retornoEditar = null;
    if(isset($_POST['submit'])) {

    	$target = "./server/uploads/" . basename($_FILES['imagem']['name']);

    	$Contato->setDados(
    		$_POST['endereco'], 
    		$_POST['telefone'], 
    		$_POST['celular'], 
    		$_POST['estado'], 
    		$_POST['cidade'], 
    		$_POST['cep'], 
    		$_POST['email'], 
    		$_POST['facebook'], 
    		$_POST['instagram'], 
    		$_POST['pinterest'], 
    		$_FILES['imagem']['name']
    	);
    	
    	$retornoEditar = $Contato->editar();

    	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {

    		$contato = $Contato->find();
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
				<h1>Contato</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<img id="imgPreviewContato" src="<?php echo URL::getBase() . 'server/uploads/' . $contato['imagem'] ?>" alt="<?php echo $contato['endereco'] ?>" title="<?php echo $contato['endereco'] ?>" class="img-responsive thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEndereco" placeholder="Endereço" value="<?php echo $contato['endereco'] ?>" name="endereco" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" value="<?php echo $contato['telefone'] ?>" name="telefone" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputCelular" class="col-sm-2 control-label">Celular</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputCelular" placeholder="Celular" value="<?php echo $contato['celular'] ?>" name="celular" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEstado" class="col-sm-2 control-label">Estado</label>
						<div class="col-sm-10">
							<select name="estado" id="inputEstado" class="form-control" required value="<?php echo $contato['estado'] ?>">
								<option value="RS">RS</option>
								<option value="RJ">RJ</option>
								<option value="SP">SP</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputCidade" class="col-sm-2 control-label">Cidade</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputCidade" placeholder="Cidade" value="<?php echo $contato['cidade'] ?>" name="cidade" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputCep" class="col-sm-2 control-label">Cep</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputCep" placeholder="Cep" value="<?php echo $contato['cep'] ?>" name="cep" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail" placeholder="E-mail" value="<?php echo $contato['email'] ?>" name="email" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputFacebook" class="col-sm-2 control-label">Facebook</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputFacebook" placeholder="Facebook" value="<?php echo $contato['facebook'] ?>" name="facebook">
						</div>
					</div>

					<div class="form-group">
						<label for="inputInstagram" class="col-sm-2 control-label">Instagram</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputInstagram" placeholder="Instagram" value="<?php echo $contato['instagram'] ?>" name="instagram">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPinterest" class="col-sm-2 control-label">Pinterest</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputPinterest" placeholder="Pinterest" value="<?php echo $contato['pinterest'] ?>" name="pinterest">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputImagem">Imagem</label>
						<div class="col-md-10">
							<input type="file" class="btn btn-default uploadPreview" id="inputImagem" name="imagem" data-imgpreview="imgPreviewContato" required>
							<p class="help-block">A imagem se ajustará automaticamente</p>
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