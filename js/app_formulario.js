$(document).ready(function() {


});


function fncCarregafiltrar() {


    var motorista = $('#formMotorista').val();


    $('#divMotorista').html('<div class="spinner-border text-primary"  role="status">\
    <span class="sr-only">Loading...</span>\
</div>');

    $.getJSON("../api/retorna_motorista.php", {


            'motorista': motorista,


        },


        function(data, textStatus, jqXHR) {

            if (data.motorista && data.motorista.length > 0 && textStatus != "error") {

                var tabela = document.createElement("table");
                var cabecalho = document.createElement("thead");
                var corpo = document.createElement("tbody");



                var lista = "";
                $('#divMotorista').text('carreguei legal');

                data.motorista.forEach(element => {


                    lista = lista + '<tr><td><img id="foto_m" src="../img/' + element.foto_m + '"/></td><td>' + element.motorista + '|</td><td>|' + element.modelo + '|</td><td>' + element.placa + '| <button id="btn" onclick="fncchat(' + element.id_motorista + ')"> Chat </button> | <button id="btn" onclick=""> favoritar </button> | </td></tr>';

                    // console.log(element.id);

                });

                tabela.append(cabecalho);
                tabela.append(corpo);
                $('#divMotorista').append(tabela).html(lista);


            } else {

                $('#divMotorista').text('Não Encontrado!');
            }


        }

    );
}

function fncCarregaHorarios() {
    //capturar os valores selecionados para passar pra api
    let partida = $('#partida').val();
    let destino = $('#destino').val();
    let dia = $('#dia').val();
    let motorista = $('#motorista').val();


    if (partida > 0 && destino > 0 && dia.length > 0 && motorista > 0) {
        $('#hora').prop('disabled', false).focus(); //habilitando a data para a selecao
        $('#hora').empty().append(new Option('carregando...', 0)); //limpou o campo e escreveu o aguarde
        //console.log(hora);
        $.post(
            '../api/retorna-horarios.php', {
                'partida': partida,
                'destino': destino,
                'dia': dia,
                'motorista': motorista,

            },


            function(retornoJson) {

                alert(returnoJson);
                $('#hora').empty().append(new Option('Selecione o horário:', ''));
                retornoJson.horarios.forEach(element => {



                    $('#hora').append(new Option(element, element));




                });

            },


            'json'
        );
    }
}

function fncchat(id_motorista) {




    window.location = 'chattext.php?id=' + id_motorista;



}


var check = function() {
    if (document.getElementById('senha').value ==
        document.getElementById('confirm_senha').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'OK';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'SENHAS DIFERENTES';
    }
}