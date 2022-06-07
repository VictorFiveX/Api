<?php


class Usuario {
 
    private $nome;
    private $id;
    private $email;
    private $senha;
    
    
    //Método construtor da classe
    public function __construct() {        
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }
     
}