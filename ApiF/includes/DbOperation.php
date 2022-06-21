<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createUsuario($name, $email, $senha){
		$stmt = $this->con->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $senha);
		if($stmt->execute())
			return true; 			
		return SUCESSO;
	}
	
	function getUsuarios(){
		$stmt = $this->con->prepare("SELECT id, nome, email, senha FROM usuario");
		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $senha);
		$usuarios = array(); 
		
		while($stmt->fetch()){
			$usuario  = array();
			$usuario['id'] = $id; 
			$usuario['name'] = $name; 
			$usuario['email'] = $email; 
			$usuario['senha'] = $senha; 
			
			
			array_push($usuarios, $usuario); 
		}
		
		return $usuarios; 
	}
	
	function Logar($email,$senha){
		$stmt = $this->con->prepare("SELECT id, nome, email, senha FROM usuario WHERE email = ? AND senha = ? ");
		$stmt->bind_param("ss",$email, $senha);
		$stmt->execute();
        $stmt->store_result();
	
		if($stmt->num_rows > 0)	{
      
			$stmt->bind_result($id, $name, $email, $senha);
			$stmt->fetch();
			
			
			$response['error'] = false; 
			$response['message'] = 'Logado com sucesso';
			return true;
			
			
			}else{
			//se o usuário não foi encontrado 
			$response['error'] = false; 
			$response['message'] = 'Nome ou Senha invalidos';
			return false;
			}
					
	}
	
	function getUsuariologado($email,$senha){
		$stmt = $this->con->prepare("SELECT id, nome, email, senha FROM usuario WHERE email = ? AND senha = ?");
		$stmt->bind_param("ss",$email, $senha);
		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $senha);
		
		
		if($stmt->fetch()){
			$usuario  = array();
			$usuario['id'] = $id; 
			$usuario['name'] = $name; 
			$usuario['email'] = $email; 
			$usuario['senha'] = $senha; 
			
			
			array_push($usuario); 
		}
		
		return $usuario; 

	}



	function createProduto($nameP, $marcaP, $preco, $medida, $tipomp, $supermercado){
		$stmt = $this->con->prepare("INSERT INTO produto (nameP, marcaP, preco, medida, tipomp, supermercado) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssddss", $nameP, $marcaP, $preco, $medida, $tipomp, $supermercado);
		if($stmt->execute())
			return true; 			
		return false;
	}
	function getProdutos(){
		$stmt = $this->con->prepare("SELECT idP, nameP, marcaP, preco, medida, tipomp, supermercado FROM produto");
		$stmt->execute();
		$stmt->bind_result($id, $nameP, $marcaP, $preco, $medida, $tipomp, $supermercado);
		$produtos = array(); 
		
		while($stmt->fetch()){
			$produto  = array();
			$produto['id'] = $id; 
			$produto['nameP'] = $nameP; 
			$produto['marcaP'] = $marcaP; 
			$produto['preco'] = $preco;
			$produto['medida'] = $medida; 
			$produto['tipomp'] = $tipomp; 
			$produto['supermercado'] = $supermercado; 
			
			
			array_push($produtos, $produto); 
		}
		
		return $produtos; 
	}

	function createLista($nomeLista){
		$stmt = $this->con->prepare("INSERT INTO lista (nomeLista) VALUES (?)");
		$stmt->bind_param('s',$nomeLista);
		if($stmt->execute())
			return true; 			
		return false;
	}

	function getListas(){
		$stmt = $this->con->prepare("SELECT idLista, nomeLista, idP  FROM lista");
		$stmt->execute();
		$stmt->bind_result($idLista, $nameLista, $idProduto);
		$listas = array(); 
		
		while($stmt->fetch()){
			$lista  = array();
			$lista['idLista'] = $idLista; 
			$lista['nomeLista'] = $nameLista; 
			$lista['idP'] = $idProduto; 

			
			array_push($listas, $lista); 
		}
		
		return $listas; 
	}
	
	
}