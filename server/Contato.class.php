<?php
class Contato extends Conexao{

	protected $pdo;

	public $endereco;
	public $telefone;
	public $celular;
	public $cidade;
	public $email;
	public $facebook;
	public $instagram;
	public $pinterest;
	public $imagem;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_endereco, $_telefone, $_celular, $_cidade, $_email, $_facebook, $_instagram, $_pinterest, $_imagem){
		
		$this->endereco = $_endereco;
		$this->telefone = $_telefone;
		$this->celular = $_celular;
		$this->cidade = $_cidade;
		$this->email = $_email;
		$this->facebook = $_facebook;
		$this->instagram = $_instagram;
		$this->pinterest = $_pinterest;
		$this->imagem = $_imagem;
	}

	public function find($_id=1){

		$find = $this->pdo->prepare("SELECT * FROM contato WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return $find->fetch();
	}

	public function editar($_id=1){

		$imagemManipulada = "";
		if(!empty($this->imagem))
			$imagemManipulada = ", imagem = ?";
		
		$editar = $this->pdo->prepare("UPDATE contato SET endereco = ?, telefone = ?, celular = ?, cidade = ?, email = ?, facebook = ?, instagram = ?, pinterest = ?" . $imagemManipulada . " WHERE id = ?");

		$editar->bindValue(1, $this->endereco);
		$editar->bindValue(2, $this->telefone);
		$editar->bindValue(3, $this->celular);
		$editar->bindValue(4, $this->cidade);
		$editar->bindValue(5, $this->email);
		$editar->bindValue(6, $this->facebook);
		$editar->bindValue(7, $this->instagram);
		$editar->bindValue(8, $this->pinterest);

		if(!empty($this->imagem)) {
			$editar->bindValue(9, $this->imagem);
		}

		$editar->bindValue(!empty($this->imagem) ? 10 : 9, $_id);
		$editar->execute();

		return $editar->rowCount();
	}
}
?>