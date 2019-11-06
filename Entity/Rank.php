<?php

class Rank extends Database{

    public function exibeRank($usuario){
        $sql = "Select * FROM rank ORDER BY pontuacao DESC LIMIT 10";
        $dados = Database::fetch($sql);

        for($i=0;$i<count($dados);$i++){
            $dados[i]->posicao = $i+1;
        }

        $sql = "Select r.* , p.posicao
            FROM
                rank r inner join 
                (SELECT @curRank := @curRank + 1 AS posicao , usuario FROM rank ORDER BY pontuacao DESC) on r.usuario = p.usuario 
            WHERE 
                usuario = ".$_SESSION['usuario']." 
            ORDER BY 
                pontuacao DESC
            LIMIT
                1
        ";
        $posicao = Database::fetch($sql);


        return (object) array("rank" => $dados,"posicao"=>$posicao);

    }

    public function insereRank($user,$nivel,$linhas,$tempo){
        return Database::query("INSERT INTO rank (usuario,nivel,linhas,tempo,data) VALUES ('$user',$nivel,$linhas,$tempo,'"+date("Y-m-d H:i:s")+"')");
    }

}