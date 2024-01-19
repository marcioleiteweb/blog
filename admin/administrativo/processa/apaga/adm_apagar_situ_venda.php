<?php
	include_once("../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_situacoes_vendas = "DELETE FROM situacoes_vendas WHERE id = '$id'";
	$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Situação de Venda apagada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Situação de Venda não foi apagada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>