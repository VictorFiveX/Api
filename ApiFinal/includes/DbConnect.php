<?php 
include_once 'Constants.php';
	class DbConnect
	{
		
		private $con;
		
		
		function __construct()
		{
	 
		}
	 
	
		function connect()
		{
		
			include_once dirname(__FILE__) . '/Constants.php';
	 
			
			$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	 
		
			if (mysqli_connect_errno()) {
				echo "Falha de conexão com o MySQL: " . mysqli_connect_error();
			}
	 
			 
			return $this->con;
		}
		function gerarInstancia() {
			//Se o objeto já tiver sido instânciado anteriormente e a variavel static conter sua referencia, retorna sua referencia
			if (isset( $this->con)) {
				return $this->con; //retornando instancia já criada
			}
			//Instancia um novo objeto pdo e o retorna
			else {            
				return $this->connect(); //retornando umva nova instancia ou false (erro)
			}
	 
	}
}