<?php

class Login extends Database{

    // verifica se existe ou não o login e senha
    public function verificarLogin($user,$pass){
        $dados = Database::fetch("Select usuario from usuario WHERE usuario = '$user' AND senha = '$pass'");        
        return (bool) count($dados);
    }


    // verifica a existencia de um usuario com tal cpf ou login
    public function existe($user,$cpf){
        $dados = Database::fetch("Select usuario,cpf from usuario WHERE usuario = '$user' or cpf = '$cpf' ");
        return (bool) count($dados);
    }

    // cria um novo login
    public function criarLogin($user,$cpf,$nascimento,$telefone,$email,$senha,$name){
        return Database::query("insert into usuario (usuario,cpf,nome,nascimento,telefone,email,senha) VALUES ('$user','$cpf','$name','$nascimento','$telefone','$email','$senha')");
    }

    // edita o login do usuario
    public function editarLogin($user,$nome,$telefone,$email,$senha){
        return Database::query("UPDATE usuario SET nome = '$nome',telefone = '$telefone',email = '$email',senha = '$senha' WHERE usuario = '$user'");
    }

    public function meuUser($user){
        $dados = Database::fetch("Select * from usuario WHERE usuario = '$user'");
        return $dados;
    }

    /** 
     * 
     * Algoritmo retirado de: https://www.geradorcpf.com/script-validar-cpf-php.htm
     * Verifica se o cpf é verdadeiro
     */
    public static function validaCPF($cpf = null){

        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         // Calcula os digitos verificadores para verificar se o
         // CPF é válido
         } else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
    
            return true;
        }
    }

}