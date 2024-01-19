<?php
	include_once("../../conexao/conexao.php");
	$venda_id = mysqli_real_escape_string($conn, $_POST['venda_id']);
	$situacoes_venda_id = mysqli_real_escape_string($conn, $_POST['situacoes_venda_id']);
	
	$result_alt_vendas = "INSERT INTO alteracoes_sitacoes_vendas (venda_id, situacoes_venda_id, created) VALUES ('$venda_id', '$situacoes_venda_id', NOW())";
	$resultado_alt_vendas = mysqli_query($conn, $result_alt_vendas);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=34'>
				<script type=\"text/javascript\">
					alert(\"Alteração da Venda cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=34'>
				<script type=\"text/javascript\">
					alert(\"Alteração da Venda não foi cadastrada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>