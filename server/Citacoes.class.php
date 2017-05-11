<?php
class Citacoes extends Conexao{

	protected $pdo;

	public $titulo;
	public $descricao;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_titulo, $_descricao){
		
		$this->titulo = $_titulo;
		$this->descricao = $_descricao;
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM citacoes WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return parent::utf8ize($find->fetch());
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM citacoes");
		$findAll->execute();

		return parent::utf8ize($findAll->fetchAll());
	}

	public function editar($_id){
		
		$editar = $this->pdo->prepare("UPDATE citacoes SET titulo = ?, descricao = ? WHERE id = ?");

		$editar->bindValue(1, $this->titulo);
		$editar->bindValue(2, $this->descricao);
		$editar->bindValue(3, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM citacoes WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO citacoes (titulo, descricao) VALUES (?, ?)");
		$cadastrar->bindValue(1, $this->titulo);
		$cadastrar->bindValue(2, $this->descricao);
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