<?php

if ($_FILES && $_FILES['foto_m']) {
    $pastaUpload = '../img/';
    $nomeArquivo = $_FILES['foto_m']['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['foto_m']['tmp_name'];


    // echo($nomeArquivo);

    if (move_uploaded_file($tmp, $arquivo)) {

        echo "Arquivo enviado com sucesso.";
    } else {
        echo "erro no upload.";
    }
}
