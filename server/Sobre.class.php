<?php
require_once("Conexao.class.php");

class Sobre extends Conexao{

	protected $pdo;

	public $titulo;
	public $imagem;
	public $texto;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_titulo, $_imagem, $_texto){
		
		$this->titulo = $_titulo;
		$this->imagem = $_imagem;
		$this->texto = $_texto;
	}

	public function find($_id=1){

		$find = $this->pdo->prepare("SELECT * FROM sobre WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return parent::utf8ize($find->fetch());
	}

	public function editar($_id=1){
		
		$editar = $this->pdo->prepare("UPDATE sobre SET titulo = ?, imagem = ?, texto = ? WHERE id = ?");

		$editar->bindValue(1, $this->titulo);
		$editar->bindValue(2, $this->imagem);
		$editar->bindValue(3, $this->texto);
		$editar->bindValue(4, $_id);
		$editar->execute();

		return $editar->rowCount();
	}
}
?>