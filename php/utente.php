<?php
class Utente{
    
	private $conn;
	private $table = 'utenti';
	public $nome;
	public $cognome;
	public $email;
	public $password;
	public $role;
	public $id;

	public function __construct($db, $nome, $cognome, $email, $password){
		$this->conn = $db;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->email = $email;
		$this->password = $password;
	}

	public function checkData(){
		echo $this->nome . " " . $this->cognome . " " . $this->email . " " . $this->password;
	}

	private function create(){  
		$query = "INSERT INTO
				 " . $this->table . "
				 (nome, cognome, email, password) VALUES (:nome, :cognome, :email, :password)";
	   
		$stmt = $this->conn->prepare($query);
 
		// binding
		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":cognome", $this->cognome);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":password", $this->password);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}


	public function signup(){
		if(!$this->checkIfExist()){
			if(isset($this->nome) && isset($this->cognome) && isset($this->email) && isset($this->password)){
				$this -> password = password_hash($this->password, PASSWORD_BCRYPT);
				$this -> email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
				$this -> nome = filter_var($this->nome, FILTER_DEFAULT);
				$this -> cognome = filter_var($this->cognome, FILTER_DEFAULT);
				if($this -> create()){
					return "Account creato!";
				}else{
					return "Account non creato.";
				}
			}else{
				return "Campi non compilati";
			}
		}else{
			return "Email gia' presente";
		}
	}

	
	public function login(){
		$user_cred = $this->checkIfExist();
		if($user_cred != "" && isset($this->password)){
			if(password_verify($this->password, $user_cred['password'])){
				ini_set("session.cookie_secure", 1);
				session_start();
				$_SESSION['email'] = $this -> email;
				$_SESSION['nome'] = $user_cred['nome'];
				$_SESSION['cognome'] = $user_cred['cognome'];
				$_SESSION['id'] = $this->id = $user_cred['id'];
				
				return "user loggato";
			}else{
				throw new Exception("Credenziali errate");			
			}
		}	
	}

	private function checkIfExist(){  
		try{
			$query = "SELECT * FROM
					" . $this->table . "
					WHERE email = :email";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(":email", $this->email);
			if($stmt->execute()){
				if($stmt -> rowCount() == 1){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					extract($row);
					return $row;
				}else{
					return "";
				}
			}
		}catch(Exception $e){
			echo $e;
			print_r($e);
		}
	}
}
?>