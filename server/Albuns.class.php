<?php
require_once("Conexao.class.php");

class Albuns extends Conexao{

	protected $pdo;

	public $id_servico;
	public $titulo;
	public $descricao;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_id_servico, $_titulo, $_descricao){
		
		$this->id_servico = $_id_servico;
		$this->titulo = $_titulo;
		$this->descricao = $_descricao;
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM albuns WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return parent::utf8ize($find->fetch());
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("
			SELECT albs.id,
				albs.titulo,
				albs.descricao,
				srvcs.nome
			FROM albuns albs
			INNER JOIN servicos srvcs
			ON albs.id_servico = srvcs.id");

		$findAll->execute();

		return parent::utf8ize($findAll->fetchAll());
	}

	public function editar($_id){
		
		$editar = $this->pdo->prepare("UPDATE albuns SET id_servico = ?, titulo = ?, descricao = ? WHERE id = ?");

		$editar->bindValue(1, $this->id_servico);
		$editar->bindValue(2, $this->titulo);
		$editar->bindValue(3, $this->descricao);
		$editar->bindValue(4, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM albuns WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO albuns (id_servico, titulo, descricao) VALUES (?, ?, ?)");
		$cadastrar->bindValue(1, $this->id_servico);
		$cadastrar->bindValue(2, $this->titulo);
		$cadastrar->bindValue(3, $this->descricao);
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