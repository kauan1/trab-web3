$(document).ready(function(){

    $("#loginForm").on("submit",function(event){

        //para que o form não atualize ou mude de pagina
        event.preventDefault();

        // envia requisição
        $.ajax({
            url : "login.php",
            type : 'post',
            data : $("#loginForm").serialize(), // passa os dados do form, mas pode passar objeto por objeto também
        }).done(function(msg){ //trata em caso de sucesso
            if(msg.logado){
                window.location.href="index.php";
            }else{
                alert("Login/senha inválidos!!");
                $("#login,#password").val("");
            }
            //$("#resultado").html(msg);
        }).fail(function(jqXHR, textStatus, msg){//caso der erro
            //trata o erro aqui
        });

    });

    // cria uma nova conta
    $("#register").on("click",function(){
        window.location.href = "login.php?acao=criar";
    });
     
});