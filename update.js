$(document).ready(function(){

    $("#updateForm").on("submit",function(event){

        //para que o form não atualize ou mude de pagina
        event.preventDefault();

        // envia requisição
        $.ajax({
            url : "login.php?acao=editar",
            type : 'post',
            data : $("#updateForm").serialize(), // passa os dados do form, mas pode passar objeto por objeto também
        }).done(function(msg){ //trata em caso de sucesso
            msg = JSON.parse(msg);
            if(msg.sucesso){
                alert("Editado com sucesso!");
                window.location.href="index.php";
            }
            //$("#resultado").html(msg);
        }).fail(function(jqXHR, textStatus, msg){//caso der erro
            msg = JSON.parse(jqXHR.responseText);
            alert("Falha ao editar!"+msg.msg);
        });

    });

     
});