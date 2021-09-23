<?php

require_once '../class/conn.php';
require_once '../functions/upload.php';

$conn = new ConnDb();

// var_dump($conn);
if (isset($_POST['nome']))



    $nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$senha = md5(addslashes($_POST['senha']));

$sql = "SELECT  email  FROM usuario WHERE email = :email ";
$result = $conn->select($sql, array('email' => $email));
if (count($result) == 0) {
    $sql = "INSERT INTO usuario (nome,email,telefone,senha)VALUES(:nome,:email,:telefone,:senha)";
    $novo_id = $conn->insert($sql, array('nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'senha' => $senha,));


    if ($novo_id > 0) {

        echo "sucesso!!";
        header("Location: ../public/login.php");
    }
}else{
    echo "email ja cadastrado!!";
    header("Location: ../public/cadastro_usuario.php");
}
