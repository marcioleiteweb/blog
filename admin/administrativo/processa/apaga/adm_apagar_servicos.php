<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_categorias_produtos = "DELETE FROM servicos WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"não foi apagado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>