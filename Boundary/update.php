<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atualizar meus dados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="registerStyle.css">
        <script src="jquery-3.4.1.min.js"></script>
        <script scr="update.js"></script>
    </head>
    <body>
        <div id="background">
            
            <form name="updateForm" method="POST" action="login.php?acao=editar"> 
                
                <div id="top">
                    
                    <?php
                        //cria um objeto Login
                        $login = new Login();
                        foreach ($login->meuUser($_SESSION["usuario"]) as $user) {
                            echo '<p>nome:<input id="name" type="text" value="'.$user->nome.'"></p>';
                            echo '<p>data de nasc:<input id="nasc" type="text" value="'.$user->nascimento.'" disabled></p>';
                            echo '<p>CPF:<input id="cpf" type="text" value="'.$user->cpf.'" disabled></p>';
                            echo '<p>telefone:<input id="tele" type="text" value="'.$user->telefone.'"></p>';
                            echo '<p>e-mail:<input id="email" type="text" value="'.$user->email.'"></p>';
                            echo '<p>username:<input id="user" type="text" value="'.$user->usuario.'" disabled></p>';
                            echo '<p>senha:<input id="password" type="text" value="'.$user->senha.'"></p>';
                        }

                    ?>
                    
                </div>
                
                <div id="bottom">
                    
                    <div id="button">
                    
                    <input class="submit" id="register" type="submit" value="Save">
                    <input class="submit" id="clear" type="submit" value="clear">
                    
                    </div>
                    
                </div>
                
            </form>
            
        </div>
    </body>
</html>
