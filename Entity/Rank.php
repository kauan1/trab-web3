<?php

class Rank extends Database{

    public function exibeRank($usuario){
        $sql = "Select * FROM rank ORDER BY pontuacao DESC LIMIT 10";
        $dados = Database::fetch($sql);

        for($i=0;$i<count($dados);$i++){
            $dados[$i]->posicao = $i+1;
        }

        Database::query("SET @row_number = 0;");
        $sql = "        
        Select r.* , p.posicao
            FROM
                rank r inner join 
                (SELECT @row_number := @row_number + 1 as posicao , usuario,id FROM rank ORDER BY pontuacao DESC) p on r.id = p.id 
            WHERE 
                r.usuario = '".$_SESSION['usuario']."'
            ORDER BY 
                pontuacao DESC
            LIMIT
                1
        ";

        $posicao = Database::fetch($sql);


        return (object) array("rank" => $dados,"posicao"=>$posicao);

    }

    public function insereRank($user,$pontuacao,$nivel,$linhas,$tempo){
        return Database::query("INSERT INTO rank (usuario,pontuacao,nivel,linhas,tempo,data) VALUES ('$user',$pontuacao,$nivel,$linhas,$tempo,'".date("Y-m-d H:i:s")."')");
    }

}