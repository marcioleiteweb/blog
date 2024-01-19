<?php
	include_once("../../conexao/conexao.php");
	$produto_id = mysqli_real_escape_string($conn, $_POST['produto_id']);
	$situacoes_venda_id = mysqli_real_escape_string($conn, $_POST['situacoes_venda_id']);
	$usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);
	
	$result_vendas = "INSERT INTO vendas (produto_id, situacoes_venda_id, usuario_id, data_venda, created) VALUES ('$produto_id', '$situacoes_venda_id', '$usuario_id', NOW(), NOW())";
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
					alert(\"Venda cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=30'>
				<script type=\"text/javascript\">
					alert(\"Venda não foi cadastrada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>