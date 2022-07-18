<?php
class Database{

	private $host = '127.0.0.1';
	private $db_name = 'maredb';
	private $username = 'root';
	private $password = '@Bakugou99';
	public $conn;
	
	public function getConnection(){
		$this->conn = null;
		
        try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $exception){
			echo "Errore di connessione: " . $exception->getMessage();
		}
		    return $this->conn;
		}
	}
?>