# Tetris em PHP
Esse jogo foi desenvolvido por:

Giovanni 216968 - ajudou na elaboração do layout das paginas e na construção do banco de dos 
João Vitor 218927 - elaborou as telas de login, registro e atulizar 
Kauan 219594 - fez integralização com o banco de dados
Raphael 223865 - fez a elaboração dos scripts de banco de dados e as entitys

e utilizamos o codigo de verificação de cpf do site: https://www.geradorcpf.com/script-validar-cpf-php.htm

O script de criação do banco de dados se encontra na raiz e se chama init.php, as configurações de banco de dados
estará em Database.php (para o funcionamento) e em Entity/Init.php (para a criação do novo banco de dados)

## Requisições
Para usar as requisições, use o padrão ajax em jQuery, exemplo

        $(document).ready(function(){

            $("#idDoForm").on("submit",function(event){

                //para que o form não atualize ou mude de pagina
                event.preventDefault();

                // envia requisição
                $.ajax({
                    url : "cadastrar.php",
                    type : 'post',
                    data : $("idDoForm").serialize(), // passa os dados do form, mas pode passar objeto por objeto também
                }).done(function(msg){ //trata em caso de sucesso
                    $("#resultado").html(msg);
                }).fail(function(jqXHR, textStatus, msg){//caso der erro
                    //trata o erro aqui
                });

            });
             
        });

## Login
* url tela login: login.php
* url post login: login.php 
    * passar [user,senha]

* url tela editar: login.php?acao=editar
* url tela editar: login.php?acao=editar
    * passar [telefone,email,senha]
    * estar logado

* url tela editar: login.php?acao=criar
* url tela editar: login.php?acao=criar
    * passar [user,cpf,telefone,nascimento,email,senha]

## Rank
* tela: rank.php
    * para adicionar: [nivel,linhas,tempo]