<?php
	include_once("../../../conexao/conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$link = mysqli_real_escape_string($conn, $_POST['link']);

	
	$result_lives = "INSERT INTO lives (nome, link) VALUES ('$nome', '$link')";
	$resultado_lives = mysqli_query($conn, $result_lives);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=16'>
				<script type=\"text/javascript\">
					alert(\"Live cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=16'>
				<script type=\"text/javascript\">
					alert(\"Live não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>