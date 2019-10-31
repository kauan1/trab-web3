# Tetris em PHP

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