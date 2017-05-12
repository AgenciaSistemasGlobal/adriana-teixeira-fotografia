<?php
    
    require "server/Citacoes.class.php";

    $Citacoes = new Citacoes();
    $citacoes = $Citacoes->findAll();

    if($_POST) {
    	$Citacoes->setDados(
    		$_POST['titulo'], 
    		$_POST['descricao']
    	);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Citacoes->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Citacoes->editar($_GET['u']);
    }
?>

<?php if($modulo3 == "novo"): ?>
	
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Nova Citação</h2>
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
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="cadastrar">Salvar</button>
						<a href="<?php echo URL::getBase() ?>adm/citacoes" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$citacao = $Citacoes->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Citacoes->delete($citacao['id']);
			die('<script type="text/javascript">window.location.href="citacoes";</script>');
		}
?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Detalhes da Citação</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($citacao): ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<?php if($retornoEditar): ?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Sucesso!</strong> Os dados foram alterados.
						</div>
					<?php endif ?>

					<div class="form-group">
						<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="titulo" value="<?php echo $citacao['titulo'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="inputDescricao">Descrição</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Descrição" name="descricao" id="inputDescricao" required><?php echo $citacao['descricao'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/citacoes" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Citação não encontrado. <a href="<?php echo URL::getBase() ?>adm/citacoes">Visualizar todas</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Citações</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./citacoes/novo" class="btn btn-primary">Nova Citação</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($citacoes)): ?>
					<div class="row">
						<?php foreach ($citacoes as $_citacao): ?>
							<div class="col-md-4">
								<a href="./citacoes?u=<?php echo $_citacao['id'] ?>" title="<?php echo $_citacao['titulo'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-body">
											<h4><?php echo $_citacao['titulo'] ?></h4>
											<p><?php echo $_citacao['descricao'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem citações cadastradas, clique em <a href="./citacoes/novo">Nova Citação</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>