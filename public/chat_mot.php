<?php
require_once '../class/conn.php';

$conn = new ConnDb();
date_default_timezone_set('America/Sao_Paulo');


session_start();
$id_motorista = (isset($_SESSION['id_motorista'])) ? $_SESSION['id_motorista'] : null;
if (!isset($_SESSION['id_motorista'])) {
    session_destroy(header("location: login.php"));

    exit;
}



$data = date("d/m/y"); //data atual.
$hora = date("H:i"); //hora atual.

// echo $data;
// echo $hora;

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
    <script src="../js/mot_chat.js"></script>

    <title>Usuario</title>
</head>

<body>



    <div class="container_bm">
        <img id="img_logb" src="../img/logo_site_360.jpg" alt="Logo">

        <div class="form-box">

            <form id="msg" enctype="multipart/form-data">
                
                <div>
                    <input type="hidden" name="id_motorista" id="formMotorista" value="<?php echo $_SESSION['id_motorista']; ?>" />
                </div>

                
                <div id="divConversa">


                    Sem Mensagens...
                </div>
            </form>

        </div>
</body>

</html>