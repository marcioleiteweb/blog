<?php
	include_once("../../conexao/conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	
	$result_situacoes_vendas = "INSERT INTO situacoes_vendas (nome, created) VALUES ('$nome', NOW())";
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
					alert(\"Situação da Venda cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Situação da Venda não foi cadastrada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>