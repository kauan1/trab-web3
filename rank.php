<?php
require_once "Config.php";
require_once "Entity/Rank.php";


if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$rank =  new Rank();

//caso for requisição post
if(isset($_POST['nivel']) && isset($_POST['linha']) && isset($_POST['tempo'])){
    $result = $rank->insereRank($_SESSION['usuario'],$_POST['pontuacao'],$_POST['nivel'],$_POST['linha'],$_POST['tempo']);
    echo json_encode((object)["sucesso" => true]);
}else{
    $dados = $rank->exibeRank($_SESSION['usuario']);
    echo json_encode((object)["sucesso" => true,'dados'=>$dados]);
}
