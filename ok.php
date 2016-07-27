<?php
session_cache_limiter();
session_cache_expire(1);
session_start();  
include "verifica.php";
?> 
<html>
<head>
	<title>Cadastrado com sucesso!</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SGM">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h2>Cadastrado com sucesso</h2>
	<section class="content">
	<fieldset>
	<legend>Dados cadastrados</legend>
	<?php
		require("config/conn.php");
		$id = $_GET['id'];
		$query = mysql_query("SELECT *FROM maquinas JOIN componentes WHERE $id = componentes.comp_maquina_cod ")or die(mysql_error());
		$show = mysql_fetch_array($query);
		echo "Codigo Máquina: ".$show['maq_cod']."<br>";
		echo "Processador: ".$show['maq_processador']."<br>";
		echo "Memoria RAM: ".$show['maq_memoria_ram']."<br>";
		echo "Disco Rigido: ".$show['maq_storage']."<br>";
		echo "Placa Mãe: ".$show['maq_placa_mae']."<br>";
		echo "Leitor CD/DVD: ".$show['maq_leitor']."<br>";
		echo "Finalidade: ".$show['maq_finalidade']."<br>";
		echo "Sistema Operacional: ".$show['maq_so']."<br>";
		echo "Status da Máquina: ".$show['maq_status']."<br>";
		echo "Fonte Alimentação: ".$show['maq_fonte']."<br>";
		echo "Obsercações: ".$show['maq_obs']."<br>";
		$qnt = substr_count($show['comp_tipos'], ',');
		$tipe = explode(',',$show['comp_tipos']);
		
		echo "Componentes <br>" ;
		for ($i=0; $i<$qnt;$i++) { 
			echo "Tipo $i= ".$tipe[$i]."<br>";
		}

	?>
	</fieldset>
	</section>
	<?php
	$urlToEncode="http://svm.hol.es/ok.php?id=$id"; //nesta linha inserimos a informação a ser gerada na imagem.
	generateQRwithGoogle($urlToEncode); // agora usaremos a biblioteca do Google para receber nossa informação.

	//agora sim, criamos uma função utilizando a biblioteca do Google para gerar nossa imagem
	function generateQRwithGoogle($url,$widthHeight ='150',$EC_level='L',$margin='0') {
	$url = urlencode($url); 
	echo '<center><img src="http://chart.apis.google.com/chart?chs='.$widthHeight.'x'.$widthHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$url.'" alt="QR code" widthHeight="'.$widthHeight.'" widthHeight="'.$widthHeight.'"/></center>';
	}
	?>
</html>


