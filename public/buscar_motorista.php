<?php
require_once '../class/conn.php';

$conn = new ConnDb();




session_start();
$id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
if (!isset($_SESSION['id_usuario'])) {
    session_destroy(header("location: login.php"));

    exit;
};

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_formulario.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/app_formulario.js"></script>

    <title>Usuario</title>
</head>

<body>
    <div class="container_bm">
        <img id="img_logb" src="../img/logo_site_360.jpg" alt="Logo">

        <div class="meu-box">
            <input type="text" name="nomeMotorista" id="formMotorista" class="input-nome" placeholder="Nome Motorista">
            <label for="nomeMotorista" class="label-nome">Nome do Motorista</label>
            <input type="submit" class="input-botao" value="buscar" onclick="fncCarregafiltrar()" />
        </div>


        <div>
            <table class="table table-hover" id="divMotorista">



            </table>

        </div>
    </div>
</body>

</html>