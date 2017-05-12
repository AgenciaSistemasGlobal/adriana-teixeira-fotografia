<?php
class Usuarios extends Conexao{

	protected $pdo;

	public $nome;
	public $email;
	public $senha;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_nome, $_email, $_senha){
		
		$this->nome = $_nome;
		$this->email = $_email;
		$this->senha = md5($_senha);
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetch();
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM usuarios");
		$findAll->execute();

		return $findAll->fetchAll();
	}

	public function editar($_id){

		$senhaManipulada = "";
		if(!empty($this->senha))
			$senhaManipulada = ", senha = ?";
		
		$editar = $this->pdo->prepare("UPDATE usuarios SET nome = ?, email = ?" . $senhaManipulada . " WHERE id = ?");

		$editar->bindValue(1, $this->nome);
		$editar->bindValue(2, $this->email);
		
		if(!empty($this->senha)) {
			$editar->bindValue(3, $this->senha);
		}

		$editar->bindValue(!empty($this->senha) ? 4 : 3, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
		$cadastrar->bindValue(1, $this->nome);
		$cadastrar->bindValue(2, $this->email);
		$cadastrar->bindValue(3, $this->senha);
		$cadastrar->execute();

		if($this->pdo->lastInsertId() != 0){

			// 1 = Criado com sucesso!
			return 1;
		}else{

			// 2 = Erro interno
			return 0;
		}
	}
}
?>