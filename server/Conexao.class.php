<?php
/**
* Classe responsável pela conexão com o banco Mysql
*/
abstract class Conexao{

	const HOST = "localhost";
	const USER = "root";
	const PASS = "";
	const DB = "adriana-teixeira-fotografia";

	/*const HOST = "mysql.hostinger.com.br";
    const USER = "u133061497_muril";
	const PASS = "lilo0202";
	const DB = "u133061497_extin";*/

	private static $instance = null;

	private static function conectar(){

		try {

			if(self::$instance == null){
				$dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DB;
				self::$instance = new PDO($dsn, self::USER, self::PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		} catch (PDOException $e) {

			echo "Erro: " . $e->getMessage();
		}

		return self::$instance;
	}

	protected static function getDB(){
		return self::conectar();
	}

	protected static function utf8ize($d){
		if (is_array($d)) {
	        foreach ($d as $k => $v) {
	            $d[$k] = self::utf8ize($v);
	        }
	    } else if (is_string ($d)) {
	        return utf8_encode($d);
	    }
	    return $d;
	}
}
?>