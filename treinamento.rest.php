<?php

include_once("conexao.php");

$db = new Conexao();
$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
	case 'GET':
		if(!empty($_GET["id"])){
			$id = intval($_GET["id"]);
			//Busca atributos do id
			//Retorna JSON com informações
		}else{
			//Busca todos registros
			//Retorna JSON com informações
		}
		break;
	case 'POST':
		if(isset($_POST["id"])){
			$id = intval($_POST["id"]);
			//Atualiza registro id
			//Retorna mensagem ATUALIZADO
		}else{
			echo "Chegou a solicitação POST";
			//Realiza novo cadastro
			//Retorna mensagem com novo id
		}
		break;
	case 'DELETE':
		if(!empty($_DELETE["id"])){
			$id = intval($_DELETE["id"]);
			//Deleta registro da base
			//Retorna mensagem DELETADO
		}
}

?>