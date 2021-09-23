<?php
require_once '../class/conn.php';

$conn = new ConnDb();
date_default_timezone_set('America/Sao_Paulo');



session_start();
$id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
if (!isset($_SESSION['id_usuario'])) {
    session_destroy(header("location: login.php"));

    exit;
}

$sql = "SELECT * FROM motorista ";
$id_motorista = $conn->select($sql, []);




// echo ($id_usuario);
// exit;
// echo $data;
// echo $hora;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/chat.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/chat.js"></script>

    <title>Usuario</title>
</head>

<body>
<div class="result"></div>
		
		<section class="container">
			<article class="container_top_header">
				
				<div class="container_top">
				
					<div class="container_top_left">
						<img src="images/mestres-do-php.png" alt="Foto do Usuário Mestres do PHP" title="Foto do Usuário Mestres do PHP" class="border_gray">
					</div>
					
					<div class="container_top_center">
						<p class="container_top_center_firstLine">Mestres do PHP</p>
						<p class="container_top_center_secondLine"><span class="gray fa fa-circle"></span> OFFLINE</p>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="container_top_right">
					<p>
						<a title="Procurar amigos" class="bg_green btn_search"><span class="fa fa-plus-circle"></span></a>
						<a title="Sair do Chat" class="bg_red btn_logout"><span class="fa fa-times-circle"></span> </a>
					</p>
					
				</div>
				<div class="clear"></div>
			</article>
			
			<div class="separator"></div>
			
			<article class="container_content">
				
				<div class="loaderHeader">

					<div class="container_content_margin">
						<div class="container_main_left">
							<img src="images/mestres-do-php.png" alt="Foto do Usuário Mestres do PHP" title="Foto do Usuário Mestres do PHP" class="border_gray">
						</div>
						
						<div class="mobile">
							<div class="container_main_center">
								<p class="container_main_center_firstLine">Mestres do PHP</p>
								<p class="container_main_center_secondLine"><span class="gray fa fa-circle"></span> OFFLINE </p>
							</div>
							
							<div class="container_main_right">
								<p>
									<a title="Chamar este usuário para o Chat" class="bg_gray btn_call" ><span class="fa fa-comments"></span> Chamar</a>
								</p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<div class="space_margin"></div>
			</article>
		</section>
		
		<section class="content">
			<article class="content_top">
				
				<div class="contentLoader">

					<div class="content_top_left">
						<img src="images/mestres-do-php.png" alt="Foto do Usuário Mestres do PHP" title="Foto do Usuário Mestres do PHP" class="border_gray">
					</div>
					
					<div class="content_top_center ">
						<p class="content_top_center_firstLine">Mestres do PHP</p>
						<p class="content_top_center_secondLine"><span class="green fa fa-circle"></span> ONLINE </p>
					</div>

				</div>
					
				<div class="content_top_right">
					<div class="topLoader">
					
						<p>
							<a title="Banir usuário" class="bg_gray btn_disabled"><span class="fa fa-times-circle"></span> </a>
						</p>

						<p>
							<a title="Aceitar pedido de amizade" class="bg_green btn_request_approved" ><span class="fa fa-thumbs-up"></span></a>
							<a title="Rejeitar pedido de amizade" class="bg_red btn_request_remove"><span class="fa fa-thumbs-down"></span> </a>
						</p>
						
					</div>
				</div>
				
				
				<div class="clear"></div>
			</article>
			
			<div class="separator"></div>
			
			<article class="content_header">
				
				<div class="loaderChat">
					
					<div class="content_header_margin">
						<div class="content_header_margin_img">
							<img src="images/mestres-do-php.png" alt="Foto do Usuário Mestres do PHP" title="Foto do Usuário Mestres do PHP" class="border_gray">
						</div>
						
						<div class="content_header_margin_text">
							<p class="content_main_center_chat">
							<span class="datetime">Mensagem ficará aqui</p>
						</div>
						
						<div class="clear"></div>
					</div>
					
				</div>
				<div class="text"></div>
				<div class="space_margin"></div>
			</article>
			
			<article class="content_form">
				<form method="post" id="form_chat">
					<div class="content_left">
						<input type="text" name="chat_text" disabled placeholder="Digite sua mensagem...">
					</div>
					
					<div class="content_right">
						<button class="bg_gray btn_disabled"><i class="fa fa-paper-plane"></i></button>
					</div>
					<div class="clear"></div>
				</form>
			</article>
		</section>
	
</body>

</html>