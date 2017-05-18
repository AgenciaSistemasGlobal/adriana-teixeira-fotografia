<?php
class Albuns extends Conexao{

	protected $pdo;

	public $id_servico;
	public $titulo;
	public $descricao;
	public $data;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_id_servico, $_titulo, $_descricao, $_data){
		
		$this->id_servico = $_id_servico;
		$this->titulo = $_titulo;
		$this->descricao = $_descricao;
		$this->data = $_data;
	}

	public function find($_id){

		$find = $this->pdo->prepare("
			SELECT fts.id as idFoto,
				fts.imagem as imagemFoto,
				fts.titulo as imagemTitulo,
				fts.descricao as imagemDescricao,
				albs.titulo,
				albs.descricao,
				albs.data,
				albs.id_servico,
				albs.id
			FROM albuns albs
			LEFT JOIN fotos fts
			ON albs.id = fts.id_album
			WHERE albs.id = ?
		");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetch();
	}

	public function findByServicos($_id){

		$find = $this->pdo->prepare("
			SELECT fts.id as idFoto,
				fts.imagem as imagemFoto,
				fts.titulo as imagemTitulo,
				fts.descricao as imagemDescricao,
				albs.titulo,
				albs.descricao,
				albs.id_servico,
				albs.data,
				albs.id
			FROM albuns albs
			LEFT OUTER JOIN fotos fts 
			ON albs.id = fts.id_album 
			WHERE albs.id_servico = ?
			ORDER BY albs.id
		");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetchAll();
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM albuns");

		$findAll->execute();

		return $findAll->fetchAll();
	}

	public function editar($_id){
		
		$editar = $this->pdo->prepare("UPDATE albuns SET id_servico = ?, titulo = ?, descricao = ?, data = ? WHERE id = ?");

		$editar->bindValue(1, $this->id_servico);
		$editar->bindValue(2, $this->titulo);
		$editar->bindValue(3, $this->descricao);
		$editar->bindValue(4, $this->data);
		$editar->bindValue(5, $_id);
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
		$cadastrar = $this->pdo->prepare("INSERT INTO albuns (id_servico, titulo, descricao, data) VALUES (?, ?, ?, ?)");
		$cadastrar->bindValue(1, $this->id_servico);
		$cadastrar->bindValue(2, $this->titulo);
		$cadastrar->bindValue(3, $this->descricao);
		$cadastrar->bindValue(4, $this->data);
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