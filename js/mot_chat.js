$(document).ready(function() {
    fncCarregaConversa();

    $('#conversa').submit(function(e) {
        e.preventDefault();
        fncConversa();

        return (false);
    });

});


function fncConversa() {
    window.location = 'chat_mot.php';
}

function fncCarregaConversa() {


    var id_motorista = $('#formMotorista').val();


    $('#divConversa').html('<div">\
        <span class="sr-only">Loading...</span>\
    </div>');


    //console.log(id_motorista);
    $.getJSON("../api/carrega_chat_m.php", {

            'id_motorista': id_motorista,

        },


        function(data, textStatus, jqXHR) {
            if (data.conversa && data.conversa.length > 0 && textStatus != "error") {

                var lista = "";
                $('#divConversa').text('carreguei legal');

                data.conversa.forEach(element => {
                    lista = lista + '<table> <tr>' + element.nome + '| <button id="btn" onclick="fncchat(' + element.id_motorista + ')"> Chat </button></table > ';


                });


                $('#divConversa').html(lista);
            } else {
                $('#divConversa').text('nao há conversa!');
            }



        }

    );
}