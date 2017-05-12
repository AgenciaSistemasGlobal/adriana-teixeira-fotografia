<?php
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

		return $find->fetch();
	}

	public function editar($_id=1){

		$imagemManipulada = "";
		if(!empty($this->imagem))
			$imagemManipulada = ", imagem = ?";
		
		$editar = $this->pdo->prepare("UPDATE sobre SET titulo = ?" . $imagemManipulada . ", texto = ? WHERE id = ?");

		$editar->bindValue(1, $this->titulo);

		if(!empty($this->imagem)) {
			$editar->bindValue(2, $this->imagem);
		}

		$editar->bindValue(!empty($this->imagem) ? 3 : 2, $this->texto);
		$editar->bindValue(!empty($this->imagem) ? 4 : 3, $_id);
		$editar->execute();

		return $editar->rowCount();
	}
}
?>