<?php 

require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createusuario':
				
				isTheseParametersAvailable(array('nome','email','senha'));
				
				$db = new DbOperation();
				
				$result = $db->createUsuario(

					$_POST['nome'],
					$_POST['email'],
					$_POST['senha']
				);
				

			
				if($result){
					
					$response['error'] = SUCESSO; 

					
					$response['message'] = 'Usuario adicionado com sucesso';

					
					$response['usuarios'] = $db->getUsuarios();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			

			case 'getusuarios':
				$db = new DbOperation();
				$response['error'] = SUCESSO; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['usuarios'] = $db->getUsuarios();
			break; 

			case 'logar':
				isTheseParametersAvailable(array('email','senha'));
				$db = new DbOperation();
				$result = $db->Logar(				
					$_POST['email'],
					$_POST['senha']
				);
				if($result){
					
					$response['error'] = SUCESSO; 

					
					$response['message'] = 'Usuario logado com sucesso';

					
					$response['usuarios'] = $db->getUsuariologado($_POST['email'],
					$_POST['senha']);
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Email ou Senha invalidos';
				}



				
				break;

				case 'createproduto':
				
					isTheseParametersAvailable(array('nameP', 'marcaP', 'preco', 'medida', 'tipomp', 'supermercado'));
					
					$db = new DbOperation();
					
					$result = $db->createProduto(
	
						$_POST['nameP'],
						$_POST['marcaP'],
						$_POST['preco'],
						$_POST['medida'],
						$_POST['tipomp'],
						$_POST['supermercado']
					
					);
					
	
				
					if($result){
						
						$response['error'] = false; 
	
						
						$response['message'] = 'produto adicionado com sucesso';
	
						
						$response['produtos'] = $db->getProdutos();
					}else{
	
						
						$response['error'] = true; 
	
					
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
					
				break;
				case 'getprodutos':
					$db = new DbOperation();
					$response['error'] = false; 
					$response['message'] = 'Pedido concluído com sucesso';
					$response['produtos'] = $db->getProdutos();
				break; 

				case 'createlista':
				
					isTheseParametersAvailable(array('nameLista'));
					
					$db = new DbOperation();
					
					$result = $db->createLista(
	
						$_POST['nameLista']					
					);
					
	
				
					if($result){
						
						$response['error'] = false; 
	
						
						$response['message'] = 'produto adicionado com sucesso';
	
						
						$response['listas'] = $db->getListas();
					}else{
	
						
						$response['error'] = true; 
	
					
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
					
				break;

				case 'getlistas':
					$db = new DbOperation();
					$response['error'] = false; 
					$response['message'] = 'Pedido concluído com sucesso';
					$response['produtos'] = $db->getListas();
				break; 
			}
			
			
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}
	

	echo json_encode($response);