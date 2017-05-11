<?php
class Servicos extends Conexao{

	protected $pdo;

	public $nome;
	public $descricao;
	public $imagem;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_nome, $_descricao, $_imagem){
		
		$this->nome = $_nome;
		$this->descricao = $_descricao;
		$this->imagem = $_imagem;
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM servicos WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return parent::utf8ize($find->fetch());
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM servicos");
		$findAll->execute();

		return parent::utf8ize($findAll->fetchAll());
	}

	public function editar($_id){

		$imagemManipulada = "";
		if(!empty($this->imagem))
			$imagemManipulada = ", imagem = ?";
		
		$editar = $this->pdo->prepare("UPDATE servicos SET nome = ?, descricao = ?" . $imagemManipulada . " WHERE id = ?");

		$editar->bindValue(1, $this->nome);
		$editar->bindValue(2, $this->descricao);

		if(!empty($this->imagem)) {
			$editar->bindValue(3, $this->imagem);
		}

		$editar->bindValue(!empty($this->imagem) ? 4 : 3, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM servicos WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO servicos (nome, descricao, imagem) VALUES (?, ?, ?)");
		$cadastrar->bindValue(1, $this->nome);
		$cadastrar->bindValue(2, $this->descricao);
		$cadastrar->bindValue(3, $this->imagem);
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