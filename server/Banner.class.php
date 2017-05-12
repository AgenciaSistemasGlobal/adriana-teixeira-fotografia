<?php
class Banner extends Conexao{

	protected $pdo;

	public $titulo;
	public $sub_titulo;
	public $descricao;
	public $imagem;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_titulo, $_sub_titulo, $_descricao, $_imagem){
		
		$this->titulo = $_titulo;
		$this->sub_titulo = $_sub_titulo;
		$this->descricao = $_descricao;
		$this->imagem = $_imagem;
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM banner WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetch();
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM banner");
		$findAll->execute();

		return $findAll->fetchAll();
	}

	public function editar($_id){

		$imagemManipulada = "";
		if(!empty($this->imagem))
			$imagemManipulada = ", imagem = ?";
		
		$editar = $this->pdo->prepare("UPDATE banner SET titulo = ?, sub_titulo = ?, descricao = ?" . $imagemManipulada . " WHERE id = ?");

		$editar->bindValue(1, $this->titulo);
		$editar->bindValue(2, $this->sub_titulo);
		$editar->bindValue(3, $this->descricao);

		if(!empty($this->imagem)) {
			$editar->bindValue(4, $this->imagem);
		}

		$editar->bindValue(!empty($this->imagem) ? 5 : 4, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM banner WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO banner (titulo, sub_titulo, descricao, imagem) VALUES (?, ?, ?, ?)");
		$cadastrar->bindValue(1, $this->titulo);
		$cadastrar->bindValue(2, $this->sub_titulo);
		$cadastrar->bindValue(3, $this->descricao);
		$cadastrar->bindValue(4, $this->imagem);
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