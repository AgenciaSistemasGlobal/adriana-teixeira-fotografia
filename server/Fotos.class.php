<?php
class Fotos extends Conexao{

	protected $pdo;

	public $id_album;
	public $titulo;
	public $descricao;
	public $imagem;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_id_album, $_titulo, $_descricao, $_imagem){
		
		$this->id_album = $_id_album;
		$this->titulo = $_titulo;
		$this->descricao = $_descricao;
		$this->imagem = $_imagem;
	}

	public function find($_id){

		$find = $this->pdo->prepare("
			SELECT fts.id,
				fts.id_album,
				fts.titulo,
				fts.descricao,
				fts.imagem,
				albs.titulo as nomeAlbum,
				albs.id as idAlbum
			FROM fotos fts
			INNER JOIN albuns albs
			ON fts.id_album = albs.id
			WHERE fts.id = ?
		");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetch();
	}

	public function findByAlbum($_id){

		$findAll = $this->pdo->prepare("
			SELECT fts.id,
				fts.id_album,
				fts.titulo,
				fts.descricao,
				fts.imagem,
				albs.titulo as nomeAlbum,
				albs.id as idAlbum
			FROM fotos fts
			INNER JOIN albuns albs
			ON fts.id_album = albs.id
			WHERE fts.id_album = ?
		");

		$findAll->bindValue(1, $_id);
		$findAll->execute();

		return $findAll->fetchAll();
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("
			SELECT fts.id,
				fts.id_album,
				fts.titulo,
				fts.descricao,
				fts.imagem,
				albs.titulo as nomeAlbum,
				albs.id as idAlbum
			FROM fotos fts
			INNER JOIN albuns albs
			ON fts.id_album = albs.id
		");

		$findAll->execute();

		return $findAll->fetchAll();
	}

	public function editar($_id){

		$imagemManipulada = "";
		if(!empty($this->imagem))
			$imagemManipulada = ", imagem = ?";
		
		$editar = $this->pdo->prepare("UPDATE fotos SET id_album = ?, titulo = ?, descricao = ?" . $imagemManipulada . " WHERE id = ?");

		$editar->bindValue(1, $this->id_album);
		$editar->bindValue(2, $this->titulo);
		$editar->bindValue(3, $this->descricao);
		
		if(!empty($this->imagem)) {
			$editar->bindValue(4, $this->imagem);
		}

		$editar->bindValue(!empty($this->imagem) ? 5 : 4, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM fotos WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO fotos (id_album, titulo, descricao, imagem) VALUES (?, ?, ?, ?)");
		$cadastrar->bindValue(1, $this->id_album);
		$cadastrar->bindValue(2, $this->titulo);
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