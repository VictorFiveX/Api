<?php
 
 include_once 'DbConnect.php';
 include_once 'IUsuario.php';

class DbOperation implements IUsuario
{
	protected $cmdSelects = "";
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }

	
    public function createUsuario(\Usuario $usuario) {
		function createusuario($name, $email, $senha){
			$stmt = $this->con->prepare("INSERT INTO usuario (name, email, senha) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("sss", $nome, $email, $senha);
	        if($stmt->execute()){ 
			
			try {
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    return SUCESSO;
                } else {
                    return SEM_REGISTROS;
                }
            } catch (PDOException $e) {
                return ERRO_INSTRUCAO;
            }
        } else {
            return ERRO_DB;
        }
    }
    function getUsuario(){
		$stmt = $this->con->prepare("SELECT id, nome, email, senha,  FROM usuario");
		$stmt->execute();
		$stmt->bind_result($id, $nome, $email, $senha);
		
		$usuarios = array(); 
		
		while($stmt->fetch()){
			$usuario  = array();
			$usuario['id'] = $id; 
			$usuario['nome'] = $nome; 
			$usuario['email'] = $email; 
			$usuario['senha'] = $senha; 
						
			array_push($usuarios, $hero); 
		}
		
		return $heroes; 
	}
	
	
	}
}