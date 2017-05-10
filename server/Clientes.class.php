<?php
require_once("Conexao.class.php");

class Clientes extends Conexao{

	protected $pdo;

	public $nome;
	public $email;
	public $endereco;
	public $telefone;
	public $data_nascimento;

	function __construct(){
		$this->pdo = parent::getDB();
	}

	public function setDados($_nome, $_email, $_endereco, $_telefone, $_data_nascimento){
		
		$this->nome = $_nome;
		$this->email = $_email;
		$this->endereco = $_endereco;
		$this->telefone = $_telefone;
		$this->data_nascimento = $_data_nascimento;
	}

	public function find($_id){

		$find = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ?");
		$find->bindValue(1, $_id);
		$find->execute();

		return parent::utf8ize($find->fetch());
	}

	public function findAll(){

		$findAll = $this->pdo->prepare("SELECT * FROM clientes");
		$findAll->execute();

		return parent::utf8ize($findAll->fetchAll());
	}

	public function editar($_id){
		
		$editar = $this->pdo->prepare("UPDATE clientes SET nome = ?, email = ?, endereco = ?, telefone = ?, data_nascimento = ? WHERE id = ?");

		$editar->bindValue(1, $this->nome);
		$editar->bindValue(2, $this->email);
		$editar->bindValue(3, $this->endereco);
		$editar->bindValue(4, $this->telefone);
		$editar->bindValue(5, $this->data_nascimento);
		$editar->bindValue(6, $_id);
		$editar->execute();

		return $editar->rowCount();
	}

	public function delete($_id){
		$delete = $this->pdo->prepare("DELETE FROM clientes WHERE id = ?");
		$delete->bindValue(1, $_id);
		$delete->execute();

		return $delete->rowCount();
	}

	public function cadastrar(){

		// Se nao cadastra novo participante
		$cadastrar = $this->pdo->prepare("INSERT INTO clientes (nome, email, endereco, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?)");
		$cadastrar->bindValue(1, $this->nome);
		$cadastrar->bindValue(2, $this->email);
		$cadastrar->bindValue(3, $this->endereco);
		$cadastrar->bindValue(4, $this->telefone);
		$cadastrar->bindValue(5, $this->data_nascimento);
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