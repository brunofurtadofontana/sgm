<?php
session_cache_limiter();
session_cache_expire(1);
session_start();  
include "verifica.php";
?> 
<html>
<head>
	<title>SGM - Sistema Gestão Materiais</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SGM">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="content">
		<header>
			<h2 style="color:#fff"><img src="img/logo.png" width='100'/> - SISTEMA GESTÃO MATERIAIS <a href="logoff.php" >SAIR</a></h2><br>
		
		</header>
		<section class="cadastro">
			<h2>Cadastrar componentes</h2>
			<form action=" config/tratadados.php" method="post">
				<input type="text" name="processador" placeholder="Modelo do Processador" required/><br>
				<input type="text" name="memram" placeholder="Memoria RAM" required/><br>
				<input type="text" name="storage" placeholder="Disco Rigido" required/><br>
				<input type="text" name="placamae" placeholder="Placa Mãe" required/><br>
				<input type="text" name="fonte" placeholder="Fonte de alimentação" required/><br>
				<h2>Possui Leitor CD/DVD</h2>
				<input type="radio" value="sim" name="leitor" checked>SIM</br>
				<input type="radio" value="nao" name="leitor">NÃO</br>
				<h2>Finalidade</h2>
				<select name="finalidade" required="required">
					<option value='0'>Selecione uma opção</option>
					<option value="Formatar">Formatar</option>
					<option value="Montagem Manutenção">Montagem Manutenção</option>
				</select><br>
				<h2>Componentes</h2>	
				<input type="checkbox" name="componentes[]" value="placa de vídeo">Placa de vídeo<br>
				<input type="checkbox" name="componentes[]" value="placa de rede">Placa de rede<br>
				<input type="checkbox" name="componentes[]" value="placa de som">Placa de som<br>
				<input type="text" name="componentes[]" placeholder="Outros"><br>
				<h2>Sistema Operacional</h2>	
				<select name="so" required='required'>
					<option value="0">Selecione uma opção</option>
					<option value="windows">Windows</option>
					<option value="MacOs">Mac Os</option>
					<option value="linux">Linux</option>
					<option value="mobile">Mobile</option>
				</select><br>
				<h2>Situação da máquina</h2>	
				<select name="situacao" required>
					<option value="0">Selecione uma opção</option>
					<option value="defeito">Defeito</option>
					<option value="em uso">Em Uso</option>
					<option value="disponivel">Disponivel</option>
				</select><br>
				<h2>Observações</h2>
				<textarea name="obs" placeholder="Alguma observação??"></textarea><br>
				<input type="submit" name="Enviar" value="Enviar"/><br>
			</form>
		</section>
		
</section>	
</body>
</html>
<?php 
	require("config/conn.php");

?>