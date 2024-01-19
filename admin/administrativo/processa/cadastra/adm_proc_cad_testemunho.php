<?php
	include_once("../../../conexao/conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$testemunho = mysqli_real_escape_string($conn, $_POST['testemunho']);
	
	$result_testemunho = "INSERT INTO testemunhos (nome, testemunho) VALUES ('$nome', '$testemunho')";
	$resultado_testemunho = mysqli_query($conn, $result_testemunho);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"testemunho cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"testemunho não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>