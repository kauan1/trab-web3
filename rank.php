<?php
require_once "Config.php";
require_once "Entity/Rank.php"

$rank =  new Rank();

//caso for requisição post
if(isset($_POST['user']) && isset($_POST['nivel']) && isset($_POST['linhas']) && isset($_POST['tempo'])){
    $result = $rank->insereRank($_POST['user'],$_POST['nivel'],$_POST['linhas'],$_POST['tempo']);
    echo json_encode((object)["sucesso" => true]);
}else{
    $dados = $rank->exibeRank();
    echo json_encode((object)["sucesso" => true,'dados'=>$dados]);
}
