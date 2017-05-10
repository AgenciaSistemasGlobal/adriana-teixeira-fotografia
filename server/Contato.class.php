<?php
require_once("Conexao.class.php");

class Contato extends Conexao{

	protected $pdo;

	public $endereco;
	public $telefone;
	public $celular;
	public $estado;
	public $cidade;
	public $cep;
	public $email;
	public $facebook;
	public $instagram;
	public $pinterest;
	public $imagem;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_endereco, $_telefone, $_celular, $_estado, $_cidade, $_cep, $_email, $_facebook, $_instagram, $_pinterest, $_imagem){
		
		$this->endereco = $_endereco;
		$this->telefone = $_telefone;
		$this->celular = $_celular;
		$this->estado = $_estado;
		$this->cidade = $_cidade;
		$this->cep = $_cep;
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

		return parent::utf8ize($find->fetch());
	}

	public function editar($_id=1){
		
		$editar = $this->pdo->prepare("UPDATE contato SET endereco = ?, telefone = ?, celular = ?, estado = ?, cidade = ?, cep = ?, email = ?, facebook = ?, instagram = ?, pinterest = ?, imagem = ? WHERE id = ?");

		$editar->bindValue(1, $this->endereco);
		$editar->bindValue(2, $this->telefone);
		$editar->bindValue(3, $this->celular);
		$editar->bindValue(4, $this->estado);
		$editar->bindValue(5, $this->cidade);
		$editar->bindValue(6, $this->cep);
		$editar->bindValue(7, $this->email);
		$editar->bindValue(8, $this->facebook);
		$editar->bindValue(9, $this->instagram);
		$editar->bindValue(10, $this->pinterest);
		$editar->bindValue(11, $this->imagem);
		$editar->bindValue(12, $_id);
		$editar->execute();

		return $editar->rowCount();
	}
}
?>