$(document).ready(function(){

    $("#registerForm").on("submit",function(event){

        //para que o form não atualize ou mude de pagina
        event.preventDefault();

        // envia requisição
        $.ajax({
            url : "login.php?acao=criar",
            type : 'post',
            data : $("#registerForm").serialize(), // passa os dados do form, mas pode passar objeto por objeto também
        }).done(function(msg){ //trata em caso de sucesso
            msg = JSON.parse(msg);
            if(msg.sucesso){
                alert("Criado com sucesso!");
                window.location.href="login.php";
            }
            //$("#resultado").html(msg);
        }).fail(function(jqXHR, textStatus, msg){//caso der erro
            msg = JSON.parse(jqXHR.responseText);
            alert("Falha ao criar!"+msg.msg);
        });

    });
     
});