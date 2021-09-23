<?php

require_once '../class/conn.php';
require_once '../functions/carregar_foto.php';



$conn = new ConnDb();



if (isset($_POST['motorista']))



    $motorista = addslashes($_POST['motorista']);
$carteira = addslashes($_POST['carteira']);
$categoria = addslashes($_POST['categoria']);
$data_validade = addslashes($_POST['data_validade']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$senha = md5(addslashes($_POST['senha']));
$foto_m = $nomeArquivo;


$sql = "SELECT email FROM motorista WHERE email = :email ";
$result = $conn->select($sql, array('email' => $email));
if (count($result) == 0) {


    $sql = "INSERT INTO motorista (motorista,carteira,categoria,data_validade,email,telefone,senha,foto_m)VALUES(:motorista,:carteira,:categoria,:data_validade,:email,:telefone,:senha,:foto_m)";

    $novo_id = $conn->insert($sql, array('motorista' => $motorista, 'carteira' => $carteira, 'categoria' => $categoria, 'data_validade' => $data_validade, 'email' => $email, 'telefone' => $telefone, 'senha' => $senha, 'foto_m' => $foto_m));


    if ($novo_id > 0) {

        echo "sucesso!!";
        header("Location: ../public/cadastro_carro.php");
        exit;
    }
} else {
    
    header("Location: ../public/cadastro_motorista.php");
    echo "email já cadatrado!!";
    exit;
}
