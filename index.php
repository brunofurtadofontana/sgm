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

		</header>
		<center><img src="img/logo.png"/>
			<h2 style="color:#fff">SISTEMA GESTÃO MATERIAIS </h2><br>
		</center>
	</section>
	<section class="formulario">
		<form action="" method="post">
			<input type="text" name="login" placeholder="Login" required/></br>
			<input type="password" name="senha" placeholder="Senha"required/></br>
			<input type="submit" value="Entrar" name="Entrar"/>
			<?php 
				error_reporting(0);
				$errou = $_GET['$error'];
				switch ($errou) {
					case 1:
						echo "<span style='color:red;font-size:20px;font-weight:bold;text-shadow:5px 2px 5px #999;'>Ops! Login não cadastrado</span>";
						break;
					case 2:
						echo "<span style='color:red;font-size:20px;font-weight:bold;text-shadow:5px 2px 5px #999;'>**Ops! Senha não confere!</span>";
						break;
					default:
						# code...
						break;
				}
			?>
		</form>
	</section>
</body>
</html>
<?php 
	require("config/conn.php");
	if(isset($_POST['Entrar'])){
		$log = $_POST['login'];
		$pass = $_POST['senha'];
		$res = mysql_query("SELECT user_login FROM user WHERE user_login='$log'")or die(mysql_error());
		$show = mysql_fetch_assoc($res);
		$returnLogin = $show['user_login'];

		if($returnLogin == $_POST['login']){
			$res = mysql_query("SELECT user_pass FROM user WHERE user_pass='$pass'")or die(mysql_error());
			$show = mysql_fetch_assoc($res);
			$returnpass = $show['user_pass'];
			if ($returnpass == $_POST['senha']) {
					session_start();
					$_SESSION["LOGIN_USUARIO"]=$log;
					$_SESSION["SENHA_USUARIO"]=$pass;
					header('Location:home.php');

				}
			else{
				header('Location:index.php?$error=1');
			}	
		}
		else{
			header('Location:index.php?$error=2');
		}

	}

?>