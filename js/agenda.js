$(document).ready(function() {
    fncCarregafiltro();

    $('#novo').submit(function(e) {
        e.preventDefault();
        fncnovo();

        return (false);
    });
    $('#chat').submit(function(e) {
        e.preventDefault();
        fncchat();

        return (false);
    });
    $('#alterar').submit(function(e) {
        e.preventDefault();
        fncalterar();

        return (false);
    });

});

function fncCarregafiltro() {

    var id_motorista = $('#formIdMotorista').val();

    $('#divAgendamentos').html('<div class="spinner-border text-primary"  role="status">\
        <span class="sr-only">Loading...</span>\
    </div>');

    $.getJSON("../api/retorno_agendamento.php", {
            'id_motorista': id_motorista,


        },


        function(data, textStatus, jqXHR) {

            if (data.agendamentos && data.agendamentos.length > 0 && textStatus != "error") {

                var tabela = document.createElement("table");
                var cabecalho = document.createElement("thead");
                var corpo = document.createElement("tbody");



                var lista = "";
                $('#divAgendamentos').text('carreguei legal');

                data.agendamentos.forEach(element => {

                    if (element.status_conf == 'Cancelado.') {
                        botao = "";

                    } else {
                        botao = '<td><strong><button type="button" class="btn btn-info float-right" id="btncancelar' + element.id + '" onclick="fncalterar(' + element.id + ')">Alterar </button><a class="btn  btn-outline-secondary float-right" id="btnalterar" onclick="fnccancelar(' + element.id + ')">Cancelar</a></strong></td>'
                    }

                    lista = lista + '<tr><td><img id="foto_m" src="../img/' + element.foto_m + '"/></td><td>' + element.nome + '</td><td>' + element.modelo + '</td><td>|' + element.placa + '|</td><td>|' + element.horario + ':00|</td><td>| ' + element.dia + '</td><strong><td>' + element.status_c + '</td>' + botao + '</tr>';

                    // console.log(element.id);

                });

                tabela.append(cabecalho);
                tabela.append(corpo);
                $('#divAgendamentos').append(tabela).html(lista);


            } else {

                $('#divAgendamentos').text('Não Encontrado!');
            }


        }

    );
}




function fncnovo() {
    window.location = 'test.php';
}

function fncchat() {
    window.location = 'chat.php';
}


function fncalterar() {

    window.location = 'alterar.php';
}

function fncbusca() {
    window.location = 'buscar_motorista.php';
}

function fnccancelar() {

    var result = confirm("tem certeza que deseja cancelar?");
    $('#btncancelar').prop('disabled', true);
    if (result == true) {
        conf = "ok.";
        $.post("../api/cancelar.php",

            {
                'id': id,
            },

            function(data) {



                if (data.erro == 0) {

                    alert(data.msg);
                } else if (data.erro == 1) {
                    alert(data.msg);
                }


                window.location = 'pag_inicial.php';


            });
        "json"

    } else {
        conf = "cancelar.";
    }

    console.log(conf);

}