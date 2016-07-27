<?php
/*
"trata.php?status=1"
1-Adicionar
2-Editar
3-Remover
4-listar
*/	
require_once("config/conn.php");
$status = $_GET['status'];

switch ($status) {
	case 1:
		add();
		break;
	case 2:
		edit();
		break;
	case 3:
		remove();
		break;
	case 4:
		listar();
		break;
	case 5:
		search();
		break;	
	default:
		echo "index.php";
		break;
}

function add(){
	
	
}
function edit(){
	
	$id=$_GET['id'];
	$nome = htmlspecialchars(trim($_POST['nome']));
	$email = htmlspecialchars(trim($_POST['email']));
	$pessoa = $_POST['pessoa'];
	if($pessoa=="fisica"){
		$cpf = htmlspecialchars(trim($_POST['cpf']));
		$cnpj = "NULL";
	}
	else{
		$cnpj = htmlspecialchars(trim($_POST['cnpj']));
		$cpf = "NULL";
	}
	$endereco = htmlspecialchars(trim($_POST['endereco']));
	$fonecel = htmlspecialchars(trim($_POST['fonecel']));
	$foneres = htmlspecialchars(trim($_POST['foneres']));
	$fonecom = htmlspecialchars(trim($_POST['fonecom']));
	$obs = htmlspecialchars(trim($_POST['obs']));
	$data = date("m.d.y");
	$cliestatus = "s";
	$res = mysql_query("UPDATE cliente SET 	nome='$nome',
											email='$email',
											cpf='$cpf',
											cnpj = 'cnpj',
											endereco='$endereco',
											fonecel='$fonecel',
											foneres='$foneres',
											fonecom='$fonecom',
											obs='$obs',
											datacadas = '$data',
											clientestatus = '$clientestatus'
											WHERE id_cliente = '$id'")or die(mysql_error());
	if($res){
		echo header("location:../home.php?go=gestao&sts=3");
	}
	else echo header("location:../home.php?go=gestao&sts=2");
}
function remove(){
	$id=$_GET['id'];
	$res = mysql_query("Delete from maquinas WHERE maq_cod = '$id' ")or die(mysql_error());
	if($res){
		$res = mysql_query("Delete from componentes WHERE comp_maquina_cod = '$id' ")or die(mysql_error());
		echo header("location:deletar.php?sts=1");
	}
	else echo header("location:../home.php?go=gestao&sts=2");
}

?>