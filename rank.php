<?php
require_once "Config.php";
require_once "Entity/Rank.php"


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$rank =  new Rank();

//caso for requisição post
if(isset($_POST['nivel']) && isset($_POST['linhas']) && isset($_POST['tempo'])){
    $result = $rank->insereRank($_SESSION['usuario'],$_POST['nivel'],$_POST['linhas'],$_POST['tempo']);
    echo json_encode((object)["sucesso" => true]);
}else{
    $dados = $rank->exibeRank();
    echo json_encode((object)["sucesso" => true,'dados'=>$dados]);
}
