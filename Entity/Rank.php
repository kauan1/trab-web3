<?php

class Rank extends Database{

    public function exibeRank(){
        $sql = "Select * FROM rank ORDER BY pontuacao DESC";
        $dados = Database::fetch($sql);

        $rank = [];
        $apareceu = false;
        for($i=0;$i<count($dados);$i++){
            
            if($i<10){

                $dados[$i]->posicao = $i+1;
                $rank[] = $dados[$i];

                if($_SESSION['usuario'] == $dados[$i]->usuario){
                    $apareceu = true;
                }

            }elseif($i>=10 && $apareceu){
                break;
            }elseif(!$apareceu && $i>=10 && $_SESSION['usuario'] == $dados[$i]->usuario){
                $dados[$i]->posicao = $i+1;
                $rank[] = $dados[$i];
                break;
            }
        }

        return $rank;

    }

    public function insereRank($user,$nivel,$linhas,$tempo){
        return Database::query("INSERT INTO rank (usuario,nivel,linhas,tempo,data) VALUES ('$user',$nivel,$linhas,$tempo,'"+date("Y-m-d H:i:s")+"')");
    }

}