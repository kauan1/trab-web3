<?php
require_once "Config.php";
require_once "Entity/Login.php";

if(isset($_GET['acao']) && $_GET['acao'] == 'criar'){    

    //caso for requisição post
    if(isset($_POST['name']) && isset($_POST['user']) && isset($_POST['cpf']) && isset($_POST['nascimento']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha'])){
        
        //cria um objeto Login
        $login = new Login();

        //verifica se o login é valido
        if(!Login::validaCPF($_POST['cpf'])){
            http_response_code(406);
            echo json_encode((object) array("sucesso" => false , 'msg'=> "Cpf inválido!"));
            exit();
        }

        //verifica se o email é valido
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            http_response_code(406);
            echo json_encode((object) array("sucesso" => false , 'msg'=> "Email inválido!"));
            exit();
        }

        // verifica se já foi usado o cpf ou usuario
        if($login->existe($_POST['user'],$_POST['cpf'])){
            http_response_code(406);
            echo json_encode((object) array("sucesso" => false , 'msg'=> "CPF ou Login já cadastrados!"));
            exit();
        }

        //grava no bd
        $result = $login->criarLogin($_POST['user'],$_POST['cpf'],$_POST['nascimento'],$_POST['telefone'],$_POST['email'],$_POST['senha'],$_POST['name']);

        echo json_encode((object)["sucesso" => true]);

    }else{
        include("Boundary/register.html");
    }
        
}elseif(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }

    if(isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha'])){
            
        //cria um objeto Login
        $login = new Login();

        //grava no bd
        $result = $login->editarLogin($_SESSION['usuario'],$_POST['telefone'],$_POST['email'],$_POST['senha']);

        //retorna resultado
        echo json_encode((object)["sucesso" => true]);

    }else{
        include("Boundary/update.php");
    }
}elseif(isset($_GET['acao']) && $_GET['acao'] == 'logout'){
    session_destroy();
    //retorna resultado
    echo json_encode((object)["sucesso" => true]);
}else{
    if(isset($_POST['user']) && isset($_POST['senha'])){
            
        //cria um objeto Login
        $login = new Login();

        //grava no bd
        $result = $login->verificarLogin($_POST['user'],$_POST['senha']);

        if($result)
            $_SESSION['usuario'] = $_POST['user']; // seta a session

        echo json_encode((object)["sucesso" => true,'logado' => $result]);
        

    }else{
        include("Boundary/login.html");
    }
    
}
