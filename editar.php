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
			<center><h2 style="color:#fff"><img src="img/logo.png" width='100'/> - SISTEMA GESTÃO MATERIAIS </h2><br></center>
		</header>
		<section class="side">
			<ul>
				<li><a href="home.php">HOME</a></li>
				<li><a href="cadastro.php">Cadastrar</a></li>
				<li><a href="editar.php">Editar</a></li>
				<li><a href="deletar.php">Deletar</a></li>
				<li><a href="pesquisar.php">Pesquisar</a></li>
				<li><a href="logoff.php" >SAIR</a></li>
			</ul>
		</section>
		<section class="cadastro">
			<h2>Editar informações</h2>
			<form action="" method="post">
				<input type="text" name="pesquisar" placeholder="Pesquisar - Ex. Codigo,Processador,Status" required/><br>
				<input type="submit" name="Buscar" value="Buscar"/>
			</form>
			<?php
				require("config/conn.php");
				if(isset($_POST['Buscar'])){
					$busca = $_POST['pesquisar'];
					$res = mysql_query("select * from maquinas JOIN componentes WHERE maquinas.maq_cod LIKE '%".$busca."%' OR maquinas.maq_processador LIKE '%".$busca."%' OR maquinas.maq_status LIKE '%".$busca."%'")or die(mysql_error());
						$total = mysql_num_rows($res);
						if(!$total){
							echo "Nenhuma maquina cadastrada com essas caracteristicas!<br>";
						}
						while($show=mysql_fetch_array($res)):
							echo "<h2>Maquina</h2>";
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
							echo "<a style='text-decoration:none;color:#fff;' href=''>EDITAR?</a>";
							echo "<hr> <br>";
						endwhile;	
					}
					$query = mysql_query("SELECT *FROM maquinas JOIN componentes WHERE maquinas.maq_cod = componentes.comp_id ORDER BY maquinas.maq_cod DESC LIMIT 5");
					if(!$query){
						echo "Nenhuma maquina cadastrada!<br>";
					}
					while($show=mysql_fetch_array($query)):
						$id = $show['maq_cod'];
						 echo "<h2>Maquina</h2>";
						 echo "Codigo: ".$show['maq_cod']."<br>";
						 echo "Processador: ".$show['maq_processador']."<br>";
						 echo "Memoria RAM: ".$show['maq_memoria_ram']."<br>";
						 echo "Disco Rígido: ".$show['maq_storage']."<br>";
						 echo "<a style='text-decoration:none;color:#fff;' href='editarSelecionado.php?id=$id'>EDITAR?</a>";
						 echo "<hr> <br>";
					endwhile;

			?>
			<!--<form action=" config/tratadados.php" method="post">
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
		</section>-->
		
</section>	
</body>
</html>
<?php 
	require("config/conn.php");

?>