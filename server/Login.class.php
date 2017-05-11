<?php
class Login extends Conexao{

	private $login;
	private $senha;
	private $remember;

	public function setLogin($login){
		$this->login = $login;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function setRemember(){
		$this->remember = md5('sudo_' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
	}

	public function getLogin(){
		return $this->login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function getRemember(){
		return $this->remember;
	}

	public function logar(){
		$pdo = parent::getDB();

		$logar = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
		$logar->bindValue(1, $this->getLogin());
		$logar->bindValue(2, $this->getSenha());
		$logar->execute();

		if($logar->rowCount() == 1){

			$dados = $logar->fetch(PDO::FETCH_OBJ);

			if(!empty($this->remember)){
				setcookie("_token", $this->getRemember(), time() + (86400 * 30), "/");
			}

			$_SESSION['sudo_su']     = $dados->id;
			$_SESSION['sudo_email']  = $dados->email;
			$_SESSION['sudo_nome']   = $dados->nome;
			$_SESSION['sudo_logado'] = true;

			return true;
		}else{
			return false;
		}
	}

	public static function logout($_baseurl=""){

		if (isset($_SESSION['sudo_logado'])) {
			unset($_SESSION['sudo_logado']);
			session_destroy();
			header("Location: " . $_baseurl . "adm/login");
		}
	}
}
?>