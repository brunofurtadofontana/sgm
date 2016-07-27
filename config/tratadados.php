<?php 
	require("conn.php");
	$processador = htmlspecialchars(trim(strtoupper($_POST['processador'])));
	$memoriaram = htmlspecialchars(trim(strtoupper($_POST['memram'])));
	$storage = htmlspecialchars(trim(strtoupper($_POST['storage'])));
	$placamae = htmlspecialchars(trim(strtoupper($_POST['placamae'])));
	$fonte = htmlspecialchars(trim(strtoupper($_POST['fonte'])));
	$leitor = htmlspecialchars(trim(strtoupper($_POST['leitor'])));
	$finalidade = htmlspecialchars(trim(strtoupper($_POST['finalidade'])));
	$value = strtoupper(implode(',',$_POST['componentes']));
	$so = htmlspecialchars(trim(strtoupper($_POST['so'])));
	$situacao = htmlspecialchars(trim(strtoupper($_POST['situacao'])));
	$obs = htmlspecialchars(trim(strtoupper($_POST['obs'])));


	echo $processador."<br>".$memoriaram."<br>".$storage."<br>".$placamae."<br>".$fonte."<br>".$leitor."<br>".$finalidade."<br>".$so."<br>".$situacao."<br>".$obs;
	
		$qr = mysql_query("INSERT INTO maquinas(maq_processador,
												maq_memoria_ram,
												maq_storage,
												maq_placa_mae,
												maq_leitor,
												maq_finalidade,
												maq_so,
												maq_status,
												maq_fonte,
												maq_obs) 
										VALUES ('$processador',
												'$memoriaram',
												'$storage',
												'$placamae',
												'$leitor',
												'$finalidade',
												'$so',
												'$situacao',
												'$fonte',
												'$obs')")or die(mysql_error());	

		if($qr){
			$consulta = mysql_query("SELECT MAX(maq_cod) FROM maquinas");
			$exibe = mysql_fetch_array($consulta);
			$ultimoId =  $exibe[0];
			$qrcomp = mysql_query("INSERT INTO componentes(comp_maquina_cod,
														  comp_tipos) 
														  VALUES ('$ultimoId','$value')")or die(mysql_error());
		
		}
		if($qrcomp){
			header("Location:../ok.php?id=$ultimoId");
		}
	
?>