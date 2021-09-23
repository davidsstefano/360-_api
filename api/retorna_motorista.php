<?php
require_once '../class/conn.php';
require_once '../functions/funcoes.php';



session_start();


//capturando os filtros pro  retorno do JSON
// $id_usuario = (isset($_GET['id_usuario']))  ? $_GET['id_usuario'] : null;
$motorista = (isset($_GET['motorista'])) ? $_GET['motorista'] : null;



// var_dump($motorista);
// exit();
//criar funcao token


//criando o array do filtro SQL
$tipo_consulta = 'vazio';
$sql_bind = "";
$array_filtro_sql = [];
//validando os filtros

// if(strlen($id_usuario) > 0 && is_numeric($id_usuario)){
//     $sql_bind = "id_usuario = :id_usuario";
//     $array_filtro_sql =  array('id_usuario' => $id_usuario);
//     $tipo_consulta = 'usuario';

if(strlen($motorista) > 0 && is_string($motorista)&& $motorista != 0 ){
   
    $sql_bind = $sql_bind . 'mot.motorista = :motorista';
    $array_filtro_sql['motorista'] = $motorista;
    $tipo_consulta = 'motorista';
}


// print_r($sql_bind);
// exit();

//verificar se querystring (endereço do navegador) tem o id_usuario ou id_empresa. se nao tiver um ou outro, dar erro
if ($tipo_consulta == 'vazio') {
    header('HTTP/1.1 400 Unauthorized', true, 400);
    exit();
}
//instanciando a classe de conexao
$conn = new ConnDb();
//criando a variavel de retorno para o json
$json_retorno = null;
//selecionar os agendamentos

$sql = "

SELECT 
mot.id_motorista,mot.foto_m,mot.motorista,car.modelo,car.foto_c,car.placa
FROM
motorista mot
inner join
carros car
on
car.id_motorista = mot.id_motorista
WHERE
$sql_bind

";

// var_dump($tipo_consulta);
// exit();

$dados_db = $conn->select($sql, $array_filtro_sql);
if (count($dados_db) > 0) {
    $json_retorno = $dados_db;
}

// var_dump($dados_db);
// exit();

//escrevendo o resultado do banco em JSON para a API
$json = array(
    'status' => 'ok',
    'motorista' => $json_retorno

);
// var_dump($json_retorno);
// exit();



//formatando o cabecalho do retorno como JSON
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
echo json_encode($json);
