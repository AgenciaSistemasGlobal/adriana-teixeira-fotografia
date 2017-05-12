<?php
    
    require "server/Clientes.class.php";

    $Clientes = new Clientes();

    $clientes = $Clientes->findAll();

    if($_POST) {
    	$Clientes->setDados(
    		$_POST['nome'], 
    		$_POST['email'],
    		$_POST['endereco'],
    		$_POST['telefone'],
    		$_POST['data_nascimento']
    	);
    }

    $retornoEditar="";
    $retornoCadastrar="";
    if(isset($_POST['cadastrar'])) {
    	
    	$retornoCadastrar = $Clientes->cadastrar();
    } elseif(isset($_POST['editar'])) {

    	$retornoEditar = $Clientes->editar($_GET['u']);
    }
?>

<?php if($modulo3 == "novo"): ?>
	
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Novo Cliente</h2>
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
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputEndereco" class="col-sm-2 control-label">Endereço Completo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEndereco" placeholder="Endereço Completo" name="endereco" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" name="telefone" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputDataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="inputDataNascimento" placeholder="Data de Nascimento" name="data_nascimento" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="cadastrar">Salvar</button>
						<a href="<?php echo URL::getBase() ?>adm/clientes" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	elseif(isset($_GET['u'])):

		$cliente = $Clientes->find($_GET['u']);

		if(isset($_GET['del'])) {
			$retornoDeletar = $Clientes->delete($cliente['id']);
			die('<script type="text/javascript">window.location.href="clientes";</script>');
		}
?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h2>Detalhes do Cliente</h2>
		</div>
		<div class="panel-body">
			<!-- Content -->
			<?php if($cliente): ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<?php if($retornoEditar): ?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Sucesso!</strong> Os dados foram alterados.
						</div>
					<?php endif ?>

					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="<?php echo $cliente['nome'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email" value="<?php echo $cliente['email'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEndereco" class="col-sm-2 control-label">Endereço Completo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEndereco" placeholder="Endereço Completo" name="endereco" value="<?php echo $cliente['endereco'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" name="telefone" value="<?php echo $cliente['telefone'] ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputDataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="inputDataNascimento" placeholder="Data de Nascimento" name="data_nascimento" value="<?php echo $cliente['data_nascimento'] ?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="editar">Editar</button>
							<a href="?u=<?php echo $_GET['u'] ?>&del=1" class="btn btn-danger">Deletar</a>
							<a href="<?php echo URL::getBase() ?>adm/clientes" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			<?php else: ?>
				<div class="alert alert-info">
					Cliente não encontrado. <a href="<?php echo URL::getBase() ?>adm/clientes">Visualizar todos</a>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php else: ?>
	<div class="content-box-large">
		<div style="margin-top: 0" class="page-header">
			<h1>Clientes</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<a href="./clientes/novo" class="btn btn-primary">Novo Cliente</a>
				</div>
			</div>
			<div class="row">
				<?php if(count($clientes)): ?>
					<div class="row">
						<?php foreach ($clientes as $_cliente): ?>
							<div class="col-md-4">
								<a href="./clientes?u=<?php echo $_cliente['id'] ?>" title="<?php echo $_cliente['nome'] ?>">
									<div class="panel panel-default panel-card">
										<div class="panel-body">
											<h4><?php echo $_cliente['nome'] ?></h4>
											<h5><?php echo $_cliente['endereco'] ?></h5>
											<h6><?php echo $_cliente['telefone'] ?></h6>
											<p><?php echo $_cliente['data_nascimento'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Sem clientes cadastrados, clique em <a href="./clientes/novo">Novo Cliente</a>.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif ?>