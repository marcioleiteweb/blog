<?php
	include_once("../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_vendas = "DELETE FROM vendas WHERE id = '$id'";
	$resultado_vendas = mysqli_query($conn, $result_vendas);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=30'>
				<script type=\"text/javascript\">
					alert(\"Venda apagada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=30'>
				<script type=\"text/javascript\">
					alert(\"Venda não foi apagada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>