<?php

class Database{

    //constantes de conexão para o banco de dados
    private  $DB = "tetris";
    private  $ENDERECO =  "localhost";
    private  $USER = "root";
    private  $PASS = "";


    // conexao do bd
    private $conexao;

    function __construct(){
        $this->conexao();
    }

    // abre conexão com banco de dados
    private function conexao(){
        try{
            $this->conexao = new PDO("mysql:host=".$this->ENDERECO.";dbname=".$this->DB, 
            $this->USER, 
            $this->PASS);
        }catch(Exception $e){
            echo "Houve um erro ao conectar ao banco de dados: ".$e->getMessage();
            exit(1);
        }
    }

    // faz a conexão com o banco de dados
    public function query($sql){
        try{
            $query = $this->conexao->exec($sql);
        }catch(Exception $e){
            echo "Houve um erro ao realizar a query: ".$e->getMessage();
            exit(1);
        }

        return $query;

    }

    // retorna todos os dados
    public function fetch($sql){
        $dados = null;
        try{
            $query = $this->conexao->prepare($sql);
            if($query->execute())            
            $dados = $query->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            echo "Houve um erro ao realizar a query: ".$e->getMessage();
            exit(1);
        }

        return $dados;
    }
    

}