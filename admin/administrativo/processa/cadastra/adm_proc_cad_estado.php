<?php
	include_once("../../../conexao/conexao.php");
	$nome_estado = mysqli_real_escape_string($conn, $_POST['nome_estado']);
	
	$result_categorias_produtos = "INSERT INTO estados (nome) VALUES ('$nome_estado')";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=20'>
				<script type=\"text/javascript\">
					alert(\"cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=20'>
				<script type=\"text/javascript\">
					alert(\"não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>